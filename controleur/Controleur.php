<?php

    class Controleur
    {
        private $action;

        public function __construct()
        {
            global $rep, $vues, $BDD, $loginBDD, $mdpBDD;
            session_set_cookie_params(0);
            session_start();
            $_SESSION = array();

            $taskGW = new TaskGateway(new Connection($BDD,$loginBDD,$mdpBDD));
            $listTask = $taskGW->select(1);


            if(isset($_REQUEST['action']))
                $this->action=$_REQUEST['action'];
            else
                $this->action = null;

            switch($this->action)
            {
                case null:
                    require($rep.$vues['Accueil']);
                    break;
                case 'Valider':
                    $this->connexion();
                    break;
                case 'Register':
                    $this->register();
                    break;
                case 'ValiderRegister':
                    $this->Vregister();
                    break;
                default:
                    break;
            }
    }

    public function connexion()
    {
        global $rep, $vues, $BDD, $loginBDD, $mdpBDD;
        $userGW = new UserGateway(new Connection($BDD,$loginBDD,$mdpBDD));
        $taskGW = new TaskGateway(new Connection($BDD,$loginBDD,$mdpBDD));

        $user = $userGW->exist($_REQUEST['login'],$_REQUEST['password']);
        if($user == null)
        {
            $TErreur[] = "Utilisateur inconnu !";
            require_once($rep.$vues['Erreur']);
        }
        else
        {
            $_SESSION['connecte'] = "yes";
            $_SESSION['name'] = $user->getName();
            $_SESSION['surname'] = $user->getSurname();
            $_SESSION['idListTask'] = $user->getListTask();

            $listTaskPerso = $taskGW->select($_SESSION['idListTask']);

            echo "Connecté";
            require_once($rep . $vues['Accueil']);
        }
    }

    public function register()
    {
        global $rep, $vues;
        require_once($rep . $vues['Registration']);
    }

    public function Vregister()
    {
        global $rep, $vues, $BDD, $loginBDD, $mdpBDD;

        $userGW = new UserGateway(new Connection($BDD,$loginBDD,$mdpBDD));
        $listTaskGW = new ListTaskGateway(new Connection($BDD,$loginBDD,$mdpBDD));

        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];
        $surname = $_REQUEST['surname'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];

        try{
            $listTask = $listTaskGW->insert($login,date("Y-m-d"));
            $userGW->insert($login,$password,$surname,$name,$email,$listTask->getListTask());
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            require_once($rep.$vues['Registration']);
            return;
        }
        require_once($rep.$vues['Accueil']);
    }
}