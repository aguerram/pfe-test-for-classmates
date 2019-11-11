<?php

?>
<?php
include "db_connect.php";
if(!isset($_POST['submit']))
{
    $today = mktime(0,0,0,date("m"),date("d"),date("y"));
    if ($today >= $datelimins){
        include "expiration.php";}
    else{
        include "formulaire.php";}
}
else
// begin else 1
{
	
    $filiere	= htmlspecialchars(protect($_POST['filiere']));
    $username	= htmlspecialchars(protect($_POST['username']));
    $password	= htmlspecialchars(protect($_POST['password']));
    $password2	= htmlspecialchars(protect($_POST['password2']));

    $nom1	= htmlspecialchars(protect($_POST['nom1']));
    $nom1 = strtoupper($nom1);
    $nom1 = ltrim($nom1);

    $nom2	= htmlspecialchars(protect($_POST['nom2']));
    $nom2 = htmlspecialchars(strtoupper($nom2));
    $nom2 = htmlspecialchars(ltrim($nom2));

    $nom3	= htmlspecialchars(protect($_POST['nom3']));
    $nom3 = strtoupper($nom3);
    $nom3 = ltrim($nom3);

    $prenom1	= htmlspecialchars(protect($_POST['prenom1']));
    $prenom1 = ltrim($prenom1);
    $prenom1 = ucfirst(strtolower($prenom1));
    $prenom1 = str_replace('\\', '', $prenom1);
    $prenom1 = str_replace("'", '', $prenom1);

    $prenom2	= htmlspecialchars(protect($_POST['prenom2']));
    $prenom2 = ltrim($prenom2);
    $prenom2 = ucfirst(strtolower($prenom2));
    $prenom2 = str_replace('\\', '', $prenom2);
    $prenom2 = str_replace("'", '', $prenom2);

    $prenom3	= htmlspecialchars(protect($_POST['prenom3']));
    $prenom3 = ltrim($prenom3);
    $prenom3 = ucfirst(strtolower($prenom3));
    $prenom3 = str_replace('\\', '', $prenom3);
    $prenom3 = str_replace("'", '', $prenom3);

    $GSM1	= htmlspecialchars(protect($_POST['GSM1']));
    $GSM1 = str_replace(' ', '', $GSM1);
    $GSM1 = str_replace('-', '', $GSM1);
    $GSM1 = str_replace('.', '', $GSM1);
    $GSM1 = str_replace('+212', '0', $GSM1);
    $GSM1 = chunk_split($GSM1,"2"," ");

    $GSM2	= htmlspecialchars(protect($_POST['GSM2']));
    $GSM2 = str_replace(' ', '', $GSM2);
    $GSM2 = str_replace('-', '', $GSM2);
    $GSM2 = str_replace('.', '', $GSM2);
    $GSM2 = str_replace('+212', '0', $GSM2);
    $GSM2 = chunk_split($GSM2,"2"," ");

    $GSM3	= htmlspecialchars(protect($_POST['GSM3']));
    $GSM3 = str_replace(' ', '', $GSM3);
    $GSM3 = str_replace('-', '', $GSM3);
    $GSM3 = str_replace('.', '', $GSM3);
    $GSM3 = str_replace('+212', '0', $GSM3);
    $GSM3 = chunk_split($GSM3,"2"," ");

    $email1	= htmlspecialchars(protect($_POST['email1']));
    $email1 = ltrim($email1);
    $email1 = strtolower($email1);
    $email1 = str_replace(' ', '', $email1);

    $email2	= htmlspecialchars(protect($_POST['email2']));
    $email2 = ltrim($email2);
    $email2 = strtolower($email2);
    $email2 = str_replace(' ', '', $email2);

    $email3	= htmlspecialchars(protect($_POST['email3']));
    $email3 = ltrim($email3);
    $email3 = strtolower($email3);
    $email3 = str_replace(' ', '', $email3);

    $emails = $email1 . ', ' . $email2 . ', ' . $email3  ;


    $date = date('Y/m/d-H:i');


//$matricule du groupe
// Calculer le num du dernier groupe créé

    $sql2 = "SELECT * FROM `" . $table_pfe . "` ";
    $query2 = mysql_query($sql2) or die(mysql_error());
    $index=1; $groupe = 0; $groupes = [];
    while($row2 = mysql_fetch_array($query2))
    {
        $groupes[$index]	 =	($row2['groupe']);
        $index = $index + 1 ;
    }
    if ($groupes) { $groupe = max($groupes)+1; } else { $groupe = 1;}
    if ($groupe <10) {$groupe = '0' . $groupe;}
    $groupe_label = $filiere . '-' . $groupe ;
    $errors = array();

    // generate Token :
    $length = 20;
    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $token= $groupe.$randomString ;
    // fin

		if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] ){
		$secret_key="6LdeIBsUAAAAACkXfjBErRIo6pWukTho5RPqpOvo";
		$ip=$_SERVER['REMOTE_ADDR'];
		$captcha=$_POST['g-recaptcha-response'];
		$rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha."&remoteip=".$ip);
			$arr=json_decode($rsp,TRUE);
			if(!($arr['success'])){
						        $errors[] = "Verification Captcha non valide ! ";
			}
	}else{
			        $errors[] = "Verification Captcha non valide ! ";
	}
	
    if ($_POST['password'] != $_POST['password2'])
    {
        $errors[] = "Mot de passe mal confirmé!";
    }

	   if(strpos($username, " ") !== false)
    {
        $errors[] = "Votre Username ne doit pas contenir un espace !";
    }
	
    $regex = "/^[a-z0-9]+([_\.-][a-z0-9]+)*@([a-z0-9]+([.-][a-z0-9]+)*)+\.[a-z]{2,}$/i";
    if((!preg_match($regex, $email1) & $email1) ||
        (!preg_match($regex, $email2) & $email2) ||
        (!preg_match($regex, $email3) & $email3)  )
    {
        $errors[] = "Adresse email non valide !";
    }

    if(!$filiere || !$username  || !$password || !$nom1 || !$prenom1 || !$GSM1 || !$email1  )
    {
        $errors[] = "Formulaire incompet ! ";
    }

    $sql = "SELECT * FROM `" . $table_pfe . "` WHERE `username`='{$username}'";
    $query = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($query) > 0)
    {
        $errors[] = "Nom Utilisateur déjà utilisé !";
    }


    $sql = "SELECT * FROM `" . $table_pfe . "` WHERE `nom1`='{$nom1}' AND `prenom1`='{$prenom1}'    ";
    $query = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($query) > 0)
    {
        $errors[] = "Vous êtes déjà inscrit !";
    }


    $sql = "SELECT * FROM `" . $table_pfe . "` WHERE `email1`='{$email1}'";
    $query = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($query) > 0)
    {
        $errors[] = "Email déjà inscrit !";
    }

    if(count($errors) > 0)
    {
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
            <style>
                .monter{
                    display: none;
                }
                p{
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <header>
            <?php include_once ("header.php");?>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12"><br>
                        <p class="bg-danger"><strong>Des erreurs ont été détectées lors de l'enregistrement </strong> </p>
                        <?php

                            foreach($errors AS $error)
                             {?>
                                   <p><img src="ressources/img/erreur.png">  <?php echo $error ; ?> </p>
                             <?php } ?>
                        <p class="bg-success"><a href="javascript:history.go(-1)"> Recommencer </a></p>
                    </div>
                </div><hr>
                <footer>
                    <?php include_once ("footer.php");?>
                </footer>
            </div>
            </body>
            </html>>

        <?php

    }
    else // begin else 2
    {
        $sql = "INSERT INTO " . $table_pfe . " ( username , password , nom1, nom2 , nom3  , prenom1 , prenom2 , prenom3 ,  email1 , email2 , email3  , GSM1 , GSM2 , GSM3 , filiere , groupe , date,token,valide )

    VALUES('$username' , '$password' , '$nom1' , '$nom2' , '$nom3' , '$prenom1' , '$prenom2' , '$prenom3' ,
	'$email1' , '$email2' , '$email3' , '$GSM1' ,  '$GSM2' ,  '$GSM3' , '$filiere' , '$groupe' , '$date' ,'$token','0')";
        $query = mysql_query($sql) or die(mysql_error());
        ?>

        <?php

        $subject = "Activation du compte PFE";
        $lien_activation=$site."/activation.php?token=".$token;
        $message = "
         <html>
            <body>
                <p>Votre Formulaire a &eacute;t&eacute; rempli avec succ&eacute;s  ! <br>
                <p>Vous devez activer votre compte PFE en <a href='".$lien_activation."'> Cliquant-Ici</a> .</p>
				<p>Si le lien ne fonctionne pas , copier/coller le lien suivant : <strong>$lien_activation</strong> </p>
                 <p>ENSA Safi (C) 2019</p>
            </body>
         </html> ";
         
        mail($emails, $subject, $message, $headers) ;
        
        ?>

        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="IRT">
            <title> Gestion des PFE </title>
            <link href="ressources/css/bootstrap.min.css" rel="stylesheet">
            <link href="ressources/css/portfolio-item.css" rel="stylesheet">
            <style>
                .monter{
                    display: none;
                }
                p{
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <header>
            <?php include_once ("header.php");?>
            </header>
            <div class="container">
                    <div class="row">
                        <div class="col-lg-12"  align="center"><br>
                            <p class="bg-success">Le formulaire en ligne a &eacute;t&eacute; rempli avec succ&eacute;s.</p>
                            <p class=" glyphicon glyphicon-envelope	 "  > Un email vous a été envoy&eacute; pour activer votre compte PFE  ! </p>
							<p>Si vous n'avez pas reçu cet email, veuillez consultez votre dossier <strong>"Spam" / "courrier ind&eacute;sirable" </strong></p>
                        </div>
                    </div><hr>
                <footer>
                    <?php include_once ("footer.php");?>
                </footer>
            </div>
        </body>
        </html>>
<?php
    } // fin else 2
} // fin else 1
?>