<?php

class FrontControleur
{
    public function __construct()
    {
        global $rep, $vues, $BDD, $loginBDD, $mdpBDD;
        $_SESSION = array();
        $_SESSION['connecte'] = "no";
        $userControl = new UserControl();
        $taskGW = new TaskGateway(new Connection($BDD,$loginBDD,$mdpBDD));
        $listTask = $taskGW->select(1);
        $this->listTask = $listTask;

        try
        {
            if(isset($_REQUEST['action'])) {
                $action = ValidationUse::sanitizeString($_REQUEST['action']);
            }
            else
                $action = 'null';

            switch ($action)
            {
                case 'null':
                    require_once($rep.$vues['Accueil']);
                    break;
                case 'Home Page':
                    require_once($rep.$vues['Accueil']);
                    break;
                case 'Log in':
                    $userControl->Connexion();
                    break;
                case 'Sign out':
                    $userControl->Deconnexion();
                    require_once($rep.$vues['Accueil']);
                    break;
                case 'Sign up':
                    require_once($rep.$vues['Registration']);
                    break;
                case 'ValiderRegister':
                    $userControl->Vregister();
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
                    $userControl->AddTask();
                    break;
                case 'Add private task':
                    $userControl->AddPrivateTask(4);
                    break;
                default:
                    break;
            }
        }
        catch (PDOException $e){
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}