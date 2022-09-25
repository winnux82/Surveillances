<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php
$version = "0.0.1";

$user = 'eleve';
$pass = 'eleve';

// dont forget to install bootstrap !
// npm install bootstrap

try {
    $db = new PDO('mysql:host=localhost;port=3307;dbname=gdp', $user, $pass);
    //echo 'ça marche';
} catch (PDOException $e) {
    //echo 'Le site est en maintenance, erreur bdd';
    echo '<div class="text-center"><div class="alert alert-info" style="width: 80%;" role="alert"> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>DB Error!!</strong>'."<br>";
    echo $e->getMessage();
    die();
}


/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'eleve');
define('DB_PASSWORD', 'eleve');
define('DB_NAME', 'phonebook_db');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

/*
 _   _                 _                                _              _____ _          _     _              _
| | | |               | |                              | |            /  __ \ |        (_)   | |            | |
| | | | __ _ _ __   __| | ___ _ __ _ __ ___   ___ _   _| | ___ _ __   | /  \/ |__  _ __ _ ___| |_ ___  _ __ | |__   ___
| | | |/ _` | '_ \ / _` |/ _ \ '__| '_ ` _ \ / _ \ | | | |/ _ \ '_ \  | |   | '_ \| '__| / __| __/ _ \| '_ \| '_ \ / _ \
\ \_/ / (_| | | | | (_| |  __/ |  | | | | | |  __/ |_| | |  __/ | | | | \__/\ | | | |  | \__ \ || (_) | |_) | | | |  __/
 \___/ \__,_|_| |_|\__,_|\___|_|  |_| |_| |_|\___|\__,_|_|\___|_| |_|  \____/_| |_|_|  |_|___/\__\___/| .__/|_| |_|\___|
                                                                                                      | |
                                                                                                      |_|

Trigger Insert
CREATE TRIGGER Contact_Insert BEFORE INSERT
ON contact FOR EACH ROW
SET NEW.created_at = NOW();

Trigger Update
CREATE TRIGGER Contact_Update BEFORE UPDATE
ON contact FOR EACH ROW
SET NEW.updated_at = NOW();

                                                                                                      */
