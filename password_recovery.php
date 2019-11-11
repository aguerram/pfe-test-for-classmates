<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 05/03/2016
 * Time: 11:05
 */

$message="";
if(isset($_POST['email'])){
include_once ('ressources/functions.php');
    $test_email=is_email_existe_3($_POST['email']);
    if($test_email){
    recover_password_from_email(trim($_POST['email']));
        $message=" <p  class='bg-success' style='font-size: large;text-align: center;font-family: \'Lucida Fax\' '> <span class='glyphicon glyphicon-envelope'></span> Un Email vous a été envoyé !! </p>";
    }
    else{
        $message=" <p class='bg-danger' style='font-size: large;text-align: center;font-family: \'Lucida Fax\'  ><img src='ressources/img/erreur.png' /> Email n'existe pas !!</p>";
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
    <title> Récupération vos coordonnées </title>
    <link href="ressources/css/bootstrap.min.css" rel="stylesheet">
    <link href="ressources/css/portfolio-item.css" rel="stylesheet">
    <script src="ressources/jquery.min.js"></script>
    <style>
        .monter{
            display: none;
        }

    </style>

    <script>

        function empty_content(id){
            document.getElementById(id).innerHTML = "";
        }
        function afficher_loader(id){
            document.getElementById(id).style.display = "inline";
        }

        function cacher_loader(id){
            document.getElementById(id).style.display = "none"
        }

        $(document).ready(function() {

        $("#email").focusout(function () {
            cacher_loader("loader");
            $("#email_check").load("ressources/verify_redondance.php", {email: $("#email").val()});
        });
        });
    </script>
    </head>
<body>
<header>
    <?php include_once("header.php"); ?>
</header>
<div class="container"><br>
    <div class="row">
        <?php echo $message; ?>
        <br>
    </div>
    <div class="row" >
        <form method="post" action="password_recovery.php">
            <div class="row" align="">
                <div class="col-md-5 col-md-offset-5" >
                    <input id="email" type="email" required onfocus="afficher_loader('loader');empty_content('username_check');" name="email" size="30" placeholder=" Votre Email " >
                    <span id="loader" style="display: none;"><img src="ressources/img/loader.gif" alt="loading" /></span>
                    <span style="color: red" id="email_check" >&nbsp;</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-5"><br>
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-refresh"></span> Récupérer vos coordonnées
                    </button>
                </div>
            </div>
        </form>
        <br><br>
    </div>
</div>
<hr>
<!-- Footer -->
<footer>
    <?php include_once("footer.php"); ?>
</footer>


</body>
</html>