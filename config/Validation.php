<?php

/**
 * Created by PhpStorm.
 * User: hucombe
 * Date: 28/11/17
 * Time: 13:57
 */
class Validation
{

    static function val_action($action) {

        if (!isset($action)) {
            throw new Exception('Pas d\'action');

        }
    }

    static function val_form(string $nom, string $prenom, string $dateDeNaissance, string $email, array $TErreur) {

        if (!isset($nom)||$nom==""||!filter_var($prenom, FILTER_VALIDATE_STRING)) {
                $TErreur[] ="Pas de nom";
                $nom="";
        }

        if (!isset($prenom)||$prenom==""||!filter_var($prenom, FILTER_VALIDATE_STRING)) {
                $TErreur[] ="Pas de prenom ";
                $prenom="";
        }

        if (!isset($dateDeNaissance)||$dateDeNaissance==""||!filter_var($dateDeNaissance, FILTER_VALIDATE_STRING)) {
                $TErreur[] ="Pas de date de naissance";
                $dateDeNaissance="";
        }

         if (!isset($email)||$email==""||!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $TErreur[] ="Pas d'age ";
                $email="";
        }

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING)) {
                $TErreur[] ="Tentative d'injection de code (Attaque Sécurité)";
                $nom="";
        }

        if ($prenom != filter_var($prenom, FILTER_SANITIZE_STRING)) {
                $TErreur[] ="Tentative d'injection de code (Attaque Sécurité)";
                $prenom="";
        }

        if ($dateDeNaissance != filter_var($dateDeNaissance, FILTER_SANITIZE_STRING)) {
                $TErreur[] ="Tentative d'injection de code (Attaque Sécurité)";
                $dateDeNaissance="";
        }

        if ($email != filter_var($email, FILTER_SANITIZE_STRING)) {
                $TErreur[] ="Tentative d'injection de code (Attaque Sécurité)";
                $email="";
        }

    }




















}