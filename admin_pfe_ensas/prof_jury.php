<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 09/03/2016
 * Time: 12:16
 */
$prof_name="";
$firstYear=date('Y')-1;
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
    </head>
<body>
<header>

    <div class="col-md-12">
        <hr>
        <p style="text-align: center ; font-family: 'Lucida Fax';font-size: large">Planning des Soutennances PFE <?php echo $firstYear."-".date('Y');?></p>
    </div>
    <div class="col-md-12">
<hr>    <?php include_once ('prof_liste.php'); ?>
    </div>
    <?php include_once 'planning.php'?>
</body>
</html>
