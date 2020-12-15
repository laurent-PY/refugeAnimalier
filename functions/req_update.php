<?php
function recupIdchat($idChat)
{

    $pdoBdd = cnx_pdo_bdd(); //initialisation de la variable de connexion $pdoBdd en utilisant la fonction introduite via "require 'conn_bdd.php';"
    $pdoStat = $pdoBdd->prepare("SELECT * FROM chat WHERE idChat = " . $idChat); //preparation de la requete stockée dans $pdoStat
    $pdoStat->execute(); //execution de la requete


    if ($pdoStat->rowCount() ==  0) {
        echo 'aucune données à afficher.';
    } else {
        header('location: modification_compagnons.php');
    }
    return $idChat;
}

