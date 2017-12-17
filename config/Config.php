<?php

$rep=__DIR__.'/../';

//Base de données
$BDD="mysql:host=localhost;dbname=dbhucombe";
$loginBDD="hucombe";
$mdpBDD="hucombe";

//Vues
$vues['Accueil']='vue/HomePage.php';
$vues['PageCo']='vue/PageCo.php';
$vues['Registration']='vue/Registration.php';
$vues['Adding']='vue/Adding.php';

//Vue Erreur
$vues['Erreur']='vue/Error.php';

?>