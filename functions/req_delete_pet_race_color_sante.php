<?php
function delete_pet($idPet)
{

    try {
        $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
        $pdoStat = $pdoBdd->prepare("DELETE FROM chat WHERE idChat = " . $idPet); //preparation de la requete stockée dans $pdoStat
        $pdoStat->execute(); //execution de la requete
        header('location: liste_compagnons.php');

    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();                         //Catch permet d'attraper les erreurs et de les afficher dans le navigateur.
        exit();
    }
}

function delete_race($idRace) {

    try{
        $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
        $pdoStat = $pdoBdd->prepare("DELETE FROM race WHERE idRace = " .  $idRace); //preparation de la requete stockée dans $pdoStat
        $pdoStat->execute(); //execution de la requete
        header('location: administration.php');
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();                         //Catch permet d'attraper les erreurs et de les afficher dans le navigateur.
        exit();
    }

}

function delete_couleur($idCouleur) {

    try {
        $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
        $pdoStat = $pdoBdd->prepare("DELETE FROM couleur WHERE idcouleur = " . $idCouleur); //preparation de la requete stockée dans $pdoStat
        $pdoStat->execute(); //execution de la requete
        header('location: administration.php');

    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();                         //Catch permet d'attraper les erreurs et de les afficher dans le navigateur.
        exit();
    }
}

function delete_sante($idSante) {

    try{
    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare("DELETE FROM sante WHERE idSante = " .  $idSante); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete
    header('location: administration.php');

    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();                         //Catch permet d'attraper les erreurs et de les afficher dans le navigateur.
        exit();
    }
}