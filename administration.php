<?php
include 'functions/cnx_bdd.php'; // permet d'acceder au script dans le dossier "functions" et de pouvoir executer la fonction cnx_pdo_bdd()
include 'functions/req_sel_race_sante_color_chat.php';
include 'functions/req_insert_pet_race_color.php';
include 'functions/req_delete_pet_race_color_sante.php';
$messageAddSuccessRace = false;
$messageRacePresent = "";
$messageChampVideRace = false;

$messagePetPresent = "";
$messageCouleurPresent = "";
$messageChampVidecouleur = false;

$messageAddSuccessCouleur = false;

$messageAddSuccessEtatSante = false;
$messageChampVideEtatSante = false;
$messageEtatSantePresent = "";

if (isset($_POST['subRace'])){ // me permet d'ajouter une race, j'utilise ce form dans avec le bouton "administration"
    if (!empty($_POST['addRace'])) {
        try {
            $objetPdo = cnx_pdo_bdd();// appel de la fonction addrace dans le dossier functions qui permet de faire une requête pour insérer une nouvelle race.
            $messageRacePresent = addRace();
            if ($messageRacePresent != ""){ // si la variable de test $messagePetPresent à retourné un resultat non null
                $messageAddSuccessRace = false;// je n'affiche pas le message
            }else {
                $messageAddSuccessRace = true;// Sinon je l'affiche
            }

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            exit();
        }
    } else {
        $messageChampVideRace = true;
    }
}



if (isset($_POST['subCouleur'])){
    if (!empty($_POST['addCouleur'])) {
        try {
            $objetPdo = cnx_pdo_bdd();
            $messageCouleurPresent = addCouleur();
            if ($messageCouleurPresent != ""){ // si la variable de test $messagePetPresent à retourné un resultat non null
                $messageAddSuccessCouleur = false;// je n'affiche pas le message
            }else {
                $messageAddSuccessCouleur = true;// Sinon je l'affiche
            }// appel à la fonction d'ajouter de couleur

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            exit();
        }
    } else {
        $messageChampVidecouleur = true;
    }
}
if (isset($_POST['subSante'])){
    if (!empty($_POST['addSante'])) {
        try {
            $objetPdo = cnx_pdo_bdd();
            $messageEtatSantePresent = addEtatSante();
            if ($messageEtatSantePresent != ""){ // si la variable de test $messagePetPresent à retourné un resultat non null
                $messageAddSuccessEtatSante = false;// je n'affiche pas le message
            }else {
                $messageAddSuccessEtatSante = true;// Sinon je l'affiche
            }// appel à la fonction d'ajouter de couleur

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            exit();
        }
    } else {
        $messageChampVideEtatSante = true;
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="scripts.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bckgrnd">
<div class="container mrgTpMenu">
    <div class="row">
        <div class="col-md-12">
            <p class="ctrMenu">  <!--ajout d'une classe qui me permet de centrer les divs du menu-->
                <a class="btn btn-primary" href="accueil.php" role="button">Accueil</a>
                <a class="btn btn-primary" href="gestion_compagnons.php" role="button">Gestion des compagnons</a>
                <a class="btn btn-primary" href="administration.php" role="button">Administration</a>
                <a class="btn btn-primary" href="liste_compagnons.php" role="button">Liste des compagnons</a>
                <a class="btn btn-primary" href="liste_races.php" role="button">liste des races</a>
                <a class="btn btn-primary" href="liste_couleurs.php" role="button">liste des couleurs</a>
                <a class="btn btn-primary" href="liste_etatSante.php" role="button">liste des état de santé</a>
            </p>
        </div>
    </div>
</div>
<div class="container mrgTp">
    <div class="card shadow bg-white rounded">
        <div class="card-header">
            <h3 class="ajtcompagnon">Administration ...</h3>
        </div>
        <div class="card-header">
            <form action="#" method="post">
                <div class="row ">
                    <!--Race à ajouter via form "Administration"-->
                    <div class="col-md-4 " ><label>Race à ajouter</label></div>
                    <div class="col-md-3"><input class="w-100" type="text"name="addRace" value="<?php if (isset($_POST['addRace'])){echo $_POST['addRace'];} ?>"></div>
                    <div class="col-md-2"><label for="sub"><input type="submit" name="subRace" value="Enregistrer"></label></div>
                    <div class="col-md-3">Avec Majuscule sans point, merci</div>

                    <div class="col-md-12">
                        <?php if ($messageChampVideRace)  {
                            ?> <div class="alert alert-warning alert-dismissible" role="alert" id="hideDivChampAbsent">
                                Veuillez remplir tous les champ du formulaire.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if ($messageAddSuccessRace)  {
                            ?> <div class="alert alert-success alert-dismissible" role="alert" id="hideDivChampAbsent">
                                <?= "La race " . $_POST['addRace'] . " a été ajoutée ." ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if ($messageRacePresent)  {
                            ?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="hideDivItemExist">
                            <?= "La race " . $_POST['addRace'] . " Existe déjà ." ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-4 " ><label>Couleur à ajouter</label></div>
                    <div class="col-md-3"><input class="w-100" type="text"name="addCouleur" value="<?php if (isset($_POST['addCouleur'])){echo $_POST['addCouleur'];} ?>"></div>
                    <div class="col-md-2"><label for="sub"><input type="submit" name="subCouleur" value="Enregistrer"></label></div>
                    <div class="col-md-3">Avec Majuscule sans point, merci</div>

                    <div class="col-md-12">
                        <?php if ($messageChampVidecouleur)  {
                            ?> <div class="alert alert-warning alert-dismissible" role="alert" id="hideDivChampAbsent">
                                Veuillez remplir tous les champ du formulaire.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if ($messageAddSuccessCouleur)  {
                            ?> <div class="alert alert-success alert-dismissible" role="alert" id="hideDivChampAbsent">
                                <?= "La couleur " . $_POST['addCouleur'] . " a été ajoutée ." ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if ($messageCouleurPresent)  {
                            ?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="hideDivItemExist">
                            <?= "La couleur " . $_POST['addCouleur'] . " existe déjà ." ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <!--Couleur à ajouter via form "Administration"-->
                    <div class="col-md-4 " ><label>Etat de santé à ajouter</label></div>
                    <div class="col-md-3"><input class="w-100" type="text"name="addSante" value="<?php if (isset($_POST['addSante'])){echo $_POST['addSante'];} ?>" ></div>
                    <div class="col-md-2"><label for="sub"><input type="submit" name="subSante" value="Enregistrer"></label></div>
                    <div class="col-md-3">Avec Majuscule sans point, merci</div>
                    <div class="col-md-12">
                        <?php if ($messageChampVideEtatSante)  {
                            ?> <div class="alert alert-warning alert-dismissible" role="alert" id="hideDivChampAbsent">
                                Veuillez remplir tous les champ du formulaire.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if ($messageAddSuccessEtatSante)  {
                            ?> <div class="alert alert-success alert-dismissible" role="alert" id="hideDivChampAbsent">
                                <?= "L'état de santé " . $_POST['addSante'] . " a été ajouté." ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if ($messageEtatSantePresent)  {
                            ?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="hideDivItemExist">
                            <?= "L'état  " . $_POST['addSante'] . " existe déjà ." ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


