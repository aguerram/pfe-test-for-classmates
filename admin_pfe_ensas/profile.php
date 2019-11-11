<?php 

session_start();

if( $_SESSION['user']   )
{

include "../db_connect.php";

$sql="SELECT * from `" . $table_pfe . "` WHERE `username`='" . $_GET['username'] . "'";


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
$password	 =	($row['password']);
$groupe	 =	($row['groupe']);

$nom1	 =	($row['nom1']);
$nom2	 =	($row['nom2']);
$nom3	 =	($row['nom3']);

$prenom1	 =	($row['prenom1']);
$prenom2	 =	($row['prenom2']);
$prenom3	 =	($row['prenom3']);


$email1	 =	($row['email1']);
$email2	 =	($row['email2']);
$email3	 =	($row['email3']);


$GSM1	 =	($row['GSM1']);
$GSM2	 =	($row['GSM2']);
$GSM3	 =	($row['GSM3']);



$encadrant	 =	($row['encadrant']);
$email_encadrant	 =	($row['email_encadrant']);
$filiere	 =	($row['filiere']);
$sujet	 =	($row['sujet']);

$date	 =	($row['date']);


$groupe_label = $filiere . '-' . $groupe ;
$filename = $groupe_label . "-" . $username . ".pdf" ;
$target_path = "rapports/" . $filename ;



//Traitement des données

switch ($filiere) {

 	case 'T':
	$filiere_label= 'Génie Télécom et Réseaux' ;
	$pfa_label= 'PFE' ;
	break;

 	case 'F':
	$filiere_label= 'Génie Informatique' ;
	$pfa_label= 'PFE' ;
	break;

       }


//Date de derniere consultation
$dateconsult = date('m/d-H:i');
$sql = "UPDATE " . $table_pfe . " SET `dateconsult`='$dateconsult' WHERE `username`='".$_GET['username']."'";
$query = mysql_query($sql) or die(mysql_error());






?>
	
	
	
	
<html>
	
<head> 
<title>Fiche PFE</title>
<meta http-equiv=Content-Type content='text/html; charset=utf-8' /> 
<base target="_self">
<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>
</head>
<body bgcolor="<?php echo $bg_color; ?>" > 
<div align=center id="printableArea">

<table width="766" bgcolor="#FFFFFF" style="font-family:Tahoma; font-size:10pt; border-right-width:0px; border-top-width:0px; border-bottom-width:0px" height="130">
	<tr>
	
	
		<td style="border-style:solid; border-width:1px; width: 250px;" bgcolor= #FFFFFF >
		<p align="center">
		<img src="../images/irt_logo.jpg" height=108 align="center" >
		</td>
		
		
		<td style="border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" bgcolor="#FFFFCC">
<p align="center" style="margin-top: 0; margin-bottom: 0">
<font size="2"><?php echo $universite; ?><br><?php echo $ecole; ?><br><?php echo $dep_label; ?></p>




<p align="center" style="margin-top: 0; margin-bottom: 0">
&nbsp;</p>

<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
		<font size="5" face="Tahoma" >Fiche &nbsp;<?php echo $pfa_label; ?> </font></b></p>
		<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
		<font face="Tahoma" size="4"><?php echo $filiere_label; ?></font>
		</b></p>
		</font></td>
	</tr>
</table>


<p align="center" style="margin-top: 0; margin-bottom: 0">
<font size="1" color="#4476C1"><b>
<font color="#4476C1" face="Arial"> </font></b></font></p>




<table width="766" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">
	<tr>
		<td colspan="3" style="border-style:none; border-width:medium; height: 6px;">


<p align="right" style="margin-top: 0; margin-bottom: 0">
<font face="Tahoma">Matricule de PFE :<font size="4"><b>&nbsp;  
<?php echo $groupe_label ; ?> </b> </font></font>
</td>
	</tr>
	<tr>
		<td colspan="3" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px; height: 24px;" bgcolor="#FFFFCC">
		<font size="3"><b>Membres du groupe PFE</b></font></td>
	</tr>
	
	<tr>
		<td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<strong><?php echo $prenom1 ; ?> <?php echo $nom1 ; ?></strong></td>
		
		<td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<strong><?php echo $email1 ; ?></strong></td>
		
		<td width="140" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<strong><?php echo $GSM1 ; ?></strong></td>
		
	</tr>
	
	<tr>
		<td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<strong><?php echo $prenom2 ; ?> <?php echo $nom2 ; ?></strong></td>
		
		<td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<strong><?php echo $email2 ; ?></strong></td>
		
		<td width="140" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<strong><?php echo $GSM2 ; ?></strong></td>
		
	</tr>
	
	<tr>
		<td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<strong><?php echo $prenom3 ; ?> <?php echo $nom3 ; ?></strong></td>
		
		<td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<strong><?php echo $email3 ; ?></strong></td>
		
		<td width="140" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<strong><?php echo $GSM3 ; ?></strong></td>
		
	</tr>
	
	
	
	</table>
	<br>
	
	<table width="766"  bgcolor="#FFFFFF" style="border-width:0px; font-family: Tahoma; font-size: 10pt">
	<tr>
		<td bgcolor="#FFFFCC" colspan="2" style="border-left-style:none; border-left-width:medium; 
		border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium;
		 border-bottom-style:solid; border-bottom-width:1px"><b><font size="3" face="Tahoma">Thème du PFE</font></b></td>
	</tr>
	<tr>
		<td width="146" bgcolor="#F4F4F0" style="border-left-style:none; border-left-width:medium; 
		border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" valign="top">Intitulé du PFE:</td>
		<td width="610" style="font-weight:bold; border-left-style:none; border-left-width:medium; 
		border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">
		
		
		<p style="margin-top: 0; margin-bottom: 0">
		<strong>
  <?php if(file_exists($target_path)) {echo "<a style='text-decoration:yes' target='_blank' href='rapports/$filename'>";} ?>
  <?php echo $row['sujet'] . "</a>"; ?>
		</strong> 
		</p>

		
		
		</td>
	</tr>
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium; ">Description du PFE:</td>
		<td width="610" style="border-style: none; border-width: medium; "><pre style="white-space:normal" ><?php echo $row["descr"];?></pre> </td>
	</tr>
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium; height: 20px;">Mots-clés:</td>
		<td width="610" style="border-style: none; border-width: medium; height: 20px;"><?php echo $row["motscle"];?> </td>
	</tr>
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
		&nbsp;</td>
		<td width="610" style="border-style: none; border-width: medium"> </td>
	</tr>

	
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">PFE pré-embauche:</td>
		<td width="610" style="border-style: none; border-width: medium"><?php echo $row["preembauche"];?> </td>
	</tr>
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Date début de stage:</td>
		<td width="610" style="border-style: none; border-width: medium"><?php echo $row["debut"];?> </td>
	</tr>
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Durée de stage:</td>
		<td width="610" style="border-style: none; border-width: medium"><?php echo $row["duree"];?> </td>
	</tr>
</table>


<br>



<table width="764"  bgcolor="#FFFFFF" style="border-width:0px; font-family: Tahoma; font-size: 10pt">
	<tr>
		<td bgcolor="#FFFFCC" colspan="2" style="border-left-style:none; border-left-width:medium; 
		border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; 
		border-bottom-style:solid; border-bottom-width:1px"><b>
		<font size="3" face="Tahoma">
		Entreprise &amp; Encadrement externe</font></b></td>
	</tr>
	<tr>
		<td width="145" bgcolor="#F4F4F0" style="border-left-style:none; border-left-width:medium; 
		border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" valign="top">
		Entreprise &amp; Département:</td>
		<td style="font-weight:bold; border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-bottom-style:none; border-bottom-width:medium"><b><pre style="white-space:normal" ><?php echo $row["entreprise"];?></pre></b> </td>
	</tr>
	
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
		Coordonnés et Web:</td>
		<td width="609" style="border-style: none; border-width: medium"><pre style="white-space:normal" ><?php echo $row["adresse"];?></pre></td>
	</tr>
	
	
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
		Ville:</td>
		<td width="609" style="border-style: none; border-width: medium"><?php echo $row["ville"];?> </td>
	</tr>
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
		&nbsp;</td>
		<td width="609" style="border-style: none; border-width: medium">&nbsp;</td>
	</tr>
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Encadrant(s) externe(s):</td>
		<td style="border-style: none; border-width: medium; font-weight:bold"><b><?php echo $row["encadrant_ext"];?></b> </td>
	</tr>
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Fonction de l&#39;encadrant:</td>
		<td width="609" style="border-style: none; border-width: medium"><pre style="white-space:normal" ><?php echo $row["fonction"];?> </pre></td>
	</tr>
	
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
		Téléphone / GSM:</td>
		<td width="609" style="border-style: none; border-width: medium"><?php echo $row["GSM_encadrant_ext"];?> </td>
	</tr>
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
		Email:</td>
		<td width="609" style="border-style: none; border-width: medium"><?php echo $row["email_encadrant_ext"];?> </td>
	</tr>
	</table>



	
	<br>
	
<table width="766" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">

<tr>
		<td colspan="2" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px; height: 24px;" bgcolor="#FFFFCC">
		<font size="3"><b>Encadrement pédagogique</b></font></td>
	</tr>


	<tr>
		<td width="248" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<p style="margin-top: 0; margin-bottom: 0">Encadrant pédagogique: </td>
		<td style="border-style:none; border-width:medium" bgcolor="#F4F4F0">
		<p style="margin-top: 0; margin-bottom: 0"><strong>Prof. <?php echo $encadrant; ?></strong> </p>
		</td>
	</tr>
	<tr style="display:yes">
		<td width="248" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		Email de l'encadrant 
		pédagogique: 
		</td>
		<td style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
		<p style="margin-top: 0; margin-bottom: 0"><strong><?php echo $email_encadrant; ?></strong> </p>
		</td>

	</tr>
	
	
	

	

	
	
	</table>






	<br>
	
	<table width="766" id="table3" bgcolor="#FFFFFF" style="border-width:0px; font-family: Tahoma; font-size: 10pt">

	
	
	
	
	<tr>
		<td width="373" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0" height="26">
				<font face="Arial">Date d'enregistrement :<b> <?php echo $date;?></b></font>

		
		</td>
		<td style="border-style:none; border-width:medium; " bgcolor="#F4F4F0" height="26" width="383">
		
		
		&nbsp;</td>
	</tr>

	</table>

</div>
<div align="center"><br>
	<button onclick="printDiv('printableArea')" > Imprimer la fiche </button>
</div>
<br>
<p align="center" style="margin-top: 0; margin-bottom: 0">
	<font face="Arial" size="1"><?php echo $dep_label . " / " . $ecole; ?> <br>
	</font></p>
</body>
</html>




<?php

}


}
else
{
echo "Accès non authorisé!";
}






?>