<?php

// Menu
require_once('menu.php');

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
require_once('habitations_listing.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation surveillances habitations</title>
</head>

<body>
    <form action="habitation_validation.php" method="POST" enctype="multipart/form-data">
<h1>Validation surveillances habitations</h1>
        <fieldset>
            <?php if ($position === null) : ?>
                <legend>Valider surveillance d'habitation</legend>
            <?php else : ?>
                <legend>Modification d'une habitation</legend>
            <?php endif ?>
            <table>

            <div class="m-1">

                <tr>
                    <td><h5><span class="label label-default">Matricule</span></h5></td>

                    <td><div class="input-group m-1"><select name="agent" class="form-select form-select-lg mb-2"><?php echo ShowAgent(); ?>
                                <option selected="selected"><?= $infocontact['agent']?></option>
                            </select></td>

                </div></td>
                </tr>
                <tr>
                    <td><h5><span class="label label-default">Habitations</span></h5></td>
                    <td><div class="input-group m-1"><select name="adresse" class="form-select form-select-lg mb-2"><?php echo ShowHabitation(); ?>
                                <option selected="selected"><?= $infocontact['habitation']?></option>
                            </select></td>
                </div></td>
                </tr>

                <tr>
                    <td><h5><span class="label label-default">Message : </span></h5></td>
                    <td><div class="mb-3"><textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="4"></textarea></div></td>
                </tr>
                <tr><td> </td></tr>


                <table>
                    <tr>
                        <td>
                            <input type="reset" name="bInit" value="Réinitialiser" class="btn btn-secondary m-1" />
                        </td>
                        <td>
                            &nbsp;<input type="submit" name="bValiderHabitation" value="<?= $position ? "Modifier" : "Ajouter" ?>" class="btn btn-primary m-1">
                        </td>
                    </tr>

                </table>

        </fieldset>
    </form>



    <?php

    // Exécution de la requête
    echo '<div class="right_Side">';
    echo '<h1><i class="fa fa-map-marker" aria-hidden="true"></i> Liste des dernières validations </h1><br>';
    echo '<table border="1" class="table table-light ">';
    echo '<thead class="thead-light">
                                <tr>
                                <th>id</th>
                                <th>Date</th>
                                <th>Adresse</th>
                                <th>Agent</th>
                                <th>Message</th>
                                </tr>
                                </thead>';
    $listehabitations = $db->query('select*from validations order by idvalidations desc') or die(print_r($db->errorInfo()));
    while ($habitation = $listehabitations->fetch()) {

        echo '<tr>';
        echo '<td>' . $habitation['idvalidations'] . '</td>';
        echo '<td>' . $habitation['date'] . '</td>';
        echo '<td>' . $habitation['habitation'] . '</td>';
        echo '<td>' . $habitation['matricule'] . '</td>';
        echo '<td>' . $habitation['message'] . '</td>';
    }


    echo '</table><br><br><br>';
    

    // //modifier un agent
    // if (isset($_GET['id'])) {
    //     if(!is_numeric($_GET['id']))
    //     {
    //         echo alert("Que du numérique mon ami :)");
    //         exit;
    //     }

       
    //     $req = $db->query('select*from habitations where id=' . $_GET['id'] . '') or die(print_r($db->errorInfo()));
    //     if ($req->rowCount() === 0) {
    //         echo alert("Cette habitation n'existe pas ! :)");
    //         exit;
    //     }

    //     while ($donnees = $listehabitations->fetch()) {
    //         $habitation = $donnees;
  
    //     }  
    // }

    // //supprimer une habitation
    // if (!empty(isset($_GET['delhabitations']))) {
    //     $id = verify_input($_GET['delhabitations']) ?? null;
    //     $query = $db->query('delete from habitations where id=' . $id . '');
    //     if ($query->rowCount() === 0) {
    //         echo alert('Cette habitation n\'existe pas !');
    //         exit;
    //     }
    //     header("Refresh:1");
    //     exit;
        
    // }
    // ?>

</body>
</html>