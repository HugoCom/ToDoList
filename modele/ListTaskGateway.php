<?php
include_once("modele/ListTask.php");

class ListTaskGateway
{
    private $con;

    function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function insert($name,$date) {
        $query='INSERT INTO ListTask (name,date) VALUES (?,?)';
        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$name, PDO::PARAM_STR);
        $stmt->bindValue(2,$date, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function select() {
        $query='SELECT * FROM ListTask';
        $tab=array();
        $stmt=$this->con->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll();
        foreach($result as $row) {
            $tab[] = new ListTask($row['ID'], $row['name'], $row['date']);
        }
        return $tab;
    }
    public function delete($arg){
        //TODO : foreach pour supprimer les tâches avant la liste
        $query='DELETE FROM ListTask WHERE ID=?';
        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$arg,PDO::PARAM_INT);
        $stmt->execute();
    }
}