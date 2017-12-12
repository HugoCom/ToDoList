<?php
/**
 * Created by PhpStorm.
 * User: hucombe
 * Date: 23/11/17
 * Time: 14:46
 */
    class Controleur {

    function __construct()
    {
        global $rep, $vues;
        session_start();

        $TErreur = array();
        try{
            $action=isset($_REQUEST['action'])?
                $_REQUEST['action']:'neRienFaire';
            switch ($action){
                case 'neRienFaire':
                    $this->Reinit();
                    break;

                case "validerFormulaire":
                    $this->ValidationFormulaire();
                    break;

                default:
                    $TErreur[] = "Erreur appel PHP";
                    require_once($rep.$vues['Accueil']);
                    break;
            }
        }
        catch(PDOException $e)
        {
            $TErreur[] = "Erreur PDO";
            require_once($rep.$vues['Erreur']);
        }
        catch (Exception $e2)
        {
            $TErreur[] = "Erreur inattendue";
            require_once($rep.$vues['Erreur']);
        }

        exit(0);
    }

    function Reinit(){
        global $rep,$vues;
        $t = new ListTaskGateway(new Connection("mysql:host=localhost;dbname=dbhucombe","hucombe","hucombe"));
        $TVues=$t->select();
        require ($rep.$vues['Accueil']);
    }

        function ValidationFormulaire() {
            global $rep,$vues;

            $login=$_GET['login'];
            $password=$_GET['password'];
            $prenom=$_GET['prenom'];
            $nom=$_GET['nom'];
            $email=$_GET['email'];
            try{
                Validation::val_form($login,$password,$prenom,$nom,$email);
            }
            catch(Exception $e){
                $TErreur[]=$e;
                require_once($rep.$vues['Erreur']);
            }
        }
}