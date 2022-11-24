

<div class="right_Side m-5">
<h1><i class="fa fa-map-marker" aria-hidden="true"></i> Liste des habitations </h1><br>
<table border="1" class="table table-hover table-light" id="tableauHabitations">
<thead class="thead-light">
                                <tr>
                                <th>id</th>
                                <th>Adresse</th>
                                <th>Localité</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                <th>Modifier</th>
                                
                                    </tr>
                                </thead>

<?php


//préparation de la requete 

require_once('config.php');

$connection = mysqli_connect('localhost','eleve','eleve','gdp');
$sql = "select*, DATE_FORMAT(datedebut,'%d-%m-%Y %H:%i') as dateDebutFormat, DATE_FORMAT(datefin,'%d-%m-%Y %H:%i') as dateFinFormat from gdp.habitations where datedebut <= now() and datefin >= now() order by datedebut asc";
$result = mysqli_query($connection,$sql);
$i = 1;
while($row = mysqli_fetch_array($result)) 
{
  ?>
  <tr data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">
    <td><?= $row['id'] ?></td>
        <td><?=$row['adresse']?></td>
        <td><?=$row['localite']?></td>
        <td><?=$row['dateDebutFormat']?></td>
        <td><?=$row['dateFinFormat']?></td>
        <td>
          <button type="button" class="btn btn-primary">Détails</button>
        </td>
  </tr>
<div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Détails surveillance</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="false">&times;</span>
          </button></div>
        <div class="modal-body">
          <div class="informationHabitation">

            <!-- <h5>ID : <?php echo $row['id']; ?></h5> -->
            <b>Adresse : </b><?php echo $row['adresse']; ?><br>
            <b>Localité : </b><?php echo $row['localite']; ?><br>
            <b>Demandeur : </b><?php echo $row['demandeur']; ?><br>
            <b>Date départ : </b><?php echo $row['dateDebutFormat']; ?><br>
            <b>Date retour : </b><?php echo $row['dateFinFormat']; ?><br>
            <b>Mesures de sécurité: </b><?php echo $row['mesures']; ?><br>
            <b>Véhicule: </b><?php echo $row['vehicule']; ?><br>
            </div><br>
          <a href="https://www.google.com/maps/place/<?=$row['adresse']?>,+<?=$row['localite']?>+Mouscron" target="_blank">
          <img src="/images/googlemap100.png" alt="googlemap" width="50">
          </a>
            <h5>
                <div class="barre horizontale">_______________________________________________________</div></h5>
<div class="ValidationHabitation">
  <form action="habitation_validation.php" method="POST" enctype="multipart/form-data">
  <h5><span class="label label-default">Matricule</span></h5>
                    <div class="input-group m-1">
                      <select name="agent" class="form-select form-select-lg mb-2">
                      <?php echo ShowAgent(); ?>

                      </select>
                      <div class="adresse">
                        <input type="hidden" name="adresse" value="<?=$row['adresse']?>">
                      </div>
                    </div>
                      <h5><span class="label label-default">Message : </span></h5>
                  <div class="mb-3"><textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="4"></textarea></div>

                  <input type="submit" name="bValiderHabitation" value="Valider" class="btn btn-primary m-1">
            </div>
  </form>
</div>

          
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div></div>
  </div>
</div>


  <?php 
    $i++;
    }
  ?>

</table>

