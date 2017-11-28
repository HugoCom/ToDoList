<?php

/**
 * Created by PhpStorm.
 * User: hucombe
 * Date: 14/11/17
 * Time: 15:02
 */
class Connection extends PDO
{

    private $stmt;

    public function construct($dsn,$username,$password)
    {
        parent:: construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

?>