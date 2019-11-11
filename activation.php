<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 05/03/2016
 * Time: 15:18
 */

if(isset($_GET['token'])){
    require_once ('ressources/functions.php');
    $_data=verify_token($_GET['token']);
    $data=$_data->fetch();
    if($data){
        if($data['valide']=='1'){
            include "ressources/activated_account.php";
            exit();
        }
        validate_account(htmlspecialchars((trim($_GET['token']))));
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $emails = $data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3']  ;
        $username=$data['username'];
        $password=$data['password'];
        $matricul=$data['filiere'].'-'.$data['groupe'];
        $headers .= "From: ENSAS - Département IRT ";
        $headers .= "From: ENSAS - IRT <walid.bouarifi@gmail.com>\n";
        $to =$emails;
        $subject="Activation du Compte PFE ";
		$site_index=$_SERVER['SERVER_NAME'];
        $message="
<html>
<body>
<p>Vous avez bien activé votre compte PFE | Ensa Safi  ! <br>
<p>Le matricule du groupe est :  <strong> $matricul  </strong></p>
<p>Vous pouvez accéder à votre compte sur <a href='$site_index'>le site des PFE</a> avec les données suivantes:</p>
<p>Username :<strong>$username</strong></p>
<p>Mot de passe : <strong>$password</strong></p>
<p></p>
<p>--------</p>
<p>Département Informatique Réseaux et Télécommunications </p>
</body>
</html> "
        ;
        mail($to,$subject,$message,$headers);
        ?>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="Abainou Yasine">
            <title> Gestion des PFE </title>
            <link href="ressources/css/bootstrap.min.css" rel="stylesheet">
            <link href="ressources/css/portfolio-item.css" rel="stylesheet">
        <body>

        <header>
            <?php include_once("header.php"); ?>
        </header>
        <div class="container"><br>

            <div class="row">
            <div class="col-lg-12"  align="center"><br>
                <p class="bg-success">Votre compte PFE à été activé avec succès.</p>
                <p class=" glyphicon glyphicon-envelope	 "  > Un email de confirmation vous a été envoyé</p>
                <p>Le matricule du groupe est :  <strong> <?php echo $matricul ;?> </strong></p>
                <p>Vous pouvez accéder à votre compte sur <a href="index.php">le site des PFE</a> avec les données suivantes:</p>
                <br>
                <p><img src="ressources/img/ok.png"> Username  :  <?php echo $username ;?></p>
                <p><img src="ressources/img/ok.png"> Password  :  <?php echo $password ;?></p>

            </div>
            <hr>
            <!-- Footer -->
            <footer>
                <?php include_once("footer.php"); ?>
            </footer>
</div>
        </body>
        </html>
<?php

    }else{
        include "interdit.php";
    }
}
else{
    include "interdit.php";
}
?>