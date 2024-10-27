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
    $this->DBName = 'projeto_pw';
    $this->conn = new mysqli($this->DBServer, $this->DBUser, $this->DBPass, $this->DBName);
    $this->conn->set_charset("utf8");
  }

  private function setParameters(mysqli_stmt $stmt, array $parameters)
  {
    if (count($parameters)) {
      $types = $parameters[0];
      $values = $parameters[1];
      $stmt->bind_param($types, ...$values);
    }
  }

  public function execQuery(string $sql, array $parameters = [])
  {
    $stmt = $this->conn->prepare($sql);
    if (!$stmt) {
      die("Query preparation failed: " . $this->conn->error . " SQL: " . $sql);
    }

    $this->setParameters($stmt, $parameters);

    // Execute the statement
    if (!$stmt->execute()) {
      die("Query execution failed: " . $stmt->error . " SQL: " . $sql);
    }

    // Determine the type of query and handle responses
    if (stripos(trim($sql), 'SELECT') === 0) {
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } elseif (stripos(trim($sql), 'INSERT') === 0) {
      return $this->conn->insert_id; // Return the last inserted ID
    } elseif (stripos(trim($sql), 'UPDATE') === 0) {
      return $stmt->affected_rows > 0; // Return true if rows were updated
    } elseif (stripos(trim($sql), 'DELETE') === 0) {
      return $stmt->affected_rows > 0; // Return true if rows were deleted
    }

    return null; // For any other queries (though we expect SELECT, INSERT, UPDATE, DELETE)
  }

}
