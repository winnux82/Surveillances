<?php
date_default_timezone_set('Europe/Brussels');
// Menu
require_once('menu.php');

//préparation de la requete 
$requete = 'SELECT * FROM habitations';
//requete
$q = $db->prepare($requete) or die(print_r($db->errorInfo()));
$url = '';

$position = ($_GET['id']) ?? null;

// pour vérifier que ça existe :
//print_r($position);
if (isset($position)) {
    if (!is_numeric($position)) {
        echo alert("Que du numérique mon ami :)");
        exit;
    }
    //echo "j'ai un enregistrement";
    $listehabitations = $db->query('select*from habitations where id=' . $position . '') or die(print_r($db->errorInfo()));
    while ($donnees = $listehabitations->fetch()) {
        $habitation = $donnees;
        //print_r($habitation);
        $url = '?position=' . $position;
    }
    if ($listehabitations->rowCount() === 0) {
        echo alert("Cette habitation n'existe pas ! :)");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surveillances habitations</title>
</head>

<body>
    <div class="contenu m-2" >


    <form action="habitation_sauvegarde.php" method="POST" enctype="multipart/form-data">
        <h1>Inscription surveillances habitations </h1>
        <fieldset>
            <?php if ($position === null) : ?>
                <legend>Ajouter une surveillance d'habitation</legend>
            <?php else : ?>
                <legend>Modification d'une habitation</legend>
            <?php endif ?>
            <table>

                <div class="m-1">
                    <tr>
                        <td>
                            ID :
                        </td>
                        <td><input type="text" class="form-control m-1" name="id" value="<?= $habitation['id'] ?? '' ?>"></td>
                    </tr>
                    <tr>
                        <td>Demandeur : </td>
                        <td>
                            <div class="input-group m-1">
                                <input type="text" class="form-control m-1" maxlength="50" name="demandeur" required autofocus placeholder="Obligatoire" value="<?= $habitation['demandeur'] ?? '' ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Adresse : </td>
                        <td>
                            <div class="input-group m-1">
                                <input type="text" class="form-control m-1" maxlength="50" name="adresse" required placeholder="Obligatoire" value="<?= $habitation['adresse'] ?? '' ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Localité : </td>
                        <td><input type="number" class="form-control m-1" maxlength="10" name="localite" required placeholder="Obligatoire" value="<?= $habitation['localite'] ?? '' ?>"></td>
                    </tr>
                    <tr>
                        <td>Date début : </td>
                        <td><input type="datetime-local" class="form-control m-1" name="datedebut" value="<?= $habitation['datedebut'] ?? '' ?>"></td>
                    </tr>

                    <tr>
                        <td>Date de fin : </td>
                        <td><input type="datetime-local" class="form-control m-1" name="datefin" value="<?= $habitation['datefin'] ?? '' ?>"></td>
                    </tr>

                    <tr>
                        <td>Mesures: </td>
                            <td>
                                <textarea class="form-control" id="txtArea" name="mesures" rows="4" cols="50"><?= $habitation['mesures'] ?? '' ?></textarea>
                            </td>
                    </tr>
                    <tr>
                        <td>Véhicule : </td>
                        <td><input type="text" class="form-control m-1" maxlength="50" name="vehicule" placeholder="Ex. Marque Modèle Plaque garage" value="<?= $habitation['vehicule'] ?? '' ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" m-1>
                            <?php if (isset($position)) echo 'Dernière modification : ' .  $habitation['dateupdate'] ?? ''; ?>
                        </td>
                    </tr>

                    <table>
                        <tr>
                            <td>
                                <input type="reset" name="bInit" value="Réinitialiser" class="btn btn-secondary m-1" />
                            </td>
                            <td>
                                &nbsp;<input type="submit" name="bAjouthabitation" value="<?= $position ? "Modifier" : "Ajouter" ?>" class="btn btn-primary m-1">
                            </td>
                        </tr>

                    </table>

        </fieldset>
    </form>

<div class="right_Side">
<h1><i class="fa fa-map-marker" aria-hidden="true"></i> Liste des habitations </h1><br>
<table border="1" class="table table-light">
<thead class="thead-light">
                                <tr>
                                <th>id</th>
                                <th>Adresse</th>
                                <th>Localité</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                
                                <th>Véhicule</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                                    </tr>
                                </thead>

                                <?php

    $requetesql = "select*, DATE_FORMAT(datedebut,'%d-%m-%Y %H:%i:%s') as datededébut, DATE_FORMAT(datefin,'%d-%m-%Y %H:%i:%s') as datedefin from gdp.habitations where datedebut <= now() and datefin >= now() order by datedebut asc";
    //$requetesql = 'select*from gdp.habitations where datedebut <= now() and datefin >= now() order by adresse desc';
    $listehabitations = $db->query($requetesql) or die(print_r($db->errorInfo()));
    while ($habitation = $listehabitations->fetch()) {
        //$datedebut = DateTime::createFromFormat('d-M-Y', $habitation['datedebut']) or die(print_r($db->errorInfo()));
        //$datedebut->format('d-m-Y H:i:s');

        echo '<tr>';
        echo '<td>' . $habitation['id'] . '</td>';
        echo '<td>' . $habitation['adresse'] . '</td>';
        echo '<td>' . $habitation['localite'] . '</td>';
        echo '<td>' . $habitation['datededébut'] . '</td>';
        echo '<td>' . $habitation['datedefin'] . '</td>';
        // echo '<td>' . $habitation['mesures'] . '</td>';
        echo '<td>' . $habitation['vehicule'] . '</td>';
        echo '<td><a href="habitations.php?id=' . $habitation['id'] . '">Modifier</a></td>';
        echo '<td><a onclick="return confirm(\'Voulez-vous vraiment supprimer cet élement ?\')" href="habitations.php?delhabitations=' . $habitation['id'] . ' " >Supprimer</a></td></tr>';
    }


    echo '</table><br><br><br>';


    //modifier un agent
    if (isset($_GET['id'])) {
        if (!is_numeric($_GET['id'])) {
            echo alert("Que du numérique mon ami :)");
            exit;
        }
        $req = $db->query('select*from habitations where id=' . $_GET['id'] . '') or die(print_r($db->errorInfo()));
        if ($req->rowCount() === 0) {
            echo alert("Cette habitation n'existe pas ! :)");
            exit;
        }
        while ($donnees = $listehabitations->fetch()) {
            $habitation = $donnees;
        }
    }

    //supprimer une habitation
    if (!empty(isset($_GET['delhabitations']))) {
        $id = verify_input($_GET['delhabitations']) ?? null;
        $query = $db->query('delete from habitations where id=' . $id . '');
        if ($query->rowCount() === 0) {
            echo alert('Cette habitation n\'existe pas !');
            exit;
        }
        header("Refresh:1");
        exit;
    }
    ?>
    </div>
</body>

</html>