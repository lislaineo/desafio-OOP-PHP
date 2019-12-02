<?php 
include_once 'Connection.php';

class User extends Connection
{
    public function createUser($profilePic,$username,$pass,$name,$email)
    {
        $dsn = parent::createConnection();
        $query = $dsn->prepare('INSERT INTO users (image, login, password, name, email) values (?,?,?,?,?)');
        return $query->execute([$profilePic,$username,$pass,$name,$email]);
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