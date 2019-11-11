<?php
session_start();

function deconnexion(){
// Détruit toutes les variables de session ;
    $_SESSION = array();
// Si vous voulez détruire complètement la session, effacez également
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,$params["path"], $params["domain"],$params["secure"], $params["httponly"]);
        header("Location: ./");
    }}

deconnexion();
?>

