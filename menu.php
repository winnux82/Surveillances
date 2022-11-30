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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
              <a href="logout.php" class="btn btn-danger m-2"><i class="fa fa-power-off" aria-hidden="true"></i> Se déconnecter</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- //x0p
<script src="node_modules/x0popup/dist/x0popup.min.js"></script>
<link rel="stylesheet" href="node_modules/x0popup/dist/x0popup.min.css"> -->


<footer>
    <p class="copyright">© Surveillances habitations v<?=$version?> by Vandermeulen Christophe - Tous droits réservés Copyright 2022</p>
</footer>

</html>