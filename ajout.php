<?php


// Menu
require_once('menu.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une surveillance habitation</title>
</head>

<body>
    <form action="sauvegarde.php" method="POST" enctype="multipart/form-data">

        <fieldset>
            <?php if ($position === null) : ?>
                <legend>Ajouter une surveillance habitation</legend>
            <?php else : ?>
                <legend>Modification d'une surveillance habitation</legend>
            <?php endif ?>
            <table>


                <tr>
                    <td>

                                ID :
                    </td>
                    <td><input type="text" name="id" required value="<?= $infocontact['id'] ?? '' ?>"></td>
                </tr>
                <tr>
                    <td>Nom : </td>
                    <td><input type="text" class="form-control" maxlength="50" name="nom" required autofocus placeholder="Obligatoire" value="<?= $infocontact['nom'] ?? '' ?>"></td>
                </tr>
                <tr>
                    <td>Prenom : </td>
                    <td><input type="text" class="form-control" maxlength="50" name="prenom" required placeholder="Obligatoire" value="<?= $infocontact['prenom'] ?? '' ?>"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <?php if (isset($position)) echo 'Dernière modification :' .  $infocontact['creadate'] ?? ''; ?>
                    </td>
                </tr>



        </fieldset>
    </form>
</body>

</html>