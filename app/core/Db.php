<?php

namespace app\core;

use mysqli;
use mysqli_stmt; // Add this line to ensure the mysqli_stmt class is recognized

class Db
{
  private $DBServer;
  private $DBUser;
  private $DBPass;
  private $DBName;

  private $conn;

  public function __construct()
  {
    $this->DBServer = 'localhost';
    $this->DBUser = 'root';
    $this->DBPass = '';
    $this->DBName = 'projeto_pw';
    $this->conn = new mysqli($this->DBServer, $this->DBUser, $this->DBPass, $this->DBName);
    $this->conn->set_charset("utf8");
  }

  /**
   * Método para a definição dos parâmetros para o prepared statement
   * @param  mysqli_stmt   $stmt         query "preparada".
   * @param  array         $parameters   array com tipos e respetivos valores (caso existam)
   */
  private function setParameters(mysqli_stmt $stmt, array $parameters) // Updated here
  {
    if (count($parameters)) {
      $types = $parameters[0];
      $values = $parameters[1];
      $stmt->bind_param($types, ...$values);
    }
  }

  /**
   * Método para a execução do SQL
   * @param  string   $sql         instrução SQL
   * @param  array    $parameters  array de parâmetros
   *
   * @return array    $response    dataset
   */
  public function execQuery(string $sql, array $parameters = [])
  {
    $stmt = $this->conn->prepare($sql);
    $this->setParameters($stmt, $parameters); // This will now accept the correct type
    if (!(stripos(trim($sql), 'DELETE') === 0)) {
      $stmt->execute();
    }

    if (stripos(trim($sql), 'SELECT') === 0) {
      $response = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } elseif (stripos(trim($sql), 'INSERT') === 0) {
      $lastId = $this->conn->insert_id; // ID do registo inserido
      $result = $this->execQuery('SELECT * FROM movies WHERE id = ?', ['i', [$lastId]]);
      $response = $result[0];
    } elseif (stripos(trim($sql), 'UPDATE') === 0) {
      $response = $parameters[1]; // devolve os dados enviados para o execQuery
    } elseif (stripos(trim($sql), 'DELETE') === 0) {
      $id = $parameters[1][0]; // id do registo para DELETE
      $deletedData = $this->execQuery('SELECT * FROM movies WHERE id = ?', ['i', [$id]]);
      $response = !empty($deletedData) ? $deletedData[0] : null;
      $stmt->execute();
    }

    return $response;
  }
}
