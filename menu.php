<?php
// Initialize the session
session_start();
// connection à la base
require_once('config.php');
require_once('./src/functions.php');



// Check if bootstrap exist;
$bootstrap= null;
if(file_exists('/node_modules/bootstrap/dist/css/bootstrap.min.css'))
$bootstrap = '/node_modules/bootstrap/dist/css/bootstrap.min.css';
else
$bootstrap = '"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Surveillances habitations v<?=$version?></title>
</head>

<body>

  <nav class="navMenu">
    <div class="logo">
      <div class="left_Side">
        <table>
          <tr>
            <tD><img src="gdp.jpg" alt=""></td>
            <td>
              <H1 class="m-2 text-dark">Surveillances habitations v<?=$version?></h1>
              <?php DireBonjour() ?>. <a href="logout.php" class="btn btn-danger m-2"><i class="fa fa-power-off" aria-hidden="true"></i> Se déconnecter</a>
            </td>
        </table>
      </div>
      <div class="right_Side">
        <ul>
          <?= nav_item('/index.php', 'Acceuil', 'fa fa-home aria-hidden=true'); ?>
          <?= nav_item('/agents.php', 'Agents', 'fa fa-id-card-o aria-hidden=true'); ?>
          <?= nav_item('/habitations.php', 'Habitations', 'fa fa-list aria-hidden=true'); ?>
          <?= nav_item('/validation.php', 'Validation', 'fa fa-list aria-hidden=true'); ?>
          <?= nav_item('/options.php', 'Options', 'fa fa-cogs aria-hidden=true'); ?>
        </ul>
      </div>
    </div>
  </nav>


</body>

<!-- js placed at the end of the document so the pages load faster -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

<footer>
    <p class="copyright">©Surveillances habitations v<?=$version?> by Vandermeulen Christophe - Tous droits réservés Copyright 2022</p>
</footer>

</html>