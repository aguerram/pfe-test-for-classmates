<?php 

session_start();
$autorized="true";

if( isset($_SESSION['user']) AND isset($_SESSION['pass']) )
{

if( isset($_SESSION['login']) and $_SESSION['login']!=$_GET['encadrant'] ){
    $autorized="false";
}

if($_SESSION['user']=="admin" ){
    $autorized="true";
}
if( $autorized=="false" ){
    header('Location:interdit.php');
}

include '../db_connect.php';


$encadrant= $_GET['encadrant'] ;
$date1 = date('d-m-Y');
$heure = date('H:i');

$date	 =	$date1 . " " . $heure;






function generer_excel ($filiere) {

include '../db_connect.php';


switch ($filiere) {
case 'F':
$filiere_txt = 'Génie Informatique';
break;

case 'T':
$filiere_txt = 'Génie Télécom & R.';
break;

}

$select0 = "SELECT * FROM " . $table_pfe . " WHERE valide='1' AND `filiere`='" . $filiere . "'  "  ;
$result0 = mysqli_query($con,$select0) or die ('Erreur : '.mysqli_error() );
$total = mysqli_num_rows($result0);

$var=0;
while($row = mysqli_fetch_array($result0)) {

if($row['nom1']) {

$username[$var]	 =	($row['username']);
$groupe[$var]	 =	($row['groupe']);
$encadrant[$var]	 =	($row['encadrant']);
$filiere2[$var]	 =	($row['filiere']);
$sujet[$var]	 =	($row['sujet']);
$groupe_label[$var] = $filiere2[$var] . '-' . $groupe[$var] ;
$note[$var]	 = ($row['note']);
$nom[$var]	 =	($row['nom1']);
$prenom[$var]	 =	($row['prenom1']);
}

if($row['nom2']) {

$var=$var+1;
$username[$var]	 =	($row['username']);
$groupe[$var]	 =	($row['groupe']);
$encadrant[$var]	 =	($row['encadrant']);
$filiere2[$var]	 =	($row['filiere']);
$sujet[$var]	 =	($row['sujet']);
$groupe_label[$var] = $filiere2[$var] . '-' . $groupe[$var] ;
$note[$var]	 = ($row['note']);
//$note[$var] = str_replace(',', '.', $note[$var]);
$nom[$var]	 =	($row['nom2']);
$prenom[$var]	 =	($row['prenom2']);
}

if($row['nom3']) {

$var=$var+1;
$username[$var]	 =	($row['username']);
$groupe[$var]	 =	($row['groupe']);
$encadrant[$var]	 =	($row['encadrant']);
$filiere2[$var]	 =	($row['filiere']);
$sujet[$var]	 =	($row['sujet']);
$groupe_label[$var] = $filiere2[$var] . '-' . $groupe[$var] ;
$note[$var]	 = ($row['note']);
$nom[$var]	 =	($row['nom3']);
$prenom[$var]	 =	($row['prenom3']);

}


$var=$var+1;
}

//array_multisort($nom, $prenom, $encadrant, $sujet, $note, $groupe_label); 



//generation du fichier csv ;

$file = $filiere . '.csv' ;
$fp = fopen($file,'w');


$titre = utf8_decode('Filiere : ' . $filiere_txt) ;

  fputcsv($fp, array(' ', ' '),";") ;

  fputcsv($fp, array(' ', utf8_decode($dep_label)),";") ;
  fputcsv($fp, array(' ', 'Notes des PFE '),";") ;
  fputcsv($fp, array(' ', $titre),";") ;

  fputcsv($fp, array(' ', ' '),";") ;


$num0 = utf8_decode('     N°') ;
$nom0 = utf8_decode('Nom') ;
$prenom0 = utf8_decode('Prénom') ;
$note0 = utf8_decode('    Note') ;


  fputcsv($fp, array(' ', $num0, $nom0, ' ', $prenom0, ' ' , $note0),";") ;


for ($i = 0 ; $i < $var ; $i++){

$nomi = utf8_decode($nom[$i]) ;
$prenomi = utf8_decode($prenom[$i]) ;
$notei = utf8_decode($note[$i]) ;

  fputcsv($fp, array(' ', $i+1, $nomi , ' ', $prenomi, ' ' , $notei),";") ;
}
fclose($fp) ;

}

$select0 = 'SELECT * FROM ' . $table_pfe . ' WHERE (INSTR( encadrant , "' . $encadrant . '" )) AND valide=\'1\' '  ;

$result0 = mysqli_query($con,$select0) or die ('Erreur : '.mysqli_error() );
$total = mysqli_num_rows($result0);


//echo $total ;
$var=0;
while($row = mysqli_fetch_array($result0)) {

$username[$var]	 =	($row['username']);
$password[$var]	 =	($row['password']);
$groupe[$var]	 =	($row['groupe']);

$nom1[$var]	 =	($row['nom1']);
$nom2[$var]	 =	($row['nom2']);
$nom3[$var]	 =	($row['nom3']);

$prenom1[$var]	 =	($row['prenom1']);
$prenom2[$var]	 =	($row['prenom2']);
$prenom3[$var]	 =	($row['prenom3']);




$encadrant2[$var]	 =	($row['encadrant']);

$filiere[$var]	 =	($row['filiere']);
$sujet[$var]	 =	($row['sujet']);


$groupe_label[$var] = $filiere[$var] . '-' . $groupe[$var] ;


$filename[$var] = $groupe_label[$var] . "-" . $username[$var] . ".pdf" ;

$target_path[$var] = "../rapports/" . $filename[$var] ;


$onote[$var]	 = ($row['note']);
$onote[$var] = str_replace(',', '.', $onote[$var]);


$var=$var+1;
}

?>


<script src="../ressources/jquery.min.js"></script>
<script>
    if (!$("link[href='../ressources/css/bootstrap.min.css']").length)
        $('<link href="../ressources/css/bootstrap.min.css" rel="stylesheet">').appendTo("head");
    if (!$("header.php").length)
        $('header.php').appendTo("body");

</script>
<head>
<title><?php echo $encadrant; ?> - Notes PFE</title>
<meta http-equiv=Content-Type content='text/html; charset=utf-8' />
</head>

<body bgcolor='<?php echo $bg_color; ?>'>

<div align="center">

<p align="center" style="margin-top: 0; margin-bottom: 0">
&nbsp;</p>


<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
<font face="Tahoma" size="4" color="#4476C1">Saisi des notes</font></b></p>



<p align="center"><font style="font-family:Arial" size="3">Encadrant : </font><font style="font-family:Arial" size="3"><b><?php echo $encadrant; ?></b></font>
<br>
<br>


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

if ((code < 48 || code > 57 ) && code != 188  && code != 8
  && code != 9  && code != 45  && code != 46   && code != 16    ) {
	if(IE5) e.returnValue = false;
	else e.preventDefault(); }
}
</script>


<div class="col-md-12">
<form method="post" action="notes.php?encadrant=<?php echo $encadrant ; ?>" name="formulaire">



<table class="table table-responsive table-bordered table-condensed"   >
<tr class="bg-success" >
  <th class="sortable-numeric" >N°</th>
  <th class="sortable-text" >Matr</th>
  <th class="sortable-numeric">Membres</th>
  <th  class="sortable-numeric" >Encadrant</th>
  <th class="sortable-numeric">Sujet</th>
  <th class="sortable-text">Note</th>




  </tr>






<?php

for($var=0;$var < $total;$var++)
  {
?>




<tr >
  <td ><?php echo $var+1; ?></td>
  <td >  <font color="#000000"><?php echo $groupe_label[$var]; ?></font>  </td>
  <td >
    <font color="#000000"> <?php if($nom1[$var]){ echo $nom1[$var] . "&nbsp;" . $prenom1[$var];  }?> </font>
    <font color="#000000"> <?php if($nom2[$var]){ echo "<br>" . $nom2[$var] . "&nbsp;" . $prenom2[$var]  ;  }?> </font>
    <font color="#000000"> <?php if($nom3[$var]){ echo "<br>" . $nom3[$var] . "&nbsp;" . $prenom3[$var]  ;  }?> </font>

  </td>
  <td >   <font color="#000000"><?php echo $encadrant2[$var]; ?></font>  </td>
  <td >   <font color="#000000">
     <?php echo "$sujet[$var] "; ?>  
     <?php if(file_exists($target_path[$var])) {echo "<a style='text-decoration:none' target='_blank' href='../rapports/$filename[$var]'>[ Rapport ]</a>";} ?>
   </font>
  </td>

  <td style="height: 31px">
     <input name="note<?php echo $var+1 ;?>" tabindex="<?php echo $var+1 ;?>" value="<?php echo $onote[$var];?>" size="6" maxlength="6" onkeypress=OnlyNumber(event)>
  </td>

</tr>




<?php




}
?>

</table>
<br>
<input type="submit" class="btn  btn-danger" name="submit" value="Valider les notes" onClick="validerForm(this.form)" style="font-family: Arial; font-size: 10pt; font-weight:bold" />
</form>
</div>
<?php
}

if(isset($_POST['submit'])){

$notes = '';
$errors = array();

  for($var=1;$var < $total+1;$var++)
  {

   $note	= protect($_POST['note'.$var]);

$notes = $notes . ' | ' . $note ;

if ($note) {$note = floatval($note);$note = number_format($note,2,',', '');}


if( $note >16  )
{
  $errors[] = "Attention...Note superieure à 16 ! ";
}
if(count($errors) > 0)
{ ?>

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
                                   <p><img src="../ressources/img/erreur.png">  <?php echo $error ; ?> </p>
                             <?php } ?>
                        <p class="bg-success"><a href="javascript:history.go(-1)"> Recommençer </a></p>
                    </div>
                </div><hr>
                <footer>
                    <?php include_once ("footer.php");?>
                </footer>
            </div>
            </body>
            </html>

        <?php


  break;

}
else
{

$sql = "UPDATE " . $table_pfe . " SET 	`note`='$note' 	WHERE `username`='".$username[$var-1]."'";

$query = mysqli_query($con,$sql) or die(mysqli_error());

}

}
if(count($errors) == 0)
{

generer_excel ('T') ;
generer_excel ('F') ;

$objet = "PFE_Notes " . $encadrant ;
$message = "

<html>
<head>
<meta charset=UTF-8' />
</head>
<div align= 'left'>

<p><font face='Arial' size='2'>$universite<br>$ecole<br>$dep_label<br>$titre
<br> </font>
</p>

<p><font face='Arial' size='2'>Les notes de <b>$encadrant</b> ont été mises à jour</font></p>

<table width='400' style='font-family:Tahoma; font-size:10pt; border-collapse:collapse; border-left-width:0px; border-right-width:0px; border-top-width:0px' cellspacing='0' border='1'>

	<tr>

		<td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; ' bgcolor='#FFFFCC'>
		<b>Notes :&nbsp;&nbsp;&nbsp; </b>

		$notes</td>

	</tr>
	<tr>

		<td  align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; ' >
		&nbsp;</td>


	</tr>

	<tr>
		<td  style='border-left-style:none; border-left-width:medium; border-right-style:none;
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px' bgcolor='#99CCFF'>
		&nbsp;</td>
	</tr>
	<tr>
		<td style='border-style:none; border-width:medium; width: 280px;' bgcolor='#F4F4F0' height='51'>
				<font face='Arial'>Date de mise à jour :<b>  $date</b></font>

		</td>
	</tr>
	</table>


<p><font face='Arial' size='2'>  <a href='$site/admin'>Supervision des PFE</a></font>

<p><font face='Arial' size='1'>$copyright</font></p>
</div>

</html>

" ;

    include_once ('../ressources/functions.php');
    $emails=get_email($encadrant);
    mail($emails, $objet, $message, $headers) ;
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
                p{
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12"><br>
                        <p class="bg-info"><strong>Les notes ont été mises à jour avec succés</strong> </p>
                        <p ><span class="glyphicon glyphicon-envelope	">  Un email de confirmation vous a été envoyé , Si vous n'avez pas reçu cet email, veuillez consulter votre boîte Spam .</span> </p>
                        <p class="bg-success"><a href="javascript:history.go(-1)"> Précédent </a></p>
                    </div>
                </div><hr>
                <footer>
                    <?php include_once ("footer.php");?>
                </footer>
            </div>
            </body>
            </html>


<?php
}
}//if isset
} //session
else
{
header('Location:interdit.php');
}
?>













