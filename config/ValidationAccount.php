<?php

    class ValidationAccount
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

            if (ValidationUse::validateEmail($email) == FALSE) {
                throw new Exception('Mauvais format d\'email');
            }
            if (ValidationUse::sanitizeEmail($email) == FALSE) {
                throw new Exception('Injection SQL');
            }
            if (ValidationUse::sanitizeString(login) == FALSE) {
                throw new Exception('Injection SQL');
            }
            if (ValidationUse::sanitizeString($password) == FALSE) {
                throw new Exception('Injection SQL');
            }
            if (ValidationUse::sanitizeString($surname) == FALSE) {
                throw new Exception('Injection SQL');
            }
            if (ValidationUse::sanitizeString($name) == FALSE) {
                throw new Exception('Injection SQL');
            }

        }
    }
?>