<?php
function delete_pet($idPet) {
    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare("DELETE FROM chat WHERE idChat = " .  $idPet); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete
    header('location: liste_compagnons.php');
}

function delete_race($idRace) {
    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare("DELETE FROM race WHERE idRace = " .  $idRace); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete
    header('location: liste_races.php');
}

function delete_couleur($idCouleur) {

    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare("DELETE FROM couleur WHERE idcouleur = " .  $idCouleur); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete
    header('location: liste_couleurs.php');
}

function delete_sante($idSante) {
    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare("DELETE FROM sante WHERE idSante = " .  $idSante); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete
    header('location: liste_etatSante.php');
}