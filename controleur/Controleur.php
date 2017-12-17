<?php

    class Controleur
    {
        public function __construct()
        {
            global $rep, $vues, $BDD, $loginBDD, $mdpBDD;

            $taskGW = new TaskGateway(new Connection($BDD,$loginBDD,$mdpBDD));
            $listTask = $taskGW->select(1);
            $this->listTask = $listTask;


            if(isset($_REQUEST['action']))
                $this->action=$_REQUEST['action'];
            else
                $this->action = null;

            switch($this->action)
            {
                case null:
                    require($rep.$vues['Accueil']);
                    break;
                case 'Log in':
                    $this->connexion();
                    break;
                case 'Sign up':
                    require_once($rep.$vues['Registration']);
                    break;
                case 'ValiderRegister':
                    $this->Vregister();
                    break;
                case 'Add a task':
                    $_SESSION['Rule'] = "public";
                    require_once($rep.$vues['Adding']);
                    break;
                case 'Add a private task':
                    $_SESSION['Rule'] = "private";
                    require_once($rep.$vues['Adding']);
                    break;
                case 'Add task':
                    $this->AddTask();
                    break;
                case 'Add private task':
                    $this->AddPrivateTask(4);
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
            $listTask = $this->listTask;
            require($rep . $vues['Accueil']);
        }
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
            require_once($rep.$vues['Register']);
            return;
        }
        $listTask = $this->listTask;
        require_once($rep.$vues['Accueil']);
    }

    public function AddTask()
    {
        global $rep, $vues, $BDD, $loginBDD, $mdpBDD;

        $taskGW = new TaskGateway(new Connection($BDD,$loginBDD,$mdpBDD));

        $name = $_REQUEST['name'];
        $desc = $_REQUEST['description'];

        $taskGW->insert($name,$desc,0,1);

        $listTask = $taskGW->select(1);
        require_once($rep.$vues['Accueil']);

    }

    public function AddPrivateTask($id)
    {
            global $rep, $vues, $BDD, $loginBDD, $mdpBDD;
            $taskGW = new TaskGateway(new Connection($BDD,$loginBDD,$mdpBDD));

            $name = $_REQUEST['name'];
            $desc = $_REQUEST['description'];

            $taskGW->insert($name,$desc,0, $id);
            $listTask = $taskGW->select(1);
            require_once($rep.$vues['Accueil']);
    }

}