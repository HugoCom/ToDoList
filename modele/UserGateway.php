<?php
include_once("User.php");

class UserGateway
{
    private $con;

    function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function insert($login,$password,$prenom,$nom,$email,$idList)
    {
        $query='INSERT INTO User VALUES (?,?,?,?,?,?)';

        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$login, PDO::PARAM_STR);
        $stmt->bindValue(2,$password, PDO::PARAM_STR);
        $stmt->bindValue(3,$prenom, PDO::PARAM_STR);
        $stmt->bindValue(4,$nom, PDO::PARAM_STR);
        $stmt->bindValue(5,$email, PDO::PARAM_STR);
        $stmt->bindValue(6,$idList, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function select($arg)
    {
        $query='SELECT * FROM User WHERE login=?';
        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$arg,PDO::PARAM_STR);
        $stmt->execute();
        $result=$stmt->fetchAll();
        foreach($result as $row) {
            $tab[] = new User($row[1], $row[3], $row[4], $row[5]);
        }
        return $tab;
    }
    public function exist($login,$password)
    {
        $query='SELECT * FROM User WHERE login=? AND password=?';
        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$login,PDO::PARAM_STR);
        $stmt->bindValue(2,$password,PDO::PARAM_STR);
        $stmt->execute();
        $result=$stmt->fetch();
        if ($result == null)
            return null;
        else
            return new User($result[0], $result[2], $result[3], $result[4], $result[5]);

    }
}