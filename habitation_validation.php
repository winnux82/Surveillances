<?php
// connection à la base
require_once('config.php');
require_once('./src/functions.php');

//on récupère l'agent
$validation = $_POST;
/*print_r($_POST);
exit;
*/



$position = verify_input($validation['id']);
$position = (int) $position;

if (!is_numeric($position)) {
    echo alert("Que du numérique mon ami :)");
    exit;
}
if (isset($_POST['bValiderHabitation'])) {

    if ($position == null) {

        //validation d'une habitation
        $db->query('insert into validations (matricule,habitation,message,date) values 
        ("' . $validation['agent'] . '",
        "' . $validation['adresse'] . '",
        "' . $validation['message'] . '",
        "' . date('y-m-d H:i') . '")') or die(print_r($db->errorInfo()));
        header("location:validation.php");
        exit;
    // } else {
    //     //sinon update
    
    //     print_r($validation);
    //     $db->query('update habitations set nom="' . $validation['lastname'] . '", prenom="' . $habitation['firstname'] . '",datedenaissance="' . $habitation['date'] .'",matricule="' . $habitation['matricule'] . '",adresse="' . $habitation['adresse'] . '",cp="' . $habitation['cp'] . '",tel="' . $habitation['tel'] . '", dateupdate="' . date('l j F Y h:i:s A') . '" where id="' . $position . '"') or die(print_r($db->errorInfo()));

    //     //Mise à jour de la date d'update
    //     //$db->query('update contact set creadate="' . date('l j F Y h:i:s A') . '", user="' . $_SESSION["username"] . '" where id="' . $_POST['contactid'] . '"') or die(print_r($db->errorInfo()));
    //     header("location:validation.php");
    //     exit;

}}
