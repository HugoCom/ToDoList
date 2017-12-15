<?php

    class Controleur
    {
        private $action;

        public function __construct()
        {
            global $rep, $vues;
            session_start();

            if(isset($_REQUEST['action']))
            {
                $this->action=$_REQUEST['action'];
            }
            else
            {
                $this->action = null;
            }

            switch($this->action)
            {
                case null:
                    require($rep.$vues['Accueil']);
                    break;
                case 'Valider':
                    $this->connexion();
                    break;
                default:
                    echo "Default";
                    break;
            }
    }

    public function connexion()
    {
        global $rep, $vues;
        $userGW = new UserGateway(new Connection("mysql:host=localhost;dbname=dbhucombe","hucombe","hucombe"));
        $user = $userGW->exist($_REQUEST['login'],$_REQUEST['password']);
        //$_SESSION['Login']=$_REQUEST['login'];
        //$_SESSION['Password']=$_REQUEST['password'];
    }
}