<?php 
session_start();

include "../db_connect.php";


$today = mktime(0,0,0,date("m"),date("d"),date("y")); 
if ($today >= $datefinale){
include "expiration.html";}
else{




if($_GET["username"])
{

$sql="SELECT * from `" . $table_pfe . "` WHERE `username`='".$_GET['username']."' ";
$res=mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($res) != 1)
{


echo "<script language=\"Javascript\" type=\"text/javascript\">
	alert(\"Accès non authorisé!\")
	document.location.href='index.php'</script>";
}
else
{


$row=mysql_fetch_assoc($res);


$ousername	 =	($row['username']);
$opassword	 =	($row['password']);
$ogroupe	 =	($row['groupe']);

$onom1	 =	($row['nom1']);
$onom2	 =	($row['nom2']);
$onom3	 =	($row['nom3']);

$oprenom1	 =	($row['prenom1']);
$oprenom2	 =	($row['prenom2']);
$oprenom3	 =	($row['prenom3']);

$oGSM1	 =	($row['GSM1']);
$oGSM2	 =	($row['GSM2']);
$oGSM3	 =	($row['GSM3']);

$oemail1	 =	($row['email1']);
$oemail2	 =	($row['email2']);
$oemail3	 =	($row['email3']);

$oville	 =	($row['ville']);
$osujet	 =	($row['sujet']);
$odescr  =	($row['descr']);
$omotscle 	 =	($row['motscle']);
$opreembauche 	 =	($row['preembauche']);
$odebut 	 =	($row['debut']);
$oduree 	 =	($row['duree']);
$oentreprise =	($row['entreprise']);
$oadresse 	 =	($row['adresse']);
$oencadrant	 =	($row['encadrant']);
$oemail_encadrant	 =	($row['email_encadrant']);
$ofonction 	 =	($row['fonction']);
$oencadrant_ext 	 =	($row['encadrant_ext']);
$oemail_encadrant_ext 	 =	($row['email_encadrant_ext']);
$oGSM_encadrant_ext 	 =	($row['GSM_encadrant_ext']);

$ofiliere	 =	($row['filiere']);
$date	 =	($row['date']);

$date1 = date('d-m-Y');
$heure = date('H:i');

$ogroupe_label = $ofiliere . '-' . $ogroupe ;

?>
	
	
<html>

<head> <meta http-equiv=Content-Type content='text/html; charset=utf-8' /> </head>

<body bgcolor='<?php echo $bg_color; ?>'>
<div align='center'>
<p align='center' style='margin-top: 0; margin-bottom: 0'></p>


<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
<font face="Tahoma" size="4" color="#4476C1">Mise à jour des données</font></b></p>
<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>

<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>


<p align="center" style="margin-top: 0; margin-bottom: 0">
<font face="Tahoma"> Groupe PFE :&nbsp; </font>
<span style="text-decoration: none; font-weight:700">
<font face="Tahoma" color="#4476C1"><b><?php echo $ogroupe_label ; ?></b> </font>
</span><br>

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



</head>




<body bgcolor="#DDECFE" > 


<form method="post" action="edit.php" name="formulaire">




<div align="center">



<table width="820" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">
			<tr>
				<td  colspan="2" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px; height: 24px;" bgcolor="#FFFFCC">
				<font size="3"><b>Données d'accès</b></font></td>
			</tr>
			
			
			<tr style="<?php if ($today >= $datelimedit){ echo "display:none" ;} ?>" >
				<td width="177" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
				<strong>Filière:</strong></td>
				<td style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
				
				<font face="Arial">
				<select <?php if ($today >= $datelimedit){ echo "readonly" ;} ?> name="filiere" >
				<option selected></option>
				
				<option value="F" <?php if($ofiliere=="F") echo "SELECTED"; ?>>Génie Informatique</option>
				<option value="T" <?php if($ofiliere=="T") echo "SELECTED"; ?>>Génie Télecom et R.</option>

			
				</select>
				</font>

				
				
				</td>
			</tr>

			
			
			<tr>
				<td width="177" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
				<strong>Nom d'utilisateur:</strong></td>
				<td style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
				<font face="Arial"><b><?php echo $ousername;?>	</b></font></td>
			</tr>

			
			<tr>
				<td width="177" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
				<strong>Mot de passe:</strong></td>
				<td style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
				<font face="Arial"><b>
				<input name="password" size="31" value="<?php echo $opassword;?>"  type="password"></b></font></td>
			</tr>
			</table>


<br>


<table width="820" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">
			
			<tr>
				<td colspan="4" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px; height: 24px;" bgcolor="#FFFFCC">
				<font size="3"><b>Membres du groupe PFE</b></font></td>
			</tr>

			<tr>
				<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor= #D0A375>
				<font size="2"><b>Nom</b></font></td>
				
				<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#D0A375">
				<font size="2"><b>Prénom</b></font></td>

				<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#D0A375">
				<font size="2"><b>GSM</b></font></td>

				<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#D0A375">
				<font size="2"><b>Email</b></font></td>

				
				
			</tr>

			<tr>
				<td  style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0"><b><font face="Arial">
				<input  <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="nom1"  maxlength="32"  size="30"  value="<?php echo $onom1;?>" 
				  onkeyup="javascript:this.value=this.value.toUpperCase();" 
				  onkeypress="javascript:this.value=this.value.toUpperCase();" 
				   onmouseup ="javascript:this.value=this.value.toUpperCase();"
				   onchange="javascript:this.value=this.value.toUpperCase();"  ></font></b></td>
				<td  style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0"><b>
				<font face="Arial"><input  <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="prenom1" maxlength="32" size="30" value="<?php echo $oprenom1;?>" ></font></b></td>
				   				<td  style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
				<b><font face="Arial"><input name="GSM1" size="18"  maxlength="18" onkeypress=OnlyNumber(event)  value="<?php echo $oGSM1;?>" ></font></b></td>
				<td  style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
				<input name="email1" maxlength="42" size="36" style="width: 224px" value="<?php echo $oemail1;?>" >
				</td>

			</tr>
			

			<tr>
				<td style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0"><b><font face="Arial">
				<input  <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="nom2"  maxlength="32"  size="30"  value="<?php echo $onom2;?>" 
				  onkeyup="javascript:this.value=this.value.toUpperCase();" 
				  onkeypress="javascript:this.value=this.value.toUpperCase();" 
				   onmouseup ="javascript:this.value=this.value.toUpperCase();"
				   onchange="javascript:this.value=this.value.toUpperCase();"  ></font></b></td>
				<td style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0"><b>
				<font face="Arial"><input  <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="prenom2" maxlength="32" size="30" value="<?php echo $oprenom2;?>" ></font></b></td>
				   				<td  style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
				<b><font face="Arial"><input name="GSM2" size="18"  maxlength="18" onkeypress=OnlyNumber(event) value="<?php echo $oGSM2;?>"  ></font></b></td>
				<td  style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
				<input name="email2" maxlength="42" size="36" style="width: 224px" value="<?php echo $oemail2;?>" >
				</td>

			</tr>
			

			<tr>
				<td  style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0"><b><font face="Arial">
				<input  <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="nom3"  maxlength="32"  size="30"  value="<?php echo $onom3;?>" 
				  onkeyup="javascript:this.value=this.value.toUpperCase();" 
				  onkeypress="javascript:this.value=this.value.toUpperCase();" 
				   onmouseup ="javascript:this.value=this.value.toUpperCase();"
				   onchange="javascript:this.value=this.value.toUpperCase();"  ></font></b></td>
				<td  style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0"><b>
				<font face="Arial"><input <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?>  name="prenom3" maxlength="32" size="30" value="<?php echo $oprenom3;?>" ></font></b></td>
				   				<td style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
				<b><font face="Arial"><input name="GSM3" size="18"  maxlength="18" onkeypress=OnlyNumber(event) value="<?php echo $oGSM3;?>"  ></font></b></td>
				<td  style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
				<input name="email3" maxlength="42" size="36" style="width: 224px" value="<?php echo $oemail3;?>" >
				</td>

			</tr>
			

			
			
			
			</table>
<br>


<table width="820" id="table3" bgcolor="#FFFFFF" style="border-width:0px; font-family: Tahoma; font-size: 10pt">
	<tr>
		<td bgcolor="#FFFFCC" colspan="2" style="border-left-style:none; border-left-width:medium; 
		border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium;
		 border-bottom-style:solid; border-bottom-width:1px"><b><font size="3" face="Tahoma">Thème du PFE</font></b></td>
	</tr>
	<tr>
		<td width="146" bgcolor="#F4F4F0" style="border-left-style:none; border-left-width:medium; 
		border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" valign="top">Intitulé du PFE:</td>
		<td width="610" style="font-weight:bold; border-left-style:none; border-left-width:medium; 
		border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium"> <font face="Arial">
						<input <?php  if ($today >= $datelimedit){ echo "readonly" ;} ?> name="sujet" size="92"  value="<?php echo $osujet;?>"   ></font></td>
	</tr>
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Déscription du PFE:</td>
		<td width="610" style="border-style: none; border-width: medium"> <font face="Arial">
						<textarea rows="5" name="descr"  style="width: 553px"><?php echo $odescr;?></textarea></font></td>
	</tr>
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Mots-clés:</td>
		<td width="610" style="border-style: none; border-width: medium"><font face="Arial">
						<input type="text" name="motscle" size="92" value="<?php echo $omotscle;?>"  ></font></td>
	</tr>
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">&nbsp;</td>
		<td width="610" style="border-style: none; border-width: medium">&nbsp;</td>
	</tr>
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">PFE pré-embauche:</td>
		<td width="610" style="border-style: none; border-width: medium"> <font face="Arial">
						<select name="preembauche" size="1" />
						<option <?php if($opreembauche=="pas défini") echo "SELECTED"; ?>>pas défini</option>
						<option <?php if($opreembauche=="oui") echo "SELECTED"; ?>>oui</option>
						<option <?php if($opreembauche=="non") echo "SELECTED"; ?>>non</option>
						
						</select>
						
						</font></td>
	</tr>
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Date début de stage:</td>
		<td width="610" style="border-style: none; border-width: medium"> <font face="Arial">
						<input type="text" name="debut" size="33" value="<?php echo $odebut;?>" ></font></td>
	</tr>
	
	<tr>
		<td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Durée de stage:</td>
		<td width="610" style="border-style: none; border-width: medium"><font face="Arial">
						<input type="text" name="duree" size="33" value="<?php echo $oduree;?>" ></font></td>
	</tr>
</table>







<br>



<table width="820" id="table2" bgcolor="#FFFFFF" style="border-width:0px; font-family: Tahoma; font-size: 10pt">
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
		border-right-width:medium; border-bottom-style:none; border-bottom-width:medium"><font face="Arial">
						<textarea rows="2" name="entreprise"  cols="55"><?php echo $oentreprise ;?></textarea></font> </td>
	</tr>
	
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
		Coordonnés 
		et Web:</td>
		<td width="609" style="border-style: none; border-width: medium"><font face="Arial">
						<textarea rows="3" name="adresse"  cols="55"><?php echo $oadresse ;?></textarea></font></td>
	</tr>
	
	
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
		Ville:</td>
		<td width="609" style="border-style: none; border-width: medium"><font face="Arial">
						<input type="text" name="ville" value="<?php echo $oville ;?>"  size="59"></font></td>
	</tr>
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">&nbsp;</td>
		<td width="609" style="border-style: none; border-width: medium">&nbsp;</td>
	</tr>
	
	
	
	
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
		Nom/prénom de l'encadrant externe :</td>
		<td style="border-style: none; border-width: medium; font-weight:bold"><font face="Arial">
						<input type="text" name="encadrant_ext" value="<?php echo $oencadrant_ext ;?>"  size="59"></font> </td>
	</tr>
	
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Fonction de l&#39;encadrant 
		au sein de l'entreprise :</td>
		<td width="609" style="border-style: none; border-width: medium"> <font face="Arial">
						<textarea rows="2" name="fonction"  cols="55"><?php echo $ofonction ;?></textarea></font></td>
	</tr>
	
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Téléphone / GSM:</td>
		<td width="609" style="border-style: none; border-width: medium"> <font face="Arial">
						<input type="text" name="GSM_encadrant_ext" value="<?php echo $oGSM_encadrant_ext ;?>"  size="59"></font></td>
	</tr>
	<tr>
		<td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Email:</td>
		<td width="609" style="border-style: none; border-width: medium"><font face="Arial">
						<input type="text" name="email_encadrant_ext" value="<?php echo $oemail_encadrant_ext ;?>"  size="59"></font> </td>
	</tr>
	</table>




		</div>











<div align="center">


		<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
		<table width="820" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">
		
			<tr>
				<td align="center">
				
				<p align="center" style="margin-top: 0; margin-bottom: 0">
				<font face="Arial">
				<input type="submit" name="submit" value="Valider le formulaire" onClick="validerForm(this.form)" style="font-family: Arial; font-size: 10pt; font-weight:bold" />
				</font></td>
			</tr>
		</table>
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		</div>
		
		
		&nbsp;</form>
		
		  <p>&nbsp;</p><p align='center'><font face='Arial' size='1'><?php echo $copyright ;?></font></p>
<p align='center'>&nbsp;</p>
<p align='center'>&nbsp;</p>
<p align='center'>&nbsp;</p>


</body>
</html>
<?php
}
else
{




$password	= protect($_POST['password']);

$nom1	= protect($_POST['nom1']);
$nom1 = strtoupper($nom1);
$nom1 = ltrim($nom1);
//$nom1 = str_replace(' ', '', $nom1);
//$nom1 = str_replace("'", '', $nom1);

$nom2	= protect($_POST['nom2']);
$nom2 = strtoupper($nom2);
$nom2 = ltrim($nom2);
//$nom2 = str_replace(' ', '', $nom2);
//$nom2 = str_replace("'", '', $nom2);

$nom3	= protect($_POST['nom3']);
$nom3 = strtoupper($nom3);
$nom3 = ltrim($nom3);
//$nom3 = str_replace(' ', '', $nom3);
//$nom3 = str_replace("'", '', $nom3);


$prenom1	= protect($_POST['prenom1']);
$prenom1 = ltrim($prenom1);
$prenom1 = ucfirst(strtolower($prenom1));
$prenom1 = str_replace('\\', '', $prenom1);
$prenom1 = str_replace("'", '', $prenom1);

$prenom2	= protect($_POST['prenom2']);
$prenom2 = ltrim($prenom2);
$prenom2 = ucfirst(strtolower($prenom2));
$prenom2 = str_replace('\\', '', $prenom2);
$prenom2 = str_replace("'", '', $prenom2);

$prenom3	= protect($_POST['prenom3']);
$prenom3 = ltrim($prenom3);
$prenom3 = ucfirst(strtolower($prenom3));
$prenom3 = str_replace('\\', '', $prenom3);
$prenom3 = str_replace("'", '', $prenom3);



$GSM1	= protect($_POST['GSM1']);
$GSM1 = str_replace(' ', '', $GSM1);
$GSM1 = str_replace('-', '', $GSM1);
$GSM1 = str_replace('.', '', $GSM1);
$GSM1 = str_replace('+212', '0', $GSM1);
$GSM1 = chunk_split($GSM1,"2"," ");

$GSM2	= protect($_POST['GSM2']);
$GSM2 = str_replace(' ', '', $GSM2);
$GSM2 = str_replace('-', '', $GSM2);
$GSM2 = str_replace('.', '', $GSM2);
$GSM2 = str_replace('+212', '0', $GSM2);
$GSM2 = chunk_split($GSM2,"2"," ");

$GSM3	= protect($_POST['GSM3']);
$GSM3 = str_replace(' ', '', $GSM3);
$GSM3 = str_replace('-', '', $GSM3);
$GSM3 = str_replace('.', '', $GSM3);
$GSM3 = str_replace('+212', '0', $GSM3);
$GSM3 = chunk_split($GSM3,"2"," ");


$email1	= protect($_POST['email1']);
$email1 = ltrim($email1);
$email1 = strtolower($email1);
$email1 = str_replace(' ', '', $email1);

$email2	= protect($_POST['email2']);
$email2 = ltrim($email2);
$email2 = strtolower($email2);
$email2 = str_replace(' ', '', $email2);

$email3	= protect($_POST['email3']);
$email3 = ltrim($email3);
$email3 = strtolower($email3);
$email3 = str_replace(' ', '', $email3);


$emails = $email1 . ', ' . $email2 . ', ' . $email3 ; 


if ($today >= $datelimedit){ $filiere=$ofiliere;} 
else { $filiere	= protect($_POST['filiere']);}



$sujet	= protect($_POST['sujet']);
$descr	= protect($_POST['descr']);
$motscle	= protect($_POST['motscle']);
$preembauche	= protect($_POST['preembauche']);
$debut	= protect($_POST['debut']);
$duree	= protect($_POST['duree']);
$entreprise	= protect($_POST['entreprise']);
$adresse	= protect($_POST['adresse']);
$ville	= protect($_POST['ville']);
$fonction	= protect($_POST['fonction']);
$encadrant_ext	= protect($_POST['encadrant_ext']);
$email_encadrant_ext	= protect($_POST['email_encadrant_ext']);
$GSM_encadrant_ext	= protect($_POST['GSM_encadrant_ext']);


//extraire l'adresse email de l'encadrant
$prof_select0 = "SELECT * FROM `" . $table_profs . "` WHERE `nom`='{$oencadrant}'";
$prof_result0 = mysql_query($prof_select0,$con) or die ('Erreur : '.mysql_error() );
while($row0 = mysql_fetch_array($prof_result0)) {
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

if((!preg_match($regex, $email1) & $email1) || (!preg_match($regex, $email2) & $email2) || 
(!preg_match($regex, $email3) & $email3)   )
{
$errors[] = "Adresse email non valide !";
}




if(!$filiere  || !$password || !$nom1 || !$prenom1 || !$GSM1 || !$email1  )
{
   $errors[] = "Formulaire incompet ! ";
}



if(count($errors) > 0)
{
  
  
  echo "
  <div align='center'>
  <br>
  <font color='red'>
  ";
  
  foreach($errors AS $error)
  {
    echo "<p>" . $error . "\n";
  }
  echo "</font><p><a href='javascript:history.go(-1)'>Recommençer</a></p></div>";
 
}


else
{
  

 
// Envoyer un email au candidat

$objet = "PFE_MAJ_" . $groupe_label . "_[" . $nom1 . " " . $nom2 . " " . $nom3 . "]" ;


$message = "



<html>
<head> <meta http-equiv=Content-Type content='text/html; charset=utf-8' /> 
</head>

<body bgcolor='$bg_color'>
<div align= 'left'>

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

WHERE `username`='".$_GET['username']."'";

$query = mysql_query($sql2) or die(mysql_error());




echo "

<body bgcolor='$bg_color'>
<div align='center'>
<p align='center' style='margin-top: 0; margin-bottom: 0'>
&nbsp;</p>
<p style='margin-top: 0; margin-bottom: 0' align='center'>&nbsp;</p>

<div align='center'>
	<table width='783' bgcolor='#FFFFFF' style='border-width:0px; font-family:Tahoma; font-size:10pt'>
		<tr>
			<td width='777' style='border-style:none; border-width:medium; ' bgcolor='#F4F4F0'>
			<p style='margin-top: 0; margin-bottom: 0' align='center'>
			<font face='Tahoma' size='2'>Vos données ont été modifiées avec <b>succès</b>!.<br>
			Un email de confirmation vous a été envoyé</font></p>
			</td>
			</tr>
		
	</table>
	<p style='margin-top: 0; margin-bottom: 0' align='left'>&nbsp;</p>
	</div>
";
 	



  	
if ($host<>'localhost' && $host<>'127.0.0.1' ) {mail($emails, $objet, $message, $headers) ; }
else {echo  $message;}





 

 
 

}
}
?>







<?php

}


}
else
{
echo "Accès non authorisé!";
}




}//condition de delai




?>