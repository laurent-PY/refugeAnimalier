<?php

function cnx_pdo_bdd(){
    //------------------------------------------------
    $hostname = "localhost";
    $port = 3307;
    $user = "root";              //ce block permet d'initialiser les variables dont utiles pour la suite du code
    $password = "";
    $nom_base_donnees = 'chats';
    //------------------------------------------------
    //------------------------------------------------
    //Pour la connexion, un Try Catch est recommandé, si jamais une erreur venait à être levée le Catch l'attrape et l'affiche dane le navigateur
    try {

        // Déclaration et initialisation de l'objet PDO, dont DSN, PORT, BDNAME, USER, PASSWORD
        $objetPdo = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$nom_base_donnees, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $objetPdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // affichage des erreurs retournées par Sql
        //echo 'cnx Ok!'; // me permet de contrôler si ma connexion marche
        //------------------------------------------------
    } catch(Exception $e) {
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();                         //Catch permet d'attraper les erreurs et de les afficher dans le navigateur.
        exit();
    }
    //------------------------------------------------
    return $objetPdo; // retour d'$objetPDO qui est utile lors des appels de la fonction ailleurs dans les autres fichiers PHP.

}
