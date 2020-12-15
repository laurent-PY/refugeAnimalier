<?php
function req_Sel_Race() {

    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare('SELECT * FROM race'); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete
    $resultRace = $pdoStat->fetchAll(); // stockage du resultat dans la variable $race
    return $resultRace;
}
function req_Sel_Sante()
{
    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare('SELECT * FROM sante'); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete
    $resultSante = $pdoStat->fetchAll(); // stockage du resultat dans la variable $race
    return $resultSante;
}
function req_Sel_Chat()
{
    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare('SELECT * FROM chat'); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete
    $resultChat = $pdoStat->fetchAll(); // stockage du resultat dans la variable $race
    return $resultChat;
}
function req_Sel_Couleur() {

    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare('SELECT * FROM couleur'); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete
    $resultCouleur = $pdoStat->fetchAll(); // stockage du resultat dans la variable $race
    return $resultCouleur;
}