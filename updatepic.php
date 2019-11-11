<?php 
session_start();

if($_SESSION['CIN'])
{

include "../db_connect.php";

$sql="SELECT * from `3a_inscription` WHERE `CIN`='".$_SESSION['CIN']."' AND  `active`='oui'   ";
$res=mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($res) != 1)
{
echo "<script language=\"Javascript\" type=\"text/javascript\">
	alert(\"Operation non valide!\")
	document.location.href='home.php'</script>";
}
else
{


$row=mysql_fetch_assoc($res);

$username	=	($row['username']);
$prenom	 =	($row['prenom']);
$CIN	=	($row['CIN']);
$CNE	=	($row['CNE']);

$photoname = $username . "-" . $CIN . ".jpg" ;

$matricule	=	($row['matricule']);
$email	=	($row['email']);

$date1 = date('d-m-Y');
$heure = date('H:i');

?>
	
	

<html>
<head>
<meta http-equiv=Content-Type content='text/html; charset=utf-8' />

<style type="text/css">
.style1 {
	background-color: #CFDEF3;
}
.style2 {
	background-color: #99CCFF;
}
</style>	
</head>
<body bgcolor="#CFDEF3">
<div align=center>

<p align="center" style="margin-top: 0; margin-bottom: 0">
<img border="0" src="logo.jpg" align="center"  ></p>
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
<font face="Tahoma" size="4">Concours d'accès en </font>
<font face="Tahoma" size="5">3ème année</font></b></p>
<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
<font face="Tahoma" size="4" color="#4476C1">Insertion/Changement de photo 
d'identité</font></b></p>
<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>
<table width="766" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">
	<tr>
		<td style="border-style:none; border-width:medium; " bgcolor="#FFFFCC">
		<p align="center"><font size="1" color="#4476C1"><b><a href="home.php">
		<font color="#4476C1">Accueil</font></a></b></font></td>
	</tr>
</table>
<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>


<p align="center" style="margin-top: 0; margin-bottom: 0">
<font face="Tahoma">Compte de :&nbsp; </font>
<span style="text-decoration: none; font-weight:700">
<font face="Tahoma" color="#4476C1"><?php echo $prenom ; ?> <?php echo $username ; ?></font>
</span>





</div>

</body>
</html>



<?php

 
if(!isset($_POST['submit']))
{
?>





<html>


<head>

<meta http-equiv=Content-Type content='text/html; charset=utf-8' />



<script type="text/javascript"> 
function checkFile() { 
var fileElement = document.getElementById("uploadfile"); 
var fileExtension = ""; 
if (fileElement.value.lastIndexOf(".") > 0) { 
fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length); 
} 
if (fileExtension == "jpg" || fileExtension == "JPG") { 
return true; 
} 
else { 
alert("   Format de fichier non valide !\n  La photo doit etre en format jpg "); 
return false; 
} 
} 
</script> 


</head>




<body bgcolor="#DDECFE" >

<form enctype="multipart/form-data" action="updatepic.php" method="POST" name="formulaire" onsubmit="return checkFile();" >
<div align="center">
<table>
	<tr>
	<td width="777" style="border-style:none; border-width:medium; height: 37px;" colspan="2" class="style1">
	<p style="margin-top: 0; margin-bottom: 0" align="center">
	<img src="photos/<?php echo $photoname; ?>?<?php echo rand(1,3000); ?>" height=100 align="center" >
	</p>
	<p style="margin-top: 4; margin-bottom: 0" align="center">&nbsp;</p>
	
	
	</td>
	</tr>



	
	<tr>
	<td class="style2">
	<font face="Tahoma" color="#000080" size="3">

	
	
	<p align="center">Choisir une nouvelle photo d'identité</font>
	
	<font face="Tahoma" color="red" size="1">
	
	
	<br>(La photo doit etre en format <b>jpg</b> et sa taille ne doit pas dépasser 
	<b>300k</b>)
	</font></p>
	</td>
	<td class="style2">
	<p align="center">
<input type="hidden" name="MAX_FILE_SIZE" value="320000" />  
<input name="uploadfile" id="uploadfile" type="file" accept="image/jpeg" size="45" /> </p>
	</td>
	</tr>

<tr>
<td colspan="2" class="style2">
<p align="center">
				<font face="Arial" color="#4476C1">
				<input type="submit" name="submit" value="  Valider la nouvelle photo  " onClick="validerForm(this.form)" style="font-family: Arial; font-size: 10pt; font-weight:bold" />
				</font></p></td>


</tr>
</table>
</div>


<font face="Tahoma" color="#4476C1">
		
				&nbsp;</p>






<div align="center">


		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		
			
		
		</div>
		
		
		&nbsp;</form>
		
		
		
		  <p>&nbsp;</p><p align='center'><font face='Arial' size='1'>Conception: M. Fertat&nbsp; - Copyright (c) 2009</font></p>


</body>
</html>
<?php
}
else
{

$date1 = date('d-m-Y');
$heure = date('H:i');

$errors = array();


if(count($errors) > 0)
{
echo "
<body bgcolor='#DDECFE'>
<div align='center'>
</p>
  ";

echo "<font color=\"red\">";
 foreach($errors AS $error)
  {
    echo "<p>" . $error . "\n";
  }
  echo "</font>";
  echo "<p><a href=\"javascript:history.go(-1)\">Recommençer</a></p>";
  
  echo "</div>";
  
}

else
{
  
 
 
 
$target_path = "photos/" . $photoname ;
//$target_path = $target_path . basename( $_FILES['uploadfile']['name']); 
$_FILES['uploadfile']['tmp_name']; 

if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)) {


    echo "
        
    
    
    
<html>
<head> <meta http-equiv=Content-Type content='text/html; charset=utf-8' /> </head>
<body bgcolor='#DDECFE' >
<div align='center'>
<p align='center' style='margin-top: 0; margin-bottom: 0'>
&nbsp;</p>
<p style='margin-top: 0; margin-bottom: 0' align='center'>&nbsp;</p>

<div align='center'>
	<table width='783' bgcolor='#FFFFFF' style='border-width:0px; font-family:Tahoma; font-size:10pt'>

		<tr>
			<td width='777' style='border-style:none; border-width:medium; ' bgcolor='#F4F4F0'>
			<p style='margin-top: 0; margin-bottom: 0' align='center'>
			<font face='Tahoma' size='2'>Votre photo d'identité <b>"
			
 . basename( $_FILES['uploadfile']['name']).

"</b> a été chargée <b>avec succès</b>.<br>
			Un email de confirmation vous a été envoyé</font></p>
			</td>
			</tr>
		
	</table>
	<p style='margin-top: 0; margin-bottom: 0' align='left'>&nbsp;</p>
	</div>
</html>
  
    
    
    ";
    
    
    
    
 
 
 
 
 
 
 
 
// Envoyer un email au candidat

$objet = "3A - $username - $matricule - Mise a jour photo (F)" ;


$message = "


<html>
<head> <meta http-equiv=Content-Type content='text/html; charset=utf-8' /> </head>
<div align= 'left'>
<p style='margin-top: 0; margin-bottom: 0'>
<font face='Arial' size='2'>Université cadi Ayyad<br>
ENSA de Safi<br>
Service Scolarité</font></p>
<p style='margin-top: 0; margin-bottom: 0'><font face='Arial' size='2'><br>
Bonjour&nbsp; $username </font></p><p style='margin-top: 0; margin-bottom: 0'><font face='Arial' size='2'>
CNE :&nbsp; $CNE </font></p><p style='margin-top: 0; margin-bottom: 0'><font face='Arial' size='2'>
CIN :&nbsp; $CIN </font></p>
<p style='margin-top: 0; margin-bottom: 0'>&nbsp;</p>
<p style='margin-top: 0; margin-bottom: 0'><font face='Arial' size='2'> <br>
Vous avez inséré ou mis à jour votre photo d'identité</font></p>

<font face='Arial' size='2'> <br>
Vous pouvez accéder à  votre fiche de candidature sur le 
<a href='http://www.ensas.uca.ma'>site de l'ENSAS</a> 

<br>
</div>
  <p>&nbsp;</p>
<p>&nbsp;</p><p align='center'><font face='Arial' size='1'>Conception: M. Fertat&nbsp; - Copyright (c) 2009</font></p>


</html>


";





  	
  	
   	
if ($host<>'localhost') {mail($email, $objet, $message, $headers) ; }
else {echo  $message;}


} else{
   
    
    
    
      echo "
      
      <div align=center>
      <p>&nbsp;</p><p>&nbsp;</p>
      <font face='Arial' size='3'>La taille de l'image de doit pas depasser 300K !<p>  Veuillez  ";
  echo "<font color=\"red\">";
  
  echo "</font>";
  echo "<a href=\"javascript:history.go(-1)\">Recommençer</a>";
  
  echo "</font></div>
   
  <p>&nbsp;</p><p>&nbsp;</p><p align='center'><font face='Arial' size='1'>Conception: M. Fertat&nbsp; - Copyright (c) 2009</p>

   
    
    
    
    ";
}



 
 

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






?>