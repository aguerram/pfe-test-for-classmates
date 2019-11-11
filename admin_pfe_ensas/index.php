<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 18/02/2016
 * Time: 08:16
 */
session_start();

/*if($_SERVER["HTTPS"] != "on") {
   header("Location: https://fcensas.com/pfe/admin_pfe_ensas");
}*/

include "../db_connect.php";
include_once ('../ressources/functions.php');
$dialog="";

if(isset($_POST['submit'])) {
    $user  = protect($_POST['user']);
    $pass = protect($_POST['pass']);

    if(isset($pass) && isset($user) ) {
        if(($user == 'admin') && ($pass == 'pfe.2019')) {
            $_SESSION['user'] = $user ;
            $_SESSION['pass'] = $pass ;
            header('Location:mean.php');
        }else{
            $connection=verify_prof($user,$pass);
            if($data=$connection->fetch()){
                $_SESSION['login']= $data['login'];
                $_SESSION['user'] = "professeur" ;
                $_SESSION['pass'] = $pass ;
                $_SESSION['email']=$data['email'];
                header('Location:mean.php');
            }else{
                $dialog="<img src='../ressources/img/erreur.png'> Données non valides ou compte inexistant !";
            }
        }
    }else{
        $dialog="<img src='../ressources/img/erreur.png'> Données non valides ou compte inexistant !";
    }
}
?>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Abainou Yasine">
        <title> Gestion des PFE </title>
        <link href="../ressources/css/bootstrap.min.css" rel="stylesheet">
        <link href="../ressources/css/portfolio-item.css" rel="stylesheet">
        <style>
            .monter{
                display: none;
            }
            #login_box{
                margin-top: 2%;
            }

        </style>
    </head>
    <body>
    <header>
        <?php include_once ("header.php");?>
    </header>
    <div class="container">
    <div class="row" >
        <div id="login_box" class="col-md-4 col-md-offset-4 " align="center">
            <p align="center"><img src="../ressources/img/attention.png"></p>
            <p style="text-align:center;font-size: large;font-family:'Lucida Fax' " > Accès réservé au corps professoral </p>
            <hr>
            <p style="color: red"><?php echo $dialog; ?></p>
            <form class="form" method="post" action="index.php"><br>
                <label> Nom d'utilisateur : &nbsp; </label><input type="text"  name="user" required /><br><br>
                <label>Mot de passe :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label><input type="password" name="pass" required/><br> <br />
                <input class="btn btn-success" type="submit"  name="submit" value=" Connexion " />
                <input class="  btn btn-danger" type="reset"  name="submit" value=" &nbsp; Annuler &nbsp; " /><br><br>
            </form>
    </div>
   </div>
    <hr><hr>
    <!-- Footer -->
    <footer>
        <?php include_once ("footer.php");?>
    </footer>
    </div>
    </body>
    </html>