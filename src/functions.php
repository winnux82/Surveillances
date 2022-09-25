<?php

//Fonction listing Catégorie
function ShowCategory()
{
  include('config.php');
  $inter = '<option value="-1">Choisissez une catégorie</option>';
  $query = $db->query('select * from category order by name ') or die(print_r($bdd->errorInfo()));;
  while ($donnees = $query->fetch()) {
    $inter .= '<option value="' . $donnees['name'] . '">' . $donnees['name'] . '</option>';
  }
  return $inter;
}

//Fonction listing Pays
function ShowCountry()
{
  include('config.php');
  $inter = '<option value="-1">Choisissez un pays</option>';
  $query = $db->query('select * from country order by name ') or die(print_r($bdd->errorInfo()));;
  while ($donnees = $query->fetch()) {
    $inter .= '<option value="' . $donnees['name'] . '">' . $donnees['name'] . '</option>';
  }
  return $inter;
}

//Fonction Bonjour
function DireBonjour()
{
  // Salutation en fonction de l'heure :o
  if (date('G') >= 0 && date('G') < 18) {
    echo 'Bonjour <b>' . htmlspecialchars($_SESSION["username"]) . ' !</b><br />';
  } else {
    echo 'Bonsoir <b>' . htmlspecialchars($_SESSION["username"]) . ' !</b><br />';
  }
}

//Fonction PostImage
function PostImage()
{
  include('config.php');
  $inter = '<option value="-1">Choississez une option</option>';
  $query = $db->query('select * from category order by name ') or die(print_r($bdd->errorInfo()));;
  while ($donnees = $query->fetch()) {
    $inter .= '<option value="' . $donnees['name'] . '">' . $donnees['name'] . '</option>';
  }
  return $inter;
}

//Fonction NavItem

function nav_item(string $lien, string $titre, string $icone = null): string
{
  $classe = 'nav-item';
  if ($_SERVER['SCRIPT_NAME'] === $lien) {
    $classe .= ' active';
  }
  return '<li class="' . $classe . '"><a href="' . $lien . '"><i class="' . $icone . '"></i>' . '&nbsp;' . $titre . '</a></li>';
}

// REGEX Email
function validateEmail($email)
{
  $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
  if (!preg_match($regex, $email)) {
    echo "<div class='alert alert-danger'>Ceci n'est pas une adresse mail !</div>";
    echo "<a href='#' onclick='history.back();' class='btn btn-primary m-2'>Back</a>";
    exit;
  }
}

// Vérifier les données :)
function verify_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// fonction Alerte
function alert($erreur){
  $alert = '<div class="alert alert-warning">';
  $alert .= "$erreur";
  $alert .= '</div>';
  return $alert;
  exit;

}