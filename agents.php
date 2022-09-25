<?php

// Menu
require_once('menu.php');

//préparation de la requete 
$requete = 'SELECT * FROM agents';
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
    $agents = $db->query('select*from agents where id=' . $position . '') or die(print_r($db->errorInfo()));
    while ($donnees = $agents->fetch()) {
        $infoagent = $donnees;
        //print_r($infoagent);
        $url = '?position=' . $position;
    }
    if ($agents->rowCount() === 0) {
        echo alert("Cet agent n'existe pas ! :)");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter ou modifier un agent</title>
</head>

<body>
    <form action="sauvegarde.php" method="POST" enctype="multipart/form-data">
    <h1>Liste des agents </h1>
        <fieldset>
            <?php if ($position === null) : ?>
                <legend>Ajouter un agent</legend>
            <?php else : ?>
                <legend>Modification d'un agent</legend>
            <?php endif ?>
            <table>

            <div class="m-1">
                <tr>
                    <td>
                        ID :
                    </td>
                    <td><input type="text" class="form-control m-1" name="id" value="<?= $infoagent['id'] ?? '' ?>"></td>
                </tr>
                <tr>
                    <td>Matricule : </td>
                    <td><div class="input-group m-1"><span class="input-group-text" id="basic-addon1">A</span>
                    <input type="number" class="form-control m-1" maxlength="50" name="matricule" required autofocus placeholder="Obligatoire" value="<?= $infoagent['matricule'] ?? '' ?>"></div></td>
                </tr>
                <tr>
                    <td>Nom : </td>
                    <td><input type="text" class="form-control m-1" onkeyup="this.value = this.value.toUpperCase();" maxlength="50" name="lastname" required placeholder="Obligatoire" value="<?= $infoagent['nom'] ?? '' ?>"></td>
                </tr>
                <tr>
                    <td>Prenom : </td>
                    <td><input type="text" class="form-control m-1" onkeyup="this.charAt(0).toUpperCase() + this.slice(1)" maxlength="50" name="firstname" required placeholder="Obligatoire" value="<?= $infoagent['prenom'] ?? '' ?>"></td>
                </tr>

                <tr>
                    <td>Date de naissance : </td>
                    <td><input type="date" class="form-control m-1" maxlength="50" name="date" value="<?= $infoagent['datedenaissance'] ?? '' ?>"></td>
                </tr>
                <tr>
                    <td>Adresse : </td>
                    <td><input type="text" class="form-control m-1" maxlength="50" name="adresse" placeholder="Adresse" value="<?= $infoagent['adresse'] ?? '' ?>"></td>
                </tr>
                <tr>
                    <td>Code Postal : </td>
                    <td><input type="text" class="form-control m-1" maxlength="50" name="cp" placeholder="Code Postal" value="<?= $infoagent['cp'] ?? '' ?>"></td>
                </tr>
                <tr>
                    <td>Téléphone : </td>
                    <td><input type="text" class="form-control m-1" maxlength="50" name="tel" placeholder="Téléphone" value="<?= $infoagent['tel'] ?? '' ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" m-1>
                        <?php if (isset($position)) echo 'Dernière modification : ' .  $infoagent['dateupdate'] ?? ''; ?>
                    </td>
                </tr>

                <table>
                    <tr>
                        <td>
                            <input type="reset" name="bInit" value="Réinitialiser" class="btn btn-secondary m-1" />
                        </td>
                        <td>
                            &nbsp;<input type="submit" name="bAjoutAgent" value="<?= $position ? "Modifier" : "Ajouter" ?>" class="btn btn-primary m-1">
                        </td>
                    </tr>

                </table>

        </fieldset>
    </form>



    <?php

    // Exécution de la requête
    echo '<div class="right_Side">';
    echo '<h1><i class="fa fa-phone" aria-hidden="true"></i> Liste des agents </h1><br>';
    echo '<table border="1" class="table table-light">';
    echo '<thead class="thead-light">
                                <tr>
                                <th>Matricule</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Tel</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                                    </tr>
                                </thead>';
    $agents = $db->query('select*from agents order by matricule asc') or die(print_r($db->errorInfo()));
    while ($Infos = $agents->fetch()) {

        echo '<tr>';
        echo '<td>A' . $Infos['matricule'] . '</td>';
        echo '<td>' . $Infos['nom'] . '</td>';
        echo '<td>' . $Infos['prenom'] . '</td>';
        echo '<td>' . $Infos['tel'] . '</td>';
        echo '<td><a href="agents.php?id=' . $Infos['id'] . '">Modifier</a></td>';
        echo '<td><a onclick="return confirm(\'Voulez-vous vraiment supprimer cet élement ?\')" href="agents.php?delagent=' . $Infos['id'] . ' " >Supprimer</a></td></tr>';
    }


    echo '</table><br><br><br>';



    //supprimer un agent
    if (!empty(isset($_GET['delagent']))) {
        $id = verify_input($_GET['delagent']) ?? null;
        $query = $db->query('delete from agents where id=' . $id . '');
        if ($query->rowCount() === 0) {
            echo alert('Cet agent n\'existe pas !');
            exit;
        }
        header("Refresh:1");
        exit;
        
    }
    ?>

</body>
</html>