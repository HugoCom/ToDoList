<?php

class FontControleur
{
    public function __construct()
    {
        global $rep, $vues, $BDD, $loginBDD, $mdpBDD;
        $modeleList = new ModeleListtask();
        $modeleUser = new ModeleUser();
        session_start();
        $_SESSION = array();

        try
        {
            if(isset($_REQUEST['action']))
                $action=$_REQUEST['action'];
            else
                $action = 'null';

            switch ($action)
            {
                case 'null':
                    $this->reinit();
                    break;
                case 'Connect':
            }
        }
        catch (PDOException $e){
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}