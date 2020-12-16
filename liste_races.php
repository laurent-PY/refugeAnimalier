<?php
include 'functions/req_sel_race_sante_color_chat.php';
include 'functions/cnx_bdd.php';
include "functions/req_delete_pet_race_color_sante.php";
$race = req_Sel_Race(); // dans cette variable est stocké le resultat du SElect qui me permet d'afficher un tableau et de faire une liste des compagnons
if (isset($_POST['delRace'])){
    $delRace = $_POST['delRace'];
    delete_race($delRace);
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
                <a class="btn btn-primary" href="liste_compagnons.php" role="button">Liste des compagnons</a>
                <a class="btn btn-primary" href="administration.php" role="button">Administration</a>
                <a class="btn btn-primary" href="liste_races.php" role="button">liste des races</a>
                <a class="btn btn-primary" href="liste_couleurs.php" role="button">liste des couleurs</a>
                <a class="btn btn-primary" href="liste_etatSante.php" role="button">liste des état de santé</a>
            </p>
        </div>
    </div>
</div>
<div class="bodyMinMain mrgTp">
    <div class="card shadow bg-white rounded">
        <div class="card-header">
            <h3 class="ajtcompagnon">Liste des races :</h3>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Race</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($race as $races): ?>
                    <td><?= $races['idRace']?></td>
                    <td><?= $races['nomRace'] ?></td>
                    <form action="" method="POST">
                        <td><input type="submit" class="btn btn-danger" name="delete" value="Supprimer"></td> </td>
                        <input type="hidden" class="btn btn-danger" name="delRace" value="<?php echo $races['idRace'] ?>">
                        </form>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>