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
                                
                                    </tr>
                                </thead>';


    $requetesql = "select*, DATE_FORMAT(datedebut,'%d-%m-%Y %H:%i') as datededébut, DATE_FORMAT(datefin,'%d-%m-%Y %H:%i') as datedefin from gdp.habitations where datedebut <= now() and datefin >= now() order by datedebut asc";
    //$requetesql = 'select*from gdp.habitations where datedebut <= now() and datefin >= now() order by adresse desc';
    $listehabitations = $db->query($requetesql) or die(print_r($db->errorInfo()));
    while ($habitation = $listehabitations->fetch()) {
        //$datedebut = DateTime::createFromFormat('d-M-Y', $habitation['datedebut']) or die(print_r($db->errorInfo()));
        //$datedebut->format('d-m-Y H:i:s');
?>
        <tr >
        <td id='DataId<?=$habitation['id']?>'><?= $habitation['id'] ?></td>
        <td id='DataAdresse<?=$habitation['id']?>'><?=$habitation['adresse']?></td>
        <td id='DataLocalite<?=$habitation['id']?>'><?=$habitation['localite']?></td>
        <td id='DataDatededébut<?=$habitation['id']?>'><?=$habitation['datededébut']?></td>
        <td id='DataDatedefin<?=$habitation['id']?>'><?=$habitation['datedefin']?></td>
        <div hidden id="DataMesures<?=$habitation['id']?>'>"><?=$habitation['mesures']?></div>
        <div hidden id="DataVehicule<?=$habitation['id']?>'>"><?=$habitation['vehicule']?></div>
          
        <td>
        <!-- Button trigger modal -->
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="habitbutton<?=$habitation['id']?>">
          <?php echo '
          Détails
        </button></td>';
        echo '</tr>';
    }


    echo '</table><br><br><br>'; ?>


<script type="text/javascript">
  $('#exampleModal').modal
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
});

document.getElementById('detailshabitation') = document.getElementById('DataAdresse5').innerText;

</script>



<!-- Modal "modal fade bd-example-modal-lg" -->
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
        <table id="Détails habitation" >
            <tr><td><h2>Rue de Roulers 69</h2></td></tr>
            <tr><td>Date Départ: 01/01/2020</td></tr>
            <tr><td>Date Retour: 31/12/2020</td></tr>
            <tr><td>Mesures : </td></tr>
            <tr><td>azerazer zaer azere aze ds jmdsfigj sdfm jisdfmgis djfmgsdifjg mdfijgs migjsmr aze razer azer azeraz erza</td></tr>
            <tr><td>aezraer</td></tr>
        </table>
        <table id="AgentComm" class="table"> 
          <tr>
            <td width="40%"><h5><span class="label label-default">Matricule</span></h5></td>
            <td width="60%">
              <div class="input-group m-1">
                  <select name="agent" class="form-select form-select-lg mb-2">
                  <?php echo ShowAgent(); ?>
                        <option selected="selected"><?= $infocontact['agent']?></option>
                  </select></td>
              </div>
            </td>
          </tr>
          <tr>
              <td><h5><span class="label label-default">Message : </span></h5></td>
              <td><div class="mb-3"><textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="4"></textarea></div></td>
          </tr>
        </table>
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