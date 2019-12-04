<?php
include_once 'Connection.php';

// classe User herda da Connection para conseguir conectar ao banco de dados
class User extends Connection
{
  // método de criação de usuário (insere dados do usuário no banco)
  public function createUser($profilePic, $username, $pass, $name, $email)
  {
    $dsn = parent::createConnection();
    $query = $dsn->prepare('INSERT INTO users (image, login, password, name, email) values (?,?,?,?,?)');
    return $query->execute([$profilePic, $username, $pass, $name, $email]);
  }

  // método para verificar os dados do usuário (busca dados de login no banco e devolve para a página)
  public function getUserInfo($username)
  {
    $dsn = parent::createConnection();
    $query = $dsn->query("SELECT * FROM users where login = '$username'");
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  public function compareUserInfo($username,$email)
  {
    $dsn = parent::createConnection();
    $query = $dsn->query("SELECT login, email FROM users where login = '$username' OR email = '$email'");
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }
}
