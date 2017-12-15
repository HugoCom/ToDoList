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
    public $surname;
    public $name;
    public $email;
    public $listTask;

    public function __construct(string $login, string $surname, string $name, string $email, int $listTask)
    {
        $this->login = $login;
        $this->prenom = $surname;
        $this->nom = $name;
        $this->email = $email;
        $this->listeTache = $listTask;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getListTask()
    {
        return $this->listTask;
    }
}
