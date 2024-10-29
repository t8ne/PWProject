<?php

namespace app\core;

use mysqli;
use mysqli_stmt;

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
    $this->DBName = 'projeto_pw2';
    $this->conn = new mysqli($this->DBServer, $this->DBUser, $this->DBPass, $this->DBName);
    $this->conn->set_charset("utf8");
  }

  public function setParameters($stmt, array $parameters)
  {
    if (empty($parameters)) {
      return; // No parameters to bind
    }

    // Define the `types` string based on the number of parameters
    $types = str_repeat('s', count($parameters)); // 's' for strings; adjust as needed

    // Bind the parameters to the statement
    $stmt->bind_param($types, ...$parameters);
  }

  public function execQuery(string $sql, array $parameters = [])
  {
    $stmt = $this->conn->prepare($sql);
    if (!$stmt) {
      die("Query preparation failed: " . $this->conn->error . " SQL: " . $sql);
    }

    if (!empty($parameters)) {
      $types = str_repeat('s', count($parameters));
      $stmt->bind_param($types, ...$parameters);
    }

    if (!$stmt->execute()) {
      die("Query execution failed: " . $stmt->error . " SQL: " . $sql);
    }

    if (stripos(trim($sql), 'SELECT') === 0) {
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    } elseif (stripos(trim($sql), 'INSERT') === 0) {
      return $this->conn->insert_id;
    } elseif (stripos(trim($sql), 'UPDATE') === 0 || stripos(trim($sql), 'DELETE') === 0) {
      return $stmt->affected_rows;
    }

    return null;
  }
}