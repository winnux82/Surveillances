<?php
date_default_timezone_set('Europe/Brussels');


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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous">

    </script>
</head>
<body>


<?php


    // Exécution de la requête
    echo '<div class="right_Side">';
    echo '<h1><i class="fa fa-map-marker" aria-hidden="true"></i> Liste des habitations </h1><br>';
    echo '<table border="1" class="table table-light">';
    echo '<thead class="thead-light">
                                <tr>
                                <th>id</th>
                                <th>Adresse</th>
                                <th>Localité</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                                    </tr>
                                </thead>';


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
        echo '<td><!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Détails
        </button></td>';
        echo '<td><a href="habitations.php?id=' . $habitation['id'] . '">Modifier</a></td></tr>';
    }


    echo '</table><br><br><br>'; ?>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Détails surveillance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="habitations.php?id=' . $habitation['id'] . '">Modifier</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>