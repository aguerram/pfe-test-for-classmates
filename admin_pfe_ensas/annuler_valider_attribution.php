<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 09/03/2016
 * Time: 11:08
 */
session_start();
include_once ('../ressources/db_connect_2.php');
if( isset($_SESSION['user']) AND $_SESSION['user']=='admin' AND isset($_POST['attribution']) ) {
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('UPDATE ensas_pfe_options SET valeur= :valeur WHERE label = :label');
    $req->execute(array(
        ':valeur' => $_POST['attribution'],
        ':label' => 'prof_attrib_valide'
    ));
}else{
    header('Location:interdit.php');
}
?>