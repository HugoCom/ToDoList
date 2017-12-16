<?php
class User
{
    public $login;
    public $surname;
    public $name;
    public $email;
    public $listTask;

    public function __construct($login, $surname, $name, $email, $listTask)
    {
        $this->login = $login;
        $this->surname = $surname;
        $this->name = $name;
        $this->email = $email;
        $this->listTask = $listTask;
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
