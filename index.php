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

<script>
function foo() {
   //alert("Submit button clicked!");
   x0p('Message', 'Hello world!', 'info');
    }



</script>

<textarea class="form-control" id="txtArea" name="mesures" rows="4" cols="50">
<?= $habitation['mesures'] ?? '' ?></textarea>


<form action="" method="post">
<input type="submit" value="submit" onclick="return foo();" />
</form>


</body>

</html>