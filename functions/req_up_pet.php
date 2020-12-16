<?php
function update_pet_bdd()
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
            $pdoStat = $objetPdo->prepare("Update chat SET idChat = :idChat, nom = :nom, b_recep = :b_recep, sexe = :sexe, poids_recep = :poids_recep, vaccin = :vaccin, steril = :steril, puce_id = :puce_id, d_in = :d_in, d_out = :d_out, taille = :taille, idRace = :idRace, idSante = :idSante WHERE idChat = :idChat");
            $pdoStat->bindValue(':idChat', $_POST['modifChat'], PDO::PARAM_STR);
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