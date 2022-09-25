<?php
// connection à la base 
require_once('config.php');
require_once('functions.php');

//on récupère l'agent
$habitation = $_POST;
/*print_r($habitation);
exit;
*/
//print_r($habitation);

$position = verify_input($habitation['id']);
$position = (int) $position;

if (!is_numeric($position)) {
    echo alert("Que du numérique mon ami :)");
    exit;
}
if (isset($_POST['bAjouthabitation'])) {

    if ($position == null) {

        //Création d'une nouvelle habitation
        $db->query('insert into habitations (adresse,localite,demandeur,datedebut,datefin,mesures,vehicule,dateupdate) values ("' . $habitation['adresse'] . '","' . $habitation['localite'] . '","' . $habitation['demandeur'] . '","' . $habitation['datedebut'] . '","' . $habitation['datefin'] . '","' . $habitation['mesures'] . '","' . $habitation['vehicule'] . '","' . date('l j F Y h:i:s A') . '")') or die(print_r($db->errorInfo()));
        header("location:habitations.php");
        exit;
    } else {
        //sinon update
    
        print_r($habitation);
        $db->query('update habitations set nom="' . $habitation['lastname'] . '", prenom="' . $habitation['firstname'] . '",datedenaissance="' . $habitation['date'] .'",matricule="' . $habitation['matricule'] . '",adresse="' . $habitation['adresse'] . '",cp="' . $habitation['cp'] . '",tel="' . $habitation['tel'] . '", dateupdate="' . date('l j F Y h:i:s A') . '" where id="' . $position . '"') or die(print_r($db->errorInfo()));

        //Mise à jour de la date d'update
        //$db->query('update contact set creadate="' . date('l j F Y h:i:s A') . '", user="' . $_SESSION["username"] . '" where id="' . $_POST['contactid'] . '"') or die(print_r($db->errorInfo()));
        header("location:habitations.php");
        exit;

}}
