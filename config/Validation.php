<?php

/**
 * Created by PhpStorm.
 * User: hucombe
 * Date: 28/11/17
 * Time: 13:57
 */
class Validation
{

    static function val_action($action) {
        if (!isset($action)) {
            throw new Exception('Pas d\'action');
        }
    }

    static function val_form(string $login, string $password, string $surname, string $name, string $email)
    {
        if(empty($login))
            throw new Exception('Pas de login');
        if(empty($password))
            throw new Exception('Pas de password');
        if(empty($surname))
            throw new Exception('Pas de surname');
        if(empty($name))
            throw new Exception('Pas de name');
        if(empty($email))
            throw new Exception('Pas d\'email');
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
            throw new Exception('Mauvais format d\'email');
        }
        if ($login != filter_var($login, FILTER_SANITIZE_STRING)) {
            throw new Exception('Injection SQL');
        }
        if ($password != filter_var($password, FILTER_SANITIZE_STRING)) {
            throw new Exception('Injection SQL');
        }
        if ($surname != filter_var($surname, FILTER_SANITIZE_STRING)) {
            throw new Exception('Injection SQL');
        }
        if ($name != filter_var($name, FILTER_SANITIZE_STRING)) {
            throw new Exception('Injection SQL');
        }
        if ($email != filter_var($email, FILTER_SANITIZE_STRING)) {
            throw new Exception('Injection SQL');
        }
    }
}

?>