<?php
// connection à la base 
require_once('config.php');
include('menu.php');


$url = '';
$position = null;

// pour vérifier que ça existe : print_r($position);
$position = verify_input($_GET['id']) ?? null;
$positionid = verify_input($_GET['from']) ?? null;
$supprimetel = verify_input($_GET['supprimertel']) ?? null;
$supprimeadresse = verify_input($_GET['supprimeradresse']) ?? null;






//supprimer un numéro de tél
if (!empty(isset($_GET['supprimertel']))) {
    
if(!is_numeric($positionid))
{
    echo alert("Que du numérique mon ami :)");
    exit;
}
    $query = $db->query('delete from telephone where id=' . $supprimetel . '');
    $db->query('update contact set creadate="' . date('l j F Y h:i:s A') . '", user="' . $_SESSION["username"] . '" where id="' . $positionid . '"') or die(print_r($db->errorInfo()));
    if ($query->rowCount() === 0) {
        echo alert('Ce numéro de téléphone n\'existe pas !');
        exit;
    }
    header("location:voir.php?id=$positionid");
    exit;
}

//supprimer une adresse
if (!empty(isset($_GET['supprimeradresse']))) {
    
if(!is_numeric($positionid))
{
    echo alert("Que du numérique mon ami :)");
    exit;
}
    $query = $db->query('delete from adresse where id=' . $supprimeadresse . '');
    $db->query('update contact set creadate="' . date('l j F Y h:i:s A') . '", user="' . $_SESSION["username"] . '" where id="' . $positionid . '"') or die(print_r($db->errorInfo()));
    if ($query->rowCount() === 0) {
        echo alert('Cette adresse n\'existe pas !');
        exit;
    }
    header("location:voir.php?id=$positionid");
    exit;
}



//si la position est null => liste
if ($position == null) {
    return header('location: liste.php');
    exit;
}


//vérifier que l'élément existe dans le tableau avant de le supprimer sinon rediriger vers la page liste.php
if (isset($position)) {
    if(!is_numeric($position))
{
    echo alert("Que du numérique mon ami :)");
    exit;
}
    $query = $db->query('delete from contact where id=' . $position . '');
}
//si il y a une erreur
if ($query == false) {
    echo alert('Une erreur s\'est produite, veuillez réessayer plus tard !');
    exit;
}

//si 0 ligne traitée
if ($query->rowCount() === 0) {
    echo alert('Enregistrement inconnu !');
    exit;
} elseif ($query->rowCount() === 1) {
    echo alert('Ligne traitée !');
    header('Refresh : 1; URL=liste.php');
    exit;
}



//header('Refresh : 2; URL=liste.php');
//return header('Refresh : 1; URL=liste.php');
//exit;