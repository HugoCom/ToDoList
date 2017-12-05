<?php

/**
 * Created by PhpStorm.
 * User: gucothenet
 * Date: 08/11/17
 * Time: 14:30
 */
class User
{
    public $login;
    public $prenom;
    public $nom;
    public $email;

    public function __construct(string $login, string $prenom, string $nom, string $email)
    {
        $this->login = $login;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
    }
}
