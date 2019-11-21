<?php 
include_once 'Connection.php';

class User extends Connection
{
    public function createUser($username,$pass,$name,$email)
    {
        $dsn = parent::createConnection();
        $query = $dsn->prepare('INSERT INTO users (login, password, name, email) values (?,?,?,?)');
        return $query->execute([$username,$pass,$name,$email]);
    }

    public function getUserInfo($username) 
    {
        $dsn = parent::createConnection();
        $query = $dsn->query("SELECT * FROM users where login = '$username'");
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}


?>