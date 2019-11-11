<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 18/02/2016
 * Time: 09:44
 */
session_start();
if( isset($_SESSION['user']) AND isset($_SESSION['pass']) ) {
    ?>
<html lang="fr">
<!--email_off-->
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
        .nav{
            margin-top: 0%;
        }
        .new_hr{
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }
    </style>

<script data-cfasync="false" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

 


    </head>
<body>
<header>
    <?php include_once ("header.php");?>
</header>
<div class="container">

    <div class="row">
        <div class="col-md-2" >
        <div class="row nav" align="center"><br>
            <p align="center"><img src="../ressources/img/icone_prof.png"></p>
            <p><button id="nav_accueil"   style="width:180px;text-align: left; "   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Accueil </button></p>
            <p><button id="nav_cal_pfe"  style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Calendrier PFE </button></p>
            <p><button id="nav_list_pfe"   style="width: 180px;text-align: left;"  type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Liste des PFE  </button></p>
            <p><button id="nav_mod_pfe" style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Modalités PFE </button></p>
            <p><button id="nav_list_prof"  style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Liste Encadrants </button></p>
            <p><button id="nav_edit_note"  style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-danger"> Saisi des notes </button></p>
            <?php if(  $_SESSION['user'] == "admin") { ?>
            <p><button id="nav_list_note"   style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Liste des notes </button></p>
            <p><button id="nav_list_note_inf"   style="width: 180px;text-align: left; display: none"   type="button" class="glyphicon glyphicon-list-alt btn btn-danger"> Liste Notes G-Info </button></p>
            <p><button id="nav_list_note_inf_gtr"   style="width: 180px;text-align: left; display: none"   type="button" class="glyphicon glyphicon-list-alt btn btn-danger"> Liste  Notes GTR </button></p>
           <?php  } ?>
            <p><a href="../index.php" target="_blank"><button id="nav_site_etud"   style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Site Etudiants </button></a></p>
            <p><button id="nav_list_email"   style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Mailing List </button></p>

            <?php if(isset($_SESSION['user']) AND $_SESSION['user']=="admin"){ ?>
                <p><button id="nav_prof_attrib"   style="width: 180px;text-align: left; "  type="button" class="glyphicon glyphicon-list-alt btn btn-danger"> Attribuer Encadrants </button></p>
            <?php } ?>
            <?php if(isset($_SESSION['login']) ){ ?>
            <p><button id="nav_stn_pfe"   style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-danger"> Salle et Jury </button></p>
            <?php } ?>
            <p><button id="nav_send_messages"   style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-envelope btn btn-danger"> Envoyer Messages </button></p>
            <p><a href="logout.php"><button id="nav_off"       style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-off btn btn-info"> Déconnexion </button></a></p>

        </div>
        </div>
        <div class="col-md-10 ">
            <p class="bg-info"  style="font-family: 'Lucida Fax';text-align: center; font-size: large; ">

                <hr class="new_hr">
            </p>
        </div>
        <div class="col-md-10"  id="main_content">
            <?php include "home.php" ; ?>
        </div>
    </div>



    <hr>
    <!-- Footer -->
    <footer>
        <?php include_once ("footer.php");?>
    </footer>
</div>
<script data-cfasync="false">

    var list_show=-1;

        $("#nav_list_note").click(function(){
            if(list_show==-1){
                $("#nav_list_note_inf").show(); $("#nav_list_note_inf_gtr").show(); list_show*=-1;
            }
            else{
                $("#nav_list_note_inf").hide(); $("#nav_list_note_inf_gtr").hide();list_show*=-1
            }
        });

        $("#nav_list_note_inf").click(function () {
            $("#main_content").load("export.php?filiere=F");
        });
        $("#nav_list_note_inf_gtr").click(function () {
            $("#main_content").load("export.php?filiere=T");
        });
        $("#nav_mod_pfe").click(function () {
            $("#main_content").load("../downloads.php");
        });
        $("#nav_accueil").click(function(){
            $("#main_content").load("home.php");
        });
        $("#nav_cal_pfe").click(function(){
            $("#main_content").load("calendrier.php");
        });
        $("#nav_list_pfe").click(function(){
            $("#main_content").load("recherche.php?liste=ok");
        });
        $("#nav_list_prof").click(function(){
            $("#main_content").load("prof_liste.php");
        });
        $("#nav_send_messages").click(function(){
            $("#main_content").load("send_messages.php");
        });
        <?php if(isset($_SESSION['login'])){ ?>

        $("#nav_edit_note").click(function(){
            $("#main_content").load("<?php echo "notes.php?encadrant=".$_SESSION['login'];?>");
        });
        <?php }
        elseif($_SESSION['user']=="admin"){  ?>
        $("#nav_edit_note").click(function(){
            $("#main_content").load("saisi_notes.php");
        });
        <?php }
        ?>
        $("#nav_list_email").click(function(){
            $("#main_content").load("mailinglist.php");
        });

        $("#nav_stn_pfe").click(function(){
            $("#main_content").load("prof_jury.php");
        });
        $("#nav_prof_attrib").click(function(){
            $("#main_content").load("prof_attrib.php");
        });

</script>

</body>
<!--/email_off-->
</html>

<?php
}
else{

    header('Location:interdit.php');
}
?>

