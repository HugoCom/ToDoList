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
                    $this->ValidationFormulaire($TErreur);
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

        $dVue = array (
            'nom' => "",
            'prenom' => "",
            'ddn' => "",
            'email' => ""
        );
        require ($rep.$vues['Accueil']);
    }

        function ValidationFormulaire(array $dVueEreur) {
            global $rep,$vues;


            $nom=$_GET['nom'];
            $prenom=$_GET['prenom'];
            $email=$_GET['email'];
            $date=$_GET['date'];
            Validation::val_form($nom,$prenom,$date,$email,$dVueEreur);

            require ($rep.$vues['Erreur']);
        }
}