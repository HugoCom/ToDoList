<?php
include_once("modele/ListTask.php");

class UserGateway
{
    private $con;

    function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function insert($nom,$prenom,$ddn,$email) {
        $query='INSERT INTO Utilisateur (Nom,Prenom,DDN,Email) VALUES (?,?,?,?)';

        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$nom, PDO::PARAM_STR);
        $stmt->bindValue(2,$prenom, PDO::PARAM_STR);
        $stmt->bindValue(3,$ddn, PDO::PARAM_STR);
        $stmt->bindValue(4,$email, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function select($arg){
        $query='SELECT * FROM Utilisateur WHERE ID=?';
        $stmt=$this->con->prepare($query);
        $stmt->bindValue(1,$arg,PDO::PARAM_INT);
        $stmt->execute();
        $result=$stmt->fetchAll();
        foreach($result as $row) {
            $tab[] = new Personne($row[1], $row[2], $row[3], $row[4]);
        }
        return $tab;
    }
    public function update($id,$nom) {
        $query = 'UPDATE Utilisateur SET Nom=? WHERE ID=?';
        $stmt = $this->con->prepare($query);
        $stmt->bindValue(1,$nom, PDO::PARAM_STR);
        $stmt->bindValue(2, $id, PDO::PARAM_INT);
        $stmt->execute();

    }
}