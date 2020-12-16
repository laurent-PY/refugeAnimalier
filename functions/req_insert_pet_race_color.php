<?php
//Fonction qui controlent via une requete si l'entré a insérer en base de donnée est déjà présente, si oui rowCount retourne un résultat positif
//Et donc if ($pdoStat->rowCount() ==  0) sera faux, je retourne le message d'erreur à initialisé que j'attrape dans le form administration.php

function insert_pet_bdd()
{
    $messagePetPresent = "";
    $pdoStat = cnx_pdo_bdd()->prepare('SELECT * FROM chat WHERE nom = :nom AND b_recep = :b_recep AND sexe = :sexe AND poids_recep = :poids_recep AND vaccin = :vaccin AND steril = :steril AND puce_id = :puce_id AND d_in = :d_in AND d_out = :d_out AND taille = :taille AND idRace = :idRace AND idSante = :idSante ');
    $pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $pdoStat->bindValue(':b_recep', $_POST['b_recep'], PDO::PARAM_STR);
    $pdoStat->bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR);
    $pdoStat->bindValue(':poids_recep', $_POST['poids_recep'], PDO::PARAM_STR);
    $pdoStat->bindValue(':vaccin', $_POST['vaccin'], PDO::PARAM_STR);
    $pdoStat->bindValue(':steril', $_POST['steril'], PDO::PARAM_STR);
    $pdoStat->bindValue(':puce_id', $_POST['puce_id'], PDO::PARAM_STR);
    $pdoStat->bindValue(':d_in', $_POST['d_in'], PDO::PARAM_STR);
    $pdoStat->bindValue(':d_out', $_POST['d_out'], PDO::PARAM_STR);
    $pdoStat->bindValue(':taille', $_POST['taille'], PDO::PARAM_STR);
    $pdoStat->bindValue(':idRace', $_POST['idRace'], PDO::PARAM_STR);
    $pdoStat->bindValue(':idSante', $_POST['idSante'], PDO::PARAM_STR);
    $pdoStat->execute();


    if ($pdoStat->rowCount() ==  0) {

        try {
            $objetPdo = cnx_pdo_bdd(); // appel à la fonction de connexion à la base de données
            $pdoStat = $objetPdo->prepare('INSERT INTO chat VALUES (NULL, :nom, :b_recep, :sexe, :poids_recep,:vaccin,:steril,:puce_id,:d_in,:d_out,:taille,:idRace,:idSante)');
            $pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
            $pdoStat->bindValue(':b_recep', $_POST['b_recep'], PDO::PARAM_STR);
            $pdoStat->bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR);
            $pdoStat->bindValue(':poids_recep', $_POST['poids_recep'], PDO::PARAM_STR);
            $pdoStat->bindValue(':vaccin', $_POST['vaccin'], PDO::PARAM_STR);
            $pdoStat->bindValue(':steril', $_POST['steril'], PDO::PARAM_STR);
            $pdoStat->bindValue(':puce_id', $_POST['puce_id'], PDO::PARAM_STR);
            $pdoStat->bindValue(':d_in', $_POST['d_in'], PDO::PARAM_STR);
            $pdoStat->bindValue(':d_out', $_POST['d_out'], PDO::PARAM_STR);
            $pdoStat->bindValue(':taille', $_POST['taille'], PDO::PARAM_STR);
            $pdoStat->bindValue(':idRace', $_POST['idRace'], PDO::PARAM_STR);
            $pdoStat->bindValue(':idSante', $_POST['idSante'], PDO::PARAM_STR);
            $pdoStat->execute();

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            exit();
        }
    } else {
        $messagePetPresent = "Pet présent";
    }
    return $messagePetPresent;
}



function addRace(){

    $messageRacePresent = "";
    $pdoStat = cnx_pdo_bdd()->prepare('SELECT * FROM race WHERE nomRace = :nomRace');
    $pdoStat->bindValue(':nomRace', $_POST['addRace'], PDO::PARAM_STR);
    $pdoStat->execute();

    if ($pdoStat->rowCount() ==  0) {

    try {
        $objetPdo = cnx_pdo_bdd(); // appel à la fonction de connexion à la base de données
        $pdoStat = $objetPdo->prepare('INSERT INTO race VALUES (NULL, :nomRace)');
        $pdoStat->bindValue(':nomRace', $_POST['addRace'], PDO::PARAM_STR);
        $pdoStat->execute();

    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        exit();
    }
} else {
        $messageRacePresent = "Race Présente";

    }
    return $messageRacePresent;
}




function addCouleur(){

    $messageCouleurPresent = "";
    $pdoStat = cnx_pdo_bdd()->prepare('SELECT * FROM couleur WHERE couleur = :couleur');
    $pdoStat->bindValue(':couleur', $_POST['addCouleur'], PDO::PARAM_STR);
    $pdoStat->execute();

    if ($pdoStat->rowCount() ==  0) {

        try {
            $objetPdo = cnx_pdo_bdd(); // appel à la fonction de connexion à la base de données
            $pdoStat = $objetPdo->prepare('INSERT INTO couleur VALUES (NULL, :couleur)');
            $pdoStat->bindValue(':couleur', $_POST['addCouleur'], PDO::PARAM_STR);
            $pdoStat->execute();

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            exit();
        }
    }else {
        $messageCouleurPresent = "Couleur Présente";
    }
    return $messageCouleurPresent;
}



function addEtatSante(){

    $messageEtatSantePresent = "";
    $pdoStat = cnx_pdo_bdd()->prepare('SELECT * FROM sante WHERE etatSante = :etatSante');
    $pdoStat->bindValue(':etatSante', $_POST['addSante'], PDO::PARAM_STR);
    $pdoStat->execute();

    if ($pdoStat->rowCount() ==  0) {
        try {
            $objetPdo = cnx_pdo_bdd(); // appel à la fonction de connexion à la base de données
            $pdoStat = $objetPdo->prepare('INSERT INTO sante VALUES (NULL, :etatSante)');
            $pdoStat->bindValue(':etatSante', $_POST['addSante'], PDO::PARAM_STR);
            $pdoStat->execute();

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            exit();
        }
    }else {
        $messageEtatSantePresent = "etatSanté présent";
    }
    return $messageEtatSantePresent;
}