<?php

class ControleurRegister
{
    private $action;

    public function __construct()
    {
        global $rep, $vues;

        if(isset($_REQUEST['action']))
            $this->action=$_REQUEST['action'];
        else
            $this->action = null;

        switch($this->action)
        {
            case null:
                require($rep.$vues['Accueil']);
                break;
            case 'ValiderRegister':
                $this->register();
                break;
            default:
                break;
        }
    }


    public function register()
    {
        global $BDD, $loginBDD, $mdpBDD;

        //$userGW = new UserGateway(new Connection($BDD,$loginBDD,$mdpBDD));
        //$listTaskGW = new ListTaskGateway(new Connection($BDD,$loginBDD,$mdpBDD));

        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];
        $surname = $_REQUEST['surname'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];

        echo "$login $password $surname $name $email";

        //$listTask = $listTaskGW->insert($login,date("Y-m-d"));
        //$userGW->insert($login,$password,$surname,$name,$email,$listTask);
    }
}