<?php

session_start();
    if(!isset($_SESSION['user']) or $_SESSION['user']!="admin" ){
    header('Location:interdit.php');
}
include "../db_connect.php";

if(!isset($_POST['submit']))
{


include "prof_formulaire.php";

}
else
{

    $login = htmlspecialchars(protect($_POST['login']));
    $pass=htmlspecialchars(protect($_POST['password']));

$nom1	= protect($_POST['nom']);
$nom1 = strtoupper($nom1);
$nom1 = ltrim($nom1);
$nom1 = str_replace(' ', '', $nom1);
$nom = str_replace("'", '', $nom1);

$prenom4	= protect($_POST['prenom']);
$prenom4 = ltrim($prenom4);
$prenom4 = ucfirst(strtolower($prenom4));
$prenom4 = str_replace('\\', '', $prenom4);
$prenom = str_replace("'", '', $prenom4);

$GSM4	= protect($_POST['GSM']);
$GSM4 = str_replace(' ', '', $GSM4);
$GSM4 = str_replace('-', '', $GSM4);
$GSM4 = str_replace('.', '', $GSM4);
$GSM4 = str_replace('+212', '0', $GSM4);
$GSM = chunk_split($GSM4,"2"," ");

$email4	= protect($_POST['email']);
$email4 = ltrim($email4);
$email4 = strtolower($email4);
$email = str_replace(' ', '', $email4);

$date = date('Y/m/d-H:i');




$errors = array();



$regex = "/^[a-z0-9]+([_\.-][a-z0-9]+)*@([a-z0-9]+([.-][a-z0-9]+)*)+\.[a-z]{2,}$/i";

if((!preg_match($regex, $email) & $email)   )
{
$errors[] = "Adresse email non valide !";
}


if( !$nom || !$prenom || !$email   )
{
   $errors[] = "Formulaire incompet ! ";
}



$sql = "SELECT * FROM `" . $table_profs . "` WHERE `nom`='{$nom}'";
$query = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($query) > 0) 
{
  $errors[] = "Encadrant deja inscrit !";
}



if(count($errors) > 0)
{
  
  echo "
<body bgcolor='" . $bg_color . "'>
<div align='center'>
<p align='center' style='margin-top: 0; margin-bottom: 0'>
&nbsp;</p>
<p align='center' style='margin-top: 0; margin-bottom: 0'>&nbsp;</p>
<p style='margin-top: 0; margin-bottom: 0' align='center'><font face='Tahoma' size='2'>&nbsp;</font></p>
<p style='margin-top: 0; margin-bottom: 0' align='center'>&nbsp;</p>

<table width='766' bgcolor='#FFFFFF' style='border-width:0px; font-family:Tahoma; font-size:10pt'>
	<tr>
		<td style='border-style:none; border-width:medium; ' bgcolor='#FFFFCC' width='148'>
		<p align='center'><font size='1' color='#4476C1'><b>
		</b></font></td>
		<td style='border-style:none; border-width:medium; ' bgcolor='#D0A375'></td>
		<td style='border-style:none; border-width:medium; ' bgcolor='#FFFFCC' width='148'>
		<p align='center'>&nbsp;</td>
	</tr>
</table>

   
  ";
  
  echo "<font color=\"red\">Formulaire non valide !: ";
  echo "<font color=\"red\">";
  
  foreach($errors AS $error)
  {
    echo "<p>" . $error . "\n";
  }
  echo "</font>";
  echo "<p><a href=\"javascript:history.go(-1)\">Recommençer</a></p>";
  
  echo "</div>
   
  <p>&nbsp;</p>  <p>&nbsp;</p>  <p>&nbsp;</p>
  <p align='center'><font face='Arial' size='1'> <?php echo $copyright;  ?> </font></p>   "; } 
   
   else { 
   
   $sql = "INSERT INTO " . $table_profs . " ( nom , prenom , GSM , email,login,passe ) VALUES('$nom' , '$prenom' , '$GSM' , '$email', '$login', '$pass' )";

$query = mysql_query($sql) or die(mysql_error()); 


echo "


<head>
<meta http-equiv=Content-Type content='text/html; charset=utf-8' />
	<script src=\"../ressources/jquery.min.js\"></script>
	<script>
		if (!$(\"link[href='../ressources/css/bootstrap.min.css']\").length)
			$('<link href=\"../ressources/css/bootstrap.min.css\" rel=\"stylesheet\">').appendTo(\"head\");
		if (!$(\"link[href='../ressources/css/portfolio-item.css']\").length)
			$('<link href=\"../ressources/css/portfolio-item.css\" rel=\"stylesheet\">').appendTo(\"head\");

	</script>
</head>

<body bgcolor='{$bg_color}'>
<div align='center'>
<p align='center' style='margin-top: 0; margin-bottom: 0'>
&nbsp;</p>
<p align='center' style='margin-top: 0; margin-bottom: 0'>&nbsp;</p>
<p style='margin-top: 0; margin-bottom: 0' align='center'>&nbsp;</p>

<a href='mean.php'><button class='btn btn-info'> Accueil</button> </a>
<a href='prof_liste.php'><button class='btn btn-info'> Liste des Encadrants </button> </a>
<a href='prof_register.php'><button class='btn btn-info'> Ajouter un Encadrant </button> </a>

<br>
	
<div align='center'>
	<table width='783' bgcolor='#FFFFFF' style='text-align:center;border-width:0px; font-family:Tahoma; font-size:10pt'>
		<tr>
			<td width='777' style='border-style:none; border-width:medium; height: 80px;' bgcolor='#F4F4F0'>
			
			
			<p style='text-align:center;margin-top: 0; margin-bottom: 0' align='left'>
			<font face='Tahoma' size='2'>L'encadrant <b>{$nom} &nbsp;{$prenom} </b>a 
			été ajouté avec succès. </font></p>
			</td>
			</tr>
 			</table>
	";?>
<hr>
    <!-- Footer -->
    <footer>
        <?php include_once ("footer.php");?>
</footer>

</body>
<?php
   }
 } 
	
	?>



