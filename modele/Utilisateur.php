<?php

/**
 * Created by PhpStorm.
 * User: gucothenet
 * Date: 08/11/17
 * Time: 14:30
 */
class Utilisateur
{
    public $nom;
    public $prenom;
    public $dateNaissance;
    public $email;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->email = $email;
    }

    public function affichage()
    {
        echo " </br>$this->nom $this->prenom né le $this->dateNaissance a pour email $this->email ";
    }

}
