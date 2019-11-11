<?php
session_start();

/*if($_SERVER["HTTPS"] != "on") {
   header("Location: https://fcensas.com/pfe");
}*/


include "db_connect.php";
$dialog = "";
if (isset($_POST['submit'])) {
    $password = htmlspecialchars(protect($_POST['password']));
    $username = htmlspecialchars(protect($_POST['username']));
    if ($password && $username) {
        $sql = "SELECT username,password,valide FROM `" . $table_pfe . "` WHERE `password`='$password' AND `username`='$username' ";
        $query = mysqli_query($con,$sql) or die(mysqli_error($con));
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            if($row['valide']=='0'){
                $dialog = "<img src='ressources/img/erreur.png'> Données non valides ou compte inexistant !";
            }else{
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                header('Location:mean.php');
            }
        } else {
            $dialog = "<img src='ressources/img/erreur.png'> Données non valides ou compte inexistant !";
        }
    } else {
        $dialog = "<img src='ressources/img/erreur.png'> Veuillez entrer vos données d'accès! ";
    }
}

?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="PFE ENSA SAFI " />
    <meta name="description" content="Application de Gestion des PFE | ENSA SAFI">
    <meta name="author" content="Abainou Yasine">
    <title> Gestion des PFE </title>
    <link href="ressources/css/bootstrap.min.css" rel="stylesheet">
    <link href="ressources/css/portfolio-item.css" rel="stylesheet">
    <script src="ressources/jquery.min.js"></script>

    <script>

        $(document).ready(function () {

            $("#cal").click(function () {
                $("#contenu").load("calendrier.php");
            });

            $("#list_f").click(function () {
                $("#contenu").load("liste_info.php");
            });

            $("#list_t").click(function () {
                $("#contenu").load("liste_telec.php");
            });

            $("#planning").click(function () {
                $("#contenu").load("planning.php");
            });

            $('a[href=#top]').click(function () {
                $('html, body').animate({scrollTop: 0}, 'slow');
                return false;
            });

        });
		
				function nospaces(t){
			if(t.value.match(/\s/g)){
				t.value=t.value.replace(/\s/g,'');
			}
		}
		
    </script>
</head>
<body>

<header>
    <?php include_once("header.php"); ?>
</header>

<!-- Page Content -->
<div class="container"><br>

    <!-- Portfolio Item Row -->
    <div class="row">
        <p style="text-align: center; font-size: large; border-bottom: double lightgray;">
            <img src="ressources/img/notice.png">
            Cette rubrique est déstinée à la gestion des PFE pour le Département Informatique, Réseaux et
            Télécommunications</p>
    </div>
    
    
    <div class="row">
        <div class="button_nav">
            <button id="cal" type="button" class="glyphicon glyphicon-calendar	 btn btn-info"> Calendrier</button>
            <button id="list_f" type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Liste des PFE G-Info
            </button>
            <button id="list_t" class="glyphicon glyphicon-list-alt btn btn-info"> Liste des PFE GTR</button>
            <a href="planning_2017-2018.htm" target="_blank"><button id="planning" class="glyphicon glyphicon-calendar btn btn-info"> Planning des soutenances</button></a>
        </div>
      
      
        <div class="col-md-8" align="center">
            <p id="contenu"> <?php include "calendrier.php"; ?> </p>
        </div>

        <div class="col-md-4" style="margin-top: 3%;">
            <div id="login" class="span3 well well-large offset4">
                <p align="center"><img src="ressources/img/eleve.png"></p>
                <h4 style="text-align:center"> S'identifier </h4>
                <p style="color: red"><?php echo $dialog; ?></p>
                <form class="form" method="post" action="index.php">
                    <label>Nom d'utilisateur : &nbsp; </label><input type="text" name="username" onkeyup="nospaces(this)" required/><br><br>
                    <label>Mot de passe : &nbsp; </label><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="password" name="password" required/><br> <br/>
				<input class="btn btn-success" type="submit" name="submit" value=" Connexion "/>
                    <input class="  btn btn-danger" type="reset" name="submit" value=" &nbsp; Annuler &nbsp; "/><br>
                    <a  href="password_recovery.php" target="_blank"><span class="glyphicon glyphicon-refresh"></span> Nom d'utilisateur ou Mot de passe oublié ?</a>
                    <br><br>
                    <a href="register.php">
                        <button type="button" class="btn btn-lg">Créer un compte PFE</button>
                    </a>
                </form>
            </div>
        </div>
        
    </div>

    <hr>
   
   
   
    <!-- Footer -->
    <footer>
        <?php include_once("footer.php"); ?>
    </footer>
</div>
<!-- /.container -->
</body>
</html>

