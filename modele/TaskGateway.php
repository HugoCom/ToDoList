<?php
include_once("Task.php");

class TaskGateway
{
    private $con;

    function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function insert($name,$description,$complete,$IDList) {
        $query='INSERT INTO Task (name,description,complete,IDListTask) VALUES (?,?,?,?)';

        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$name, PDO::PARAM_STR);
        $stmt->bindValue(2,$description, PDO::PARAM_STR);
        $stmt->bindValue(3,$complete, PDO::PARAM_BOOL);
        $stmt->bindValue(4,$IDList, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function select($arg){
        $tab = array();
        $query='SELECT * FROM Task WHERE IDListTask=?';
        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$arg,PDO::PARAM_INT);
        $stmt->execute();
        $result=$stmt->fetchAll();
        foreach($result as $row) {
            $tab[] = new Task($row[1], $row[2], $row[3], strval($row[4]));
        }
        return $tab;
    }
    public function delete($arg){
        $query='DELETE FROM Task WHERE ID=?';
        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$arg,PDO::PARAM_INT);
        $stmt->execute();
    }
}