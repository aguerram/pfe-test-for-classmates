<?php
session_start();
?>

<html>
<head> <meta http-equiv=Content-Type content='text/html; charset=utf-8' />
<script>
function blink(ob)
{
if (ob.style.visibility == 'visible' )
{
ob.style.visibility = 'hidden';
}
else
{
ob.style.visibility = 'visible';
}
}
setInterval('blink(bl)',300);
</script> 


<base target="droite">


</head>





<?php


if(isset($_SESSION['username']))
{

include "db_connect.php";
$today = mktime(0,0,0,date("m"),date("d"),date("y")); 

$sql="SELECT * from `" . $table_pfe . "` WHERE `username`='".$_SESSION['username']."'";
$res=mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($res) != 1)
{
echo "<script language=\"Javascript\" type=\"text/javascript\">
	alert(\"This user does not exist\")
	document.location.href='index.php'</script>";
}

else
{


$row=mysql_fetch_assoc($res);

$username	 =	($row['username']);
$nom1	 =	($row['nom1']);
$nom2	 =	($row['nom2']);
$nom3	 =	($row['nom3']);

$prenom1	 =	($row['prenom1']);
$prenom2	 =	($row['prenom2']);
$prenom3	 =	($row['prenom3']);



$filiere	 =	($row['filiere']);
$groupe	 =	($row['groupe']);
$groupe_label = $filiere . '-' . $groupe ;

$encadrant	 =	($row['encadrant']);
$email_encadrant	 =	($row['email_encadrant']);
$sujet	 =	($row['sujet']);


$filename = $groupe_label . "-" . $username . ".pdf" ;

$target_path = "rapports/" . $filename ;

?>

<body bgcolor=  <?php echo $bg_color; ?>  lang=FR >
<div align='center'>

<p style='margin-top: 0; margin-bottom: 0' align='center'>&nbsp;</p>

<img src='images/irt_logo.jpg' align='center' width="133"  >
<p align='center' style='margin-top: 0; margin-bottom: 0'>&nbsp;</p>
<p align='center' style='margin-top: 0; margin-bottom: 0'><b>
<font size='4' face='Tahoma' color='#000080'><?php echo $titre; ?></font></b></p>
<p align='center' style='border-width:0px; font-family:Tahoma; font-size:10pt;margin-top: 0;'>
<strong> <?php echo $dep_label; ?>  </strong></p>

<br>



<table width="100%" bgcolor= '#FFFFFF ' style= 'font-family:Tahoma; font-size:10pt; ' align= 'center ' >
	<tr>
	<td bgcolor= '#FFFFCC '  >
		<p align= 'center '>Groupe&nbsp; : <b><?php echo $groupe_label; ?></b></p>
		
	</td>
	
	</tr>
	
		<tr>
		
			<td bgcolor= '#FFFFCC ' >
		<p align= 'center '> <b>
		
		&nbsp; <br>
		&nbsp;<?php echo $nom1 . " " . $prenom1; ?> <br>
		&nbsp;<?php echo $nom2 . " " . $prenom2; ?> <br>
		&nbsp;<?php echo $nom3 . " " . $prenom3; ?> <br>

		
		
		
		
		</b></p>
		
		
		
		
	</td>

		
		</tr>
		
		

<p  align= 'center ' style= 'margin-top: 0; margin-bottom: 0 '>&nbsp;</p>
</table>

<br>

<?php
if(!$sujet) {

echo "
<div id='bl' align='center' >
<font face='Tahoma' size=3 color=blue><b>
Important !
</b></font></div>
<div align='center' >
<font face='Tahoma' size=2 color=red>

<a href='updatedata.php' style='text-decoration: none'>
Vous devez completer votre formulaire PFE ! </a>
</font></div> <br>
";

}




echo "

<div align='center'>

	<p style='margin-top: 0; margin-bottom: 0' align='center'>	
	&nbsp;</p>

<table width='100%' bgcolor='#FFFFFF' style='  border-width:0px; font-family:Tahoma; font-size:10pt' >
	<tr>
		<td style='border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px' bgcolor='#FFFFCC' >
		<font size='3'><b>Menu</b></font></td>
	</tr>


	<tr >
		<td  style='border-style:none; border-width:medium; height: 26px;' bgcolor='#F4F4F0'>
		<b><a target='droite' href='downloads.php' style='text-decoration: none'>

		<font face='Tahoma' size='2'  color='#4476C1'>
Modalités des PFE</font></a></b></td>
		</tr>
	
	

	
		<tr>
		<td  style='border-style:none; border-width:medium; height: 26px;' bgcolor='#F4F4F0'>
		<b><a target='droite' href='liste_total.php' style='text-decoration: none'>
		<font face='Tahoma' size='2' color='#4476C1'>
liste des PFE </font></a></b></td>
		</tr>
	
	<tr>
		<td  style='border-style:none; border-width:medium; height: 26px;' bgcolor='#F4F4F0'>
		<b><a target='droite' href='profile.php' style='text-decoration: none'>
		<font face='Tahoma' size='2' color='#4476C1'>
Ma fiche PFE  </font></a></b></td>
		</tr>


	<tr >
		<td  style='border-style:none; border-width:medium; height: 26px;' bgcolor='#F4F4F0'>
		<b><a target='droite' href='updatedata.php' style='text-decoration: none'>

		<font face='Tahoma' size='2' color='#4476C1'>
Formulaire PFE </font></a></b></td>
		</tr>

	<tr >
		<td  style='border-style:none; border-width:medium; height: 26px;' bgcolor='#F4F4F0'>
		<b><a target='droite' href='documents.php' style='text-decoration: none'>

		<font face='Tahoma' size='2' color='#4476C1'>
Documents utiles </font></a></b></td>
		</tr>



		<tr >
		<td  style='border-style:none; border-width:medium; ' bgcolor='#F4F4F0' height='26'>
		<b><a target='droite' href=\"updatepdf.php?user=".$_SESSION['username']."\" style='text-decoration: none'>
		<font face='Tahoma' size='2' color='#4476C1'>
Rapport PFE </font></a></b></td>
		</tr>


		<tr>
		<td  style='border-style:none; border-width:medium; height: 26px;' bgcolor='#F4F4F0'>
		<b><a target='droite' href='planning.php' style='text-decoration: none'>
		<font face='Tahoma' size='2' color='#4476C1'>
Soutenances PFE </font></a></b></td>
		</tr>
	<tr>
		<td  style='border-style:none; border-width:medium; ' bgcolor='#F4F4F0'>
		<b><a target='_parent' href='logout.php' style='text-decoration: none'>
<font face='Tahoma' size='2' color='#4476C1'>
Déconnexion</font></a></b></td>
		</tr>
	</table>

<p align='center' style='margin-top: 0; margin-bottom: 0'>&nbsp;</p>
<p align='center' style='margin-top: 0; margin-bottom: 0'>&nbsp;</p>

</div>
</div>
<p>&nbsp;</p><p align='center'><font face='Arial' size='1'>Conception: ENSAS-IRT </font></p>
</html>

";

	
	
	} //Mysql rows

} //session
else
{
echo "Accès non authorisé!!!";
}
?>