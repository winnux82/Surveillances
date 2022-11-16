   
    <?php

//Fonction listing Agents
function ShowAgent()
{
  include('config.php');
  $inter = '<option value="-1">Choisissez un agent</option>';
  $query = $db->query('select * from agents order by matricule ') or die(print_r($bdd->errorInfo()));;
  while ($donnees = $query->fetch()) {
    $inter .= '<option value="' . $donnees['matricule'] . '">' . $donnees['matricule'] . '</option>';
  }
  return $inter;
}


//Fonction listing Surveillances habitations
function ShowHabitation()
{
  include('config.php');
  $inter = '<option value="-1">Choisissez l\'habitation à valider</option>';
  $query = $db->query('select * from habitations order by adresse ') or die(print_r($bdd->errorInfo()));;
  while ($donnees = $query->fetch()) {
    $inter .= '<option value="' . $donnees['adresse'] . '">' . $donnees['adresse'] . '</option>';
  }
  return $inter;
}

//Fonction convertir la date
function convertiondedate($date) {
  
  $blabla = DateTime::createFromFormat('j-M-Y', $date);
  echo $blabla->format('d-m-Y');
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

function ConvertDate($date) {
  $orgDate = $date;  
  $date = str_replace('-"', '/', $orgDate);  
  $newDate = date("Y/m/d", strtotime($date));  
  echo "New date format is: ".$newDate. " (YYYY/MM/DD)";  
}


// fonction Alerte
function alert($erreur){
  $alert = '<div class="alert alert-warning">';
  $alert .= "$erreur";
  $alert .= '</div>';
  return $alert;
  exit;

}

