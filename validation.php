<?php

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
require_once('habitations_listing.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation surveillances habitations</title>
</head>

<body>
    <?php
date_default_timezone_set('Europe/Brussels');
    // Exécution de la requête
    echo '<div class="right_Side">';
    echo '<h1><i class="fa fa-map-marker" aria-hidden="true"></i> Liste des dernières validations </h1><br>';
    echo '<table border="1" class="table table-light">';
    echo '<thead class="thead-light">
                                <tr>
                                <th>id</th>
                                <th>Adresse</th>
                                <th>Date</th>
                                <th>Agent</th>
                                <th>Message</th>
                                </tr>
                                </thead>';
    /*$listehabitations = $db->query("select*, DATE_FORMAT(date,'%d-%m-%Y %H:%i') as dateFormat, from validations order by idvalidations desc limit 5") or die(print_r($db->errorInfo()));
    while ($habitation = $listehabitations->fetch()) {
*/
$listehabitations = $db->query("select *, DATE_FORMAT(date,'%d-%m-%Y %H:%i') as DateFormatée from gdp.validations order by idvalidations desc limit 5") or die(print_r($db->errorInfo()));
while ($habitation = $listehabitations->fetch()) {
        echo '<tr>';
        echo '<td>' . $habitation['idvalidations'] . '</td>';
        echo '<td>' . $habitation['habitation'] . '</td>';
        echo '<td>' . $habitation['DateFormatée'] . '</td>';
        echo '<td>' . $habitation['matricule'] . '</td>';
        echo '<td>' . $habitation['message'] . '</td>';
    }


    echo '</table><br><br><br>';
?>

</body>
</html>