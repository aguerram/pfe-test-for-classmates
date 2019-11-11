<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 12/02/2016
 * Time: 15:30
 */
session_start();
include "db_connect.php";
$today = mktime(0,0,0,date("m"),date("d"),date("y"));
if ($today <= $datefinale){
    include "expiration.php";}
else{




if($_SESSION['username']) {

    $sql = "SELECT * from `" . $table_pfe . "` WHERE `username`='" . $_SESSION['username'] . "' ";
    $res = mysqli_query($con,$sql) or die(mysqli_error($con));

    if (mysqli_num_rows($res) != 1) {


        echo "<script language=\"Javascript\" type=\"text/javascript\">
	alert(\"Accès non authorisé!\")
	document.location.href='index.php'</script>";
    } else {


        $row = mysqli_fetch_assoc($res);


        $ousername = ($row['username']);
        $opassword = ($row['password']);
        $ogroupe = ($row['groupe']);

        $onom1 = ($row['nom1']);
        $onom2 = ($row['nom2']);
        $onom3 = ($row['nom3']);

        $oprenom1 = ($row['prenom1']);
        $oprenom2 = ($row['prenom2']);
        $oprenom3 = ($row['prenom3']);

        $oGSM1 = ($row['GSM1']);
        $oGSM2 = ($row['GSM2']);
        $oGSM3 = ($row['GSM3']);

        $oemail1 = ($row['email1']);
        $oemail2 = ($row['email2']);
        $oemail3 = ($row['email3']);

        $oville = ($row['ville']);
        $osujet = ($row['sujet']);
        $odescr = ($row['descr']);
        $omotscle = ($row['motscle']);
        $opreembauche = ($row['preembauche']);
        $odebut = ($row['debut']);
        $oduree = ($row['duree']);
        $oentreprise = ($row['entreprise']);
        $oadresse = ($row['adresse']);
        $oencadrant = ($row['encadrant']);
        $oemail_encadrant = ($row['email_encadrant']);
        $ofonction = ($row['fonction']);
        $oencadrant_ext = ($row['encadrant_ext']);
        $oemail_encadrant_ext = ($row['email_encadrant_ext']);
        $oGSM_encadrant_ext = ($row['GSM_encadrant_ext']);
        $ofiliere = ($row['filiere']);
        $date = ($row['date']);
        $date1 = date('d-m-Y');
        $heure = date('H:i');
        $ogroupe_label = $ofiliere . '-' . $ogroupe;



?>

<div class="row" align="center">
    <p class="bg-info">Mise à jour des données</p>
    <p><strong>Groupe PFE :<?php echo $ogroupe_label; ?></strong></p>
</div>

<?php

if(!isset($_POST['submit']))
{
?>
<script language="JavaScript">
    function OnlyNumber(e) {
// if aEvent is null, means the Internet Explorer event model, so get window.event.
        var IE5 = false;
        if (!e) var e = window.event;
        if (e.keyCode) { IE5= true; code = e.keyCode;}
        else if (e.which) code = e.which ;
//test du code
        if ((code < 47 || code > 57 )&& code != 188  && code != 110   && code != 8
            && code != 9   && code != 46   && code != 37   && code != 39  && code != 16    ) {
            if(IE5) e.returnValue = false;
            else e.preventDefault(); }
    }
    function nospace(v) {
// if aEvent is null, means the Internet Explorer event model, so get window.event.
        var IE5 = false;
        if (!v) var v = window.event;
        if (v.keyCode) { IE5= true; code = v.keyCode;}
        else if (v.which) code = v.which ;
//test du code
        if (((code < 48 )|| (code > 57 && code < 65 ) || (code > 90 && code < 97 ) || (code > 122) ) && code != 188  && code != 110   && code != 8
            && code != 9   && code != 46   && code != 37   && code != 39  && code != 16    ) {
            if(IE5) v.returnValue = false;
            else v.preventDefault(); }
    }
</script>
    <hr>
    <form method="post" action="updatedata.php" name="formulaire">
        <div class="row"><div class="col-md-3"><p> <strong> Données d'accès</strong> </p></div></div>
        <div class="row">
            <div class="col-md-3"><p> Filière:</p></div>
                <div class="col-md-3">
                    <select <?php if ($today >= $datelimedit){ echo "readonly" ;} ?> name="filiere" class="form-control" >
                        <option selected></option>
                        <option value="F" <?php if($ofiliere=="F") echo "SELECTED"; ?>>Génie Informatique</option>
                        <option value="T" <?php if($ofiliere=="T") echo "SELECTED"; ?>>Génie Télecom et R.</option>
                    </select>
                </div>
        </div>
        <div class="row">
            <div class="col-md-3"><p> Nom d'utilisateur:</p></div>
            <div class="col-md-3"> <?php echo $ousername;?> </div>
        </div>
        <div class="row">
            <div class="col-md-3"><p> Mot de passe:</p></div>
            <div class="col-md-3"> <input required name="password" size="31" value="<?php echo $opassword;?>"  type="password" class="form-control"></div>
        </div><br>
        <div class="row"><div class="col-md-3"><p><strong> Membres du groupe PFE</strong></p></div></div>
        <div class="row">
            <div class="col-md-3">
                <p> Nom </p>
                <p><input class="form-control" required <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>
                        name="nom1"  maxlength="32"  value="<?php echo $onom1;?>"
                        onkeyup="javascript:this.value=this.value.toUpperCase();"
                        onkeypress="javascript:this.value=this.value.toUpperCase();"
                        onmouseup ="javascript:this.value=this.value.toUpperCase();"
                        onchange="javascript:this.value=this.value.toUpperCase();"  >
                </p>
                <p>
                    <input class="form-control"  <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?> name="nom2"  maxlength="32" value="<?php echo $onom2;?>" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="javascript:this.value=this.value.toUpperCase();" onmouseup ="javascript:this.value=this.value.toUpperCase();" onchange="javascript:this.value=this.value.toUpperCase();"  >
                </p>
                <p><input class="form-control" <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="nom3"  maxlength="32"   value="<?php echo $onom3;?>"
                                                                                      onkeyup="javascript:this.value=this.value.toUpperCase();"
                                                                                      onkeypress="javascript:this.value=this.value.toUpperCase();"
                                                                                      onmouseup ="javascript:this.value=this.value.toUpperCase();"
                                                                                      onchange="javascript:this.value=this.value.toUpperCase();"  ></p>
            </div>
            <div class="col-md-3">
                <p> Prénom </p>
                <p><input class="form-control" required <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="prenom1" maxlength="32"  value="<?php echo $oprenom1;?>" ></p>
                <p><input class="form-control"  <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="prenom2" maxlength="32" value="<?php echo $oprenom2;?>" ></p>
                <p><input class="form-control" <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="prenom3" maxlength="32" value="<?php echo $oprenom3;?>" ></p>
            </div>
            <div class="col-md-3">
                <p> GSM </p>
                <p> <input class="form-control" required name="GSM1"  type="tel" maxlength="18" onkeypress=OnlyNumber(event)  value="<?php echo $oGSM1;?>" ></p>
                <p> <input class="form-control" name="GSM2"   maxlength="18" type="tel" onkeypress=OnlyNumber(event) value="<?php echo $oGSM2;?>"  ></p>
                <p><input class="form-control" name="GSM3"  maxlength="18" type="tel" onkeypress=OnlyNumber(event) value="<?php echo $oGSM3;?>"  ></p>
            </div>
            <div class="col-md-3">
                <p> Email </p>
                <p> <input class="form-control" required type="email" name="email1"   value="<?php echo $oemail1;?>" > </p>
                <p> <input class="form-control" name="email2"  type="email"  value="<?php echo $oemail2;?>" ></p>
                <p><input class="form-control" name="email3"  type="email" value="<?php echo $oemail3;?>" ></p>
            </div>
        </div>
        <div class="row"><div class="col-md-3"><p> <strong>Thème du PFE</strong> </p></div></div>
        <div class="row">
            <div class="col-md-3"><p> Intitulé du PFE:</p> </div>
            <div class="col-md-5"><input class="form-control" size="37" <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?> name="sujet" value="<?php echo $osujet;?>"   ></div>
        </div>
        <div class="row">
            <div class="col-md-3"><p> Déscription du PFE: </p></div>
            <div class="col-md-5"> <textarea  class="form-control" rows="3" cols="39" name="descr" ><?php echo $odescr;?></textarea> </div>
        </div>
        <div class="row">
            <div class="col-md-3"> <p> Mots-clés: </p></div>
            <div class="col-md-5"><input class="form-control" type="text" size="37" name="motscle"  value="<?php echo $omotscle;?>"  ></div>
        </div>
        <div class="row">
            <div class="col-md-3"><p>PFE pré-embauche:</p> </div>
            <div class="col-md-3">
                <select name="preembauche" class="form-control" >
                <option <?php if($opreembauche=="pas défini") echo "SELECTED"; ?>>pas défini</option>
                <option <?php if($opreembauche=="oui") echo "SELECTED"; ?>>oui</option>
                <option <?php if($opreembauche=="non") echo "SELECTED"; ?>>non</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"><p> Date début de stage:</p> </div>
            <div class="col-md-3"><input class="form-control" type="text" name="debut" value="<?php echo $odebut;?>" ></div>
        </div>
        <div class="row">
            <div class="col-md-3"><p> Durée de stage:</p></div>
            <div class="col-md-3" > <input class="form-control" type="text" name="duree" value="<?php echo $oduree;?>" ></div>
        </div><br>
        <div class="row">
            <div class="col-md-4"><p><strong> Entreprise & Encadrement externe </strong></p></div>
        </div><br>
        <div class="row">
            <div class="col-md-3"> <p> Entreprise & Département:</p></div>
            <div class="col-md-3" > <textarea  class="form-control" rows="3" cols="39" name="entreprise" ><?php echo $oentreprise ;?></textarea></div>
        </div><br>
        <div class="row">
            <div class="col-md-3"> <p> Coordonnés et Web :</p></div>
            <div class="col-md-3"> <textarea class="form-control"  rows="3" cols="39" name="adresse"><?php echo $oadresse ;?></textarea></div>
        </div><br>
        <div class="row">
            <div class="col-md-3"> <p> Ville:</p></div>
            <div class="col-md-3"> <input class="form-control" type="text" name="ville" value="<?php echo $oville ;?>"></div>
        </div>
        <div class="row">
            <div class="col-md-3" ><p> Nom/prénom de l'encadrant externe :</p></div>
            <div class="col-md-3" ><input class="form-control" class="form-control" type="text" name="encadrant_ext" value="<?php echo $oencadrant_ext ;?>"></div>
        </div>
        <div class="row">
            <div class="col-md-3" ><p> Fonction de l'encadrant au sein de l'entreprise :</p></div>
            <div class="col-md-3"> <textarea class="form-control" rows="3" cols="39"  name="fonction"><?php echo $ofonction ;?></textarea></div>
        </div><br>
        <div class="row">
            <div class="col-md-3"><p> Téléphone / GSM:</p> </div>
            <div class="col-md-3"> <input class="form-control" type="tel" onkeypress="OnlyNumber(event)" name="GSM_encadrant_ext" value="<?php echo $oGSM_encadrant_ext ;?>"></div>
        </div>
        <div class="row">
            <div class="col-md-3"><p> Email:</p> </div>
            <div class="col-md-3"> <input class="form-control" type="email" name="email_encadrant_ext" value="<?php echo $oemail_encadrant_ext ;?>"></div>
        </div><br><br>
        <div class="row" align="center">
            <input type="submit" name="submit" value=" Valider le formulaire" class="btn btn-info" onClick="validerForm(this.form)"  />
        </div>
    </form>
    <?php
}
else
{
    $password	= protect(htmlspecialchars($_POST['password']));
    $nom1	= protect(htmlspecialchars($_POST['nom1']));
    $nom1 = strtoupper($nom1);
    $nom1 = ltrim($nom1);
    $nom2	= protect(htmlspecialchars($_POST['nom2']));
    $nom2 = strtoupper($nom2);
    $nom2 = ltrim($nom2);
    $nom3	= protect(htmlspecialchars($_POST['nom3']));
    $nom3 = strtoupper($nom3);
    $nom3 = ltrim($nom3);
    $prenom1	= protect(htmlspecialchars($_POST['prenom1']));
    $prenom1 = ltrim($prenom1);
    $prenom1 = ucfirst(strtolower($prenom1));
    $prenom1 = str_replace('\\', '', $prenom1);
    $prenom1 = str_replace("'", '', $prenom1);
    $prenom2	= protect(htmlspecialchars($_POST['prenom2']));
    $prenom2 = ltrim($prenom2);
    $prenom2 = ucfirst(strtolower($prenom2));
    $prenom2 = str_replace('\\', '', $prenom2);
    $prenom2 = str_replace("'", '', $prenom2);
    $prenom3	= protect(htmlspecialchars($_POST['prenom3']));
    $prenom3 = ltrim($prenom3);
    $prenom3 = ucfirst(strtolower($prenom3));
    $prenom3 = str_replace('\\', '', $prenom3);
    $prenom3 = str_replace("'", '', $prenom3);
    $GSM1	= protect(htmlspecialchars($_POST['GSM1']));
    $GSM1 = str_replace(' ', '', $GSM1);
    $GSM1 = str_replace('-', '', $GSM1);
    $GSM1 = str_replace('.', '', $GSM1);
    $GSM1 = str_replace('+212', '0', $GSM1);
    $GSM1 = chunk_split($GSM1,"2"," ");
    $GSM2	= protect(htmlspecialchars($_POST['GSM2']));
    $GSM2 = str_replace(' ', '', $GSM2);
    $GSM2 = str_replace('-', '', $GSM2);
    $GSM2 = str_replace('.', '', $GSM2);
    $GSM2 = str_replace('+212', '0', $GSM2);
    $GSM2 = chunk_split($GSM2,"2"," ");
    $GSM3	= protect(htmlspecialchars($_POST['GSM3']));
    $GSM3 = str_replace(' ', '', $GSM3);
    $GSM3 = str_replace('-', '', $GSM3);
    $GSM3 = str_replace('.', '', $GSM3);
    $GSM3 = str_replace('+212', '0', $GSM3);
    $GSM3 = chunk_split($GSM3,"2"," ");
    $email1	= protect(htmlspecialchars($_POST['email1']));
    $email1 = ltrim($email1);
    $email1 = strtolower($email1);
    $email1 = str_replace(' ', '', $email1);
    $email2	= protect(htmlspecialchars($_POST['email2']));
    $email2 = ltrim($email2);
    $email2 = strtolower($email2);
    $email2 = str_replace(' ', '', $email2);
    $email3	= protect(htmlspecialchars($_POST['email3']));
    $email3 = ltrim($email3);
    $email3 = strtolower($email3);
    $email3 = str_replace(' ', '', $email3);
    $emails = $email1 . ', ' . $email2 . ', ' . $email3 ;
    if ($today >= $datelimedit){ $filiere=$ofiliere;}
    else { $filiere	= protect($_POST['filiere']);}
    $sujet	= protect(htmlspecialchars($_POST['sujet']));
    $descr	= protect(htmlspecialchars($_POST['descr']));
    $motscle	= protect(htmlspecialchars($_POST['motscle']));
    $preembauche	= protect(htmlspecialchars($_POST['preembauche']));
    $debut	= protect(htmlspecialchars($_POST['debut']));
    $duree	= protect(htmlspecialchars($_POST['duree']));
    $entreprise	= protect(htmlspecialchars($_POST['entreprise']));
    $adresse	= protect(htmlspecialchars($_POST['adresse']));
    $ville	= protect(htmlspecialchars($_POST['ville']));
    $fonction	= protect(htmlspecialchars($_POST['fonction']));
    $encadrant_ext	= protect(htmlspecialchars($_POST['encadrant_ext']));
    $email_encadrant_ext	= protect(htmlspecialchars($_POST['email_encadrant_ext']));
    $GSM_encadrant_ext	= protect(htmlspecialchars($_POST['GSM_encadrant_ext']));
//extraire l'adresse email de l'encadrant
    $prof_select0 = "SELECT * FROM `" . $table_profs . "` WHERE `nom`='{$oencadrant}'";
    $prof_result0 = mysqli_query($con,$prof_select0) or die ('Erreur : '.mysqli_error($con) );
    while($row0 = mysqli_fetch_array($prof_result0)) {
        $email_encadrant = $row0['email']; }
    $date1 = date('d-m-Y');
    $heure = date('H:i');
    $groupe = $ogroupe ;
    $groupe_label = $filiere . '-' . $ogroupe ;
    $errors = array();
    if(
        $password == $opassword  &&  $nom1 == $onom1  &&  $nom2 == $onom2  &&  $nom3 == $onom3  &&
        $prenom1 == $oprenom1  &&  $prenom2 == $oprenom2  &&  $prenom3 == $oprenom3    &&
        $GSM1 == $oGSM1  &&  $GSM2 == $oGSM2  &&  $GSM3 == $oGSM3   && $email1	== $oemail1  &&
        $email2	== $oemail2  &&  $email3 == $oemail3   &&   $filiere == $ofiliere  &&   $sujet == $osujet &&
        $ville == $oville  &&
        $descr == $odescr  &&
        $motscle == $omotscle  &&
        $preembauche == $opreembauche  &&
        $debut == $odebut  &&
        $duree == $oduree  &&
        $entreprise == $oentreprise  &&
        $adresse == $oadresse  &&
        $fonction == $ofonction  &&
        $encadrant_ext == $oencadrant_ext  &&
        $email_encadrant_ext == $oemail_encadrant_ext  &&
        $GSM_encadrant_ext == $oGSM_encadrant_ext   )
    {
        $errors[] = "Aucune données n'a été modifiée !";
    }
    $regex = "/^[a-z0-9]+([_\.-][a-z0-9]+)*@([a-z0-9]+([.-][a-z0-9]+)*)+\.[a-z]{2,}$/i";

    // if((!preg_match($regex, $email1) & $email1) || (!preg_match($regex, $email2) & $email2) ||
    //     (!preg_match($regex, $email3) & $email3)   )
    // {
    //     $errors[] = "Adresse email non valide !";
    // }
    if(!$filiere  || !$password || !$nom1 || !$prenom1 || !$GSM1 || !$email1  )
    {
        $errors[] = "Formulaire incompet ! ";
    }
    if(count($errors) > 0)
    {  ?>

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
<div class="container">
    <div class="row">

        <div class="col-lg-12"><br>
            <p class="bg-danger"><strong>Des erreurs ont été détectées lors de l'enregistrement </strong> </p>
            <?php
            foreach($errors AS $error)
            {?>
                <p><img src="ressources/img/erreur.png">  <?php echo $error ; ?> </p>
            <?php } ?>
            <p class="bg-success"><a href="javascript:history.go(-1)"> Recommençer </a></p>
        </div>
    </div><hr>
    <footer>
        <?php include_once ("footer.php");?>
    </footer>
</div>
</body>
</html>>
<?php }

else
{
// Envoyer un email au candidat

$objet = "PFE_MAJ_" . $groupe_label . "_[" . $nom1 . " " . $nom2 . " " . $nom3 . "]" ;
$message = "
<html>
<head> <meta http-equiv=Content-Type content='text/html; charset=utf-8' />
</head>

<body  bgcolor='$bg_color' >
<div align= 'center'>

    <p><font face='Arial' size='2'>$universite<br>$ecole<br>$dep_label<br>$titre</font></p>

    <p><font face='Arial' size='2'>Bonjour le groupe [<b>$nom1&nbsp; $nom2&nbsp; $nom3&nbsp;</b>]</font></p>

    <p><font face='Arial' size='2'> Vos données PFE ont été mises à jour avec succès!. </font></p>

    <p><font face='Arial' size='2'> Vous pouvez accéder à votre compte sur le <a href='$site'>site des
                PFE</a> avec les données suivantes:<br>
            &nbsp;
            USER : <b>$ousername</b><br>
            &nbsp; PASSWORD : <b>$password</b></font></p>
    <br>

    <table width='765' style='font-family:Tahoma; font-size:10pt; border-collapse:collapse; border-left-width:0px; border-right-width:0px; border-top-width:0px' cellspacing='0' border='1'>
        <tr>
            <td width='759' style='border-left:medium none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; ' bgcolor='#99CCFF'  colspan='2'>
                <font size='2'><b>&nbsp;Coordonnées </b></font></td>
            <td width='759' style='border-left:medium none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; ' bgcolor='#99CCFF'  colspan='2'>
                &nbsp;
                <p style='margin-top: 0; margin-bottom: 0'>
                    <font face='Tahoma'>Matricule :<font size='4'><b> $groupe_label  </b> </font></font></p>



            </td>
        </tr>
        <tr>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px;' width='197' align='center' bgcolor='#FFFFCC' >
                <b>Nom</b></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px;' width='202' align='center' bgcolor='#FFFFCC' >
                <b>Prénom</b></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px; width: 180px;' align='center' bgcolor='#FFFFCC'>
                <b>GSM</b></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px;' width='299' align='center' bgcolor='#FFFFCC'>
                <b>Email</b></td>


        </tr>

        <tr>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='197' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $nom1</font></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='202' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $prenom1</font></td>


            <td align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px; width: 180px;' >
                $GSM1</td>
            <td   width='299' align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px;' >
                $email1</td>

        </tr>

        <tr>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='197' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $nom2</font></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='202' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $prenom2</font></td>


            <td align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px; width: 180px;' >
                $GSM2</td>
            <td   width='299' align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px;' >
                $email2</td>

        </tr>

        <tr>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='197' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $nom3</font></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='202' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $prenom3</font></td>


            <td align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px; width: 180px;' >
                $GSM3</td>
            <td   width='299' align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px;' >
                $email3</td>

        </tr>



    </table>
    <br>

    <table width='765' style='font-family:Tahoma; font-size:10pt; border-collapse:collapse; border-left-width:0px; border-right-width:0px; border-top-width:0px' cellspacing='0' border='1'>
        <tr>
            <td width='759' style='border-left:medium none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; ' bgcolor='#99CCFF'  colspan='2'>
                <font color='#808080' size='2'><b>&nbsp;Anciennes coordonnées </b></font></td>
            <td width='759' style='border-left:medium none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; ' bgcolor='#99CCFF'  colspan='2'>





            </td>
        </tr>
        <tr style='color:gray'>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px;' width='197' align='center' bgcolor='#FFFFCC' >
                <b>Nom</b></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px;' width='202' align='center' bgcolor='#FFFFCC' >
                <b>Prénom</b></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px; width: 180px;' align='center' bgcolor='#FFFFCC'>
                <b>GSM</b></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px;' width='299' align='center' bgcolor='#FFFFCC'>
                <b>Email</b></td>


        </tr>

        <tr style='color:gray'>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='197' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $onom1</font></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='202' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $oprenom1</font></td>


            <td align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px; width: 180px;' >
                $oGSM1</td>
            <td   width='299' align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px;' >
                $oemail1</td>

        </tr>

        <tr style='color:gray'>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='197' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $onom2</font></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='202' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $oprenom2</font></td>


            <td align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px; width: 180px;' >
                $oGSM2</td>
            <td   width='299' align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px;' >
                $oemail2</td>

        </tr>

        <tr style='color:gray'>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='197' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $onom3</font></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='202' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $oprenom3</font></td>


            <td align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px; width: 180px;' >
                $oGSM3</td>
            <td   width='299' align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px;' >
                $oemail3</td>

        </tr>



    </table>





    <table width='766' bgcolor='#FFFFFF' style='border-width:0px; font-family:Tahoma; font-size:10pt'>
        <tr>
            <td colspan='2' style='border-left-style:none; border-left-width:medium; border-right-style:none;
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px' bgcolor='#99CCFF'>
                &nbsp;</td>
        </tr>
        <tr>
            <td style='border-style:none; border-width:medium; width: 280px;' bgcolor='#F4F4F0' height='51'>
                <font face='Arial'>Date :<b>  $date</b></font>


            </td>
            <td style='border-style:none; border-width:medium; ' bgcolor='#F4F4F0' height='51' width='476'>


                &nbsp;</td>
        </tr>
    </table>
    <br>

    <table width='765' bgcolor='#FFFFFF' style='border-width:0px; font-family:Tahoma; font-size:10pt'>
        <tr>
            <td style='border-style:none; border-width:medium; '  align='center' bgcolor='#FFFFCC' >
                <b>Donnée</b></td>
            <td style='border-style:none; border-width:medium; '  align='center' bgcolor='#FFFFCC' >
                <font color='#808080'>
                    <b>Ancienne</b></font></td>
            <td style='border-style:none; border-width:medium; '  align='center' bgcolor='#FFFFCC' >
                <b>Actuelle</b></td>
        </tr>






        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Matricule:</td>
            <td style='border-style:none; border-width:medium; '   bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$ofiliere-$ogroupe</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$filiere-$groupe</font></td>
        </tr>


        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Mot de passe:</td>
            <td style='border-style:none; border-width:medium; '   bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$opassword</font></td>
            <td style='border-style:none; border-width:medium; '   bgcolor='#F4F4F0'>
                <font face='Arial'>$password</font></td>
        </tr>

        <tr>
            <td width='90' style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Sujet:</td>
            <td style='border-style:none; border-width:medium; '   bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$osujet</font></td>
            <td style='border-style:none; border-width:medium; '   bgcolor='#F4F4F0'>
                <font face='Arial'>$sujet</font></td>
        </tr>




        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Déscription:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$odescr</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$descr</font></td>
        </tr>



        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Mot-clés</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$omotscle</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$motscle</font></td>
        </tr>



        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Pré-embauche:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$opreembauche</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$preembauche</font></td>
        </tr>



        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Début Stage:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$odebut</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$debut</font></td>
        </tr>



        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Durée Stage:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$oduree</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$duree</font></td>
        </tr>



        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Entreprise:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$oentreprise</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$entreprise</font></td>
        </tr>


        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Adresse:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$oadresse</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$adresse</font></td>
        </tr>

        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Ville:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$oville</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$ville</font></td>
        </tr>



        <tr>
            <td width='90' style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Encadrant ext:</td>
            <td style='border-style:none; border-width:medium; '   bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$oencadrant_ext</font></td>
            <td style='border-style:none; border-width:medium; '   bgcolor='#F4F4F0'>
                <font face='Arial'>$encadrant_ext</font></td>
        </tr>

        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Fonction:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$ofonction</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$fonction</font></td>
        </tr>


        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                Email encadrant:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$oemail_encadrant_ext</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$email_encadrant_ext</font></td>
        </tr>


        <tr>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                GSM encadrant:</td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial' color='#808080'>$oGSM_encadrant_ext</font></td>
            <td style='border-style:none; border-width:medium; '  bgcolor='#F4F4F0'>
                <font face='Arial'>$GSM_encadrant_ext</font></td>
        </tr>





    </table>



    <br>
    <p><font face='Arial' size='1'>$copyright</font></p>
</div>
</body>
</html>



";




$sql2 = "UPDATE " . $table_pfe . " SET

`password`='$password' , `filiere`='$filiere' , `nom1`='$nom1' , `nom2`='$nom2' ,
`nom3`='$nom3' , `prenom1`='$prenom1' , `prenom2`='$prenom2' , `prenom3`='$prenom3' ,
`GSM1`='$GSM1' , `GSM2`='$GSM2' , `GSM3`='$GSM3'  , `email1`='$email1' ,  `email2`='$email2' , `email3`='$email3'  ,
`sujet`='$sujet' , `descr`='$descr' , `preembauche`='$preembauche' , `motscle`='$motscle' , `debut`='$debut' ,
`duree`='$duree' , `entreprise`='$entreprise' , `adresse`='$adresse' , `ville`='$ville' , `encadrant_ext`='$encadrant_ext' ,
`fonction`='$fonction' , `email_encadrant_ext`='$email_encadrant_ext' , `GSM_encadrant_ext`='$GSM_encadrant_ext'

WHERE `username`='".$_SESSION['username']."'";

$query = mysqli_query($con,$sql2) or die(mysqli_error($con));


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
			display : none;
			}</style>

</head>
<body>
<div class="container">
    <div class="row"><br>
	<p style="text-align:center" class="bg-success">Vos données ont été modifiées avec <b>succès</b>!. </p>
        <p style="text-align:center" > <span class="glyphicon glyphicon-envelope">&nbsp; Un email de confirmation vous a été envoyé , Si vous n'avez pas reçu cet email, veuillez consulter votre boîte Spam .</span></p><br>
			                        <p style="text-align:center" ><a href="mean.php"> Précédent </a></p>

	</div><hr>
	
    <footer>
        <?php include_once ("footer.php");?>
    </footer>
</div>
</body>
</html>	


	<?php
    mail($emails, $objet, $message, $headers) ; 

    }
    }
    ?>
    <?php

    }


    }
    else
    {
    include "interdit.php";
    }
    }//condition de delai
    ?>
