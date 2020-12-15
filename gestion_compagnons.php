<?php
include 'functions/cnx_bdd.php'; // permet d'acceder au script dans le dossier "functions" et de pouvoir executer la fonction cnx_pdo_bdd()
include 'functions/req_sel_race_sante_color_chat.php';
include 'functions/req_insert_pet_race_color.php';
include 'functions/req_delete_pet_race_color_sante.php';
include 'functions/req_update.php';
$messageAddSuccess = false; // j'initialise une variable a false pour la passer a true lors du traitement de la requête
$messageChampVide = false;
$messagePetPresent = "";
$race = req_Sel_Race(); // cette variable me permet de faire un foreach sur un select et de remplacer les options de ce select par les champ de la base, ça me permet un affichage dynamique.
$sante = req_Sel_Sante();
$pdoBdd = cnx_pdo_bdd(); // dans cette variable est stocké l'objet de connexion
$chat = req_Sel_Chat(); //


if (isset($_POST['subPet'])){ // je test si mon formulaire à été initialisé,
    // si oui; j'effectue un contrôle sur certain champ, c'est à dire, ceux que je n'ai pas encapsulé dans un <select>
    if (!empty($_POST['nom']) && !empty($_POST['b_recep']) && !empty($_POST['poids_recep']) && !empty($_POST['d_in']) && !empty($_POST['d_out']) && !empty($_POST['taille'])) {
        try {

            $objetPdo = cnx_pdo_bdd(); // Connexion à la base en passant par le dossier functions
            $messagePetPresent = insert_pet_bdd(); // ici je test si le compagnon que je suis en train d'ajouter et déjà présent dans la Bdd
            //pour éviter d'avoir les deux message d'information qui s'affichent en même temps je teste avec un if,
            if ($messagePetPresent != ""){ // si la variable de test $messagePetPresent à retourné un resultat non null
                $messageAddSuccess = false; // je n'affiche pas le resultat
            }else {
                $messageAddSuccess = true; // Sinon je l'affiche
            }

        } catch (Exception $e) {  //message relatif aux erreurs liés à la connexion de bdd
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            exit();
        }
    } else {
        $messageChampVide = true; // si le bouton du formulaire a été cliké et qu'un champ défini lors du contrôle est vide je retourne true.
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
            <h3 class="ajtcompagnon">ajout de compagnon</h3>
        </div>
        <div class="card-body fondCardBody">
            <form action="#" method="post"> <!--début du formulaire qui a pour action un # qui sous-entend que je cible cette page pour le traitement-->
                <div class="row"> <!--toujours la classe row pour emtamer un partitionement des col dans le formulaire-->
                    <div class="col-md-4" ><label>Nom du compagon : </label></div>
                    <div class="col-md-3"><input class="w-100" type="text" name="nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>"></div> <!--lorsque le form est soumis je garde son contenu en passant par un isset-->
                    <div class="col-md-5">Nom du compagnon</div>
                    <div class="col-md-4"><label for="age_reception">L'age lors de la réception : </label></div>
                    <div class="col-md-3"><input type="text" class="w-100" name="b_recep" value="<?php if (isset($_POST['b_recep'])){echo $_POST['b_recep'];} ?>"></div>
                    <div class="col-md-5">Age estimé lors de l'entrée au refuge(arrondir à l'année)</div>
                    <div class="col-md-4"><label for="sexe">Le genre du compagnon : </label></div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="sexe" value="<?php if (isset($_POST['sexe'])){echo $_POST['sexe'];} ?>">
                                    <option value="femelle">Femelle</option>
                                    <option value="male">Male</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">Mâle ou femmelle</div>
                    <div class="col-md-4"><label for="poids_recep">Le poids lors de la reception : </label></div>
                    <div class="col-md-3"><input type="text" class="w-100" name="poids_recep" value="<?php if (isset($_POST['poids_recep'])){echo $_POST['poids_recep'];} ?>"></div>
                    <div class="col-md-5">Précisez en kilogrammes</div>
                    <div class="col-md-4"><label for="vaccin">Vaccin à jour : </label></div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="vaccin" value="<?php if (isset($_POST['vaccin'])){echo $_POST['vaccin'];} ?>">
                                    <option value= 0 >Non</option>
                                    <option value= 1 >Oui</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">Dernier vaccin effectué de moins de 12 mois</div>
                    <div class="col-md-4"><label for="steril">Compagnon stérilisé : </label></div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="steril" value="<?php if (isset($_POST['steril'])){echo $_POST['steril'];} ?>">
                                    <option value= 0 >Non</option>
                                    <option value= 1 >Oui</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">A déjà été stérilisé</div>
                    <div class="col-md-4"><label for="puce_id">Puce d'identification : </label></div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="puce_id" value="<?php if (isset($_POST['pude_id'])){echo $_POST['puce_id'];} ?>">
                                    <option value= 0 >Non</option>
                                    <option value= 1 >Oui</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">Posséde une puce d'identification</div>
                    <div class="col-md-4"><label for="d_in">Date d'entrée au refuge : </label></div>
                    <div class="col-md-3"><input type="date"name="d_in" value="<?php if (isset($_POST['d_in'])){echo $_POST['d_in'];} ?>"></div>
                    <div class="col-md-5">Date d'admission au refuge</div>
                    <div class="col-md-4"><label for="d_out">Date de sortie du refuge : </label></div>
                    <div class="col-md-3"><input type="date"name="d_out" value="<?php if (isset($_POST['d_out'])){echo $_POST['d_out'];} ?>"></div>
                    <div class="col-md-5">Date de sortie du refuge</div>
                    <div class="col-md-4"><label for="taille">Taille du compagnon : </label></div>
                    <div class="col-md-3"><input type="text" class="w-100" name="taille" value="<?php if (isset($_POST['taille'])){echo $_POST['taille'];} ?>"></div>
                    <div class="col-md-5">La taille d'un compagnon se mesure au garot</div>
                    <div class="col-md-4"><label for="idRace">Identificateur de race : </label></div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="idRace" value="<?php if (isset($_POST['idRace'])){echo $_POST['idRace'];}  ?>">
                                    <?php foreach($race as $races){ ?>
                                        <option value="<?= $races['idRace']; ?>"><?= $races['nomRace']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">Constat de la race du compagnon</div>
                    <div class="col-md-4"><label for="idSante">Identificateur d'état de santé : </label></div>
                    <!--dans mon formulaire j'utilise des selects pour forcer les choix et éviter de peupler la base n'importe comment ou avec des doublons inutiles que ce soit dans la table race, Sante ou couleur.
                    pour ce faire j'utilise un foreach qui va afficher chaque etatSante qui est renseigné dans la table.-->
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="idSante" value="<?php if (isset($_POST['etatSante'])){echo $_POST['etatSante'];} ?>">
                                    <?php foreach($sante as $santes){ ?>
                                        <option value="<?= $santes['idSante']; ?>"><?= $santes['etatSante']; ?></option>  <!--dans le value de l'option je remplace le contenu en dur par les éléments de la base-->
                                    <?php } ?>                                                                             <!--la première balise php contient l'id de santé, c'est celui là que je passe en requete-->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">Son état de santé visuel lors de l'admission</div>
                    <div class="col-md-4"><label for="sub"><input type="submit" name="subPet" value="Enregistrer"></label></div>
                    <div class="col-md-8">
                        <?php if ($messageAddSuccess) {
                            ?> <div class="alert alert-success alert-dismissible fade show" role="alert" id="hideDivAjoutOk">
                                Le compagnon a été ajouté.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button
                            </div>

                            <?php
                        }
                        ?>
                        <?php if ($messageChampVide)  {
                            ?> <div class="alert alert-warning alert-dismissible" role="alert" id="hideDivChampAbsent">
                                Veuillez remplir tous les champ du formulaire.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if ($messagePetPresent)  {
                            ?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="hideDivItemExist">
                            <?= "le compagnon " . $_POST['nom'] . " Existe déjà ." ?>
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
</div>

</body>
</html>