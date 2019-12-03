<?php
class Connection
{
  private $host = 'mysql:host=localhost;dbname=fakeinsta;port=3306;charset=utf8mb4';
  private $user = 'root';
  private $pass = '';

  protected function createConnection()
  {
    return new PDO($this->host, $this->user, $this->pass);
  }
}
