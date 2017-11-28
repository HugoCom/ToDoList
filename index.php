<?php

//Chargement Config
require_once('config/Config.php');

//Chargement Autoload
require_once(__DIR__.'/config/Autoload.php');

try{
    Autoload::charger();
    $cont = new Controleur();
}

catch(Exception $e){


}

?>