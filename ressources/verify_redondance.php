<?php
include_once("functions.php");

// verifcication 1

$Username = (isset($_POST["username"])) ? htmlentities($_POST["username"]) : NULL;
if ($Username) {
         echo is_username_existe($Username);
}

// verifcication 2
$nom1 = (isset($_POST["nom1"])) ? htmlentities($_POST["nom1"]) : NULL;
$prenom1 = (isset($_POST["prenom1"])) ? htmlentities($_POST["prenom1"]) : NULL;
if ($nom1 & $prenom1) {
    echo is_user_existe($nom1,$prenom1);
}
// verifcication 3

$email1 = (isset($_POST["email1"])) ? htmlentities($_POST["email1"]) : NULL;
if ($email1) {
    echo is_email_existe($email1);
}


$Email_password = (isset($_POST["email"])) ? htmlentities($_POST["email"]) : NULL;
if ($Email_password) {
    echo is_email_existe_2($Email_password);
}

?>