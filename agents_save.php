<?php
// connection à la base 
require_once('config.php');
require_once('./src/functions.php');

//on récupère l'agent
$agent = $_POST;
/*
print_r($_POST);
exit;
*/
$position = verify_input($agent['id']);
$position = (int) $position;

if (!is_numeric($position)) {
    echo alert("Que du numérique mon ami :)");
    exit;
}
if (isset($_POST['bAjoutAgent'])) {

    if ($position == null) {
        if(!$agent['date'])
            $agent['date']='2000/01/01';

        //Création du nouvel agent
        $db->query('insert into agents (nom,prenom,datedenaissance,matricule,adresse,cp,tel,dateupdate) values ("' . $agent['lastname'] . '","' . $agent['firstname'] . '","' . $agent['date'] . '","' . $agent['matricule'] . '","' . $agent['adresse'] . '","' . $agent['cp'] . '","' . $agent['tel'] . '","' . date('l j F Y h:i:s A') . '")') or die(print_r($db->errorInfo()));
        header("location:agents.php");
        exit;
    } else {
    //update
    
        print_r($agent);
        $db->query('update agents set nom="' . $agent['lastname'] . '", prenom="' . $agent['firstname'] . '",datedenaissance="' . $agent['date'] .'",matricule="' . $agent['matricule'] . '",adresse="' . $agent['adresse'] . '",cp="' . $agent['cp'] . '",tel="' . $agent['tel'] . '", dateupdate="' . date('l j F Y h:i:s A') . '" where id="' . $position . '"') or die(print_r($db->errorInfo()));

        //Mise à jour de la date d'update
        //$db->query('update contact set creadate="' . date('l j F Y h:i:s A') . '", user="' . $_SESSION["username"] . '" where id="' . $_POST['contactid'] . '"') or die(print_r($db->errorInfo()));
        header("location:agents.php");
        exit;

}}
