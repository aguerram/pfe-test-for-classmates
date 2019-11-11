<?php 

session_start();

if( isset($_SESSION['user']) AND isset($_SESSION['pass']) )
{


include "../db_connect.php";


$name= $_GET['nom'] ;


$sql="SELECT * from `" . $table_profs . "` WHERE `nom`='".$name."' ";
//echo $sql ;

$res=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($res) == 0)
{


echo "<script language=\"Javascript\" type=\"text/javascript\">
	alert(\"Accès non authorisé!!!!\")
	document.location.href='prof_liste.php'</script>";
}
else
{


$row=mysql_fetch_assoc($res);



$onom	 =	($row['nom']);

$oprenom	 =	($row['prenom']);

$oemail	 =	($row['email']);

$oGSM	 =	($row['GSM']);

$ojury	 =	($row['jury']);
$osalle	 =	($row['salle']);
	$login_prof=($row['login']);
    $passe_prof=($row['passe']);
?>
	
	
<html>


<head> <meta http-equiv=Content-Type content='text/html; charset=utf-8' />
	<script src="../ressources/jquery.min.js"></script>
	<link href="../ressources/css/portfolio-item.css" rel="stylesheet">
	<script>
						function nospaces(t){
			if(t.value.match(/\s/g)){
				t.value=t.value.replace(/\s/g,'');
			}
		}
		
		if (!$("link[href='../ressources/css/bootstrap.min.css']").length)
			$('<link href="../ressources/css/bootstrap.min.css" rel="stylesheet">').appendTo("head");

	</script>
	<style>
		.monter{
			display: none;
		}
	</style>

 </head>

<body bgcolor='<?php echo $bg_color; ?>'>
<div align='center'>
<p align='center' style='margin-top: 0; margin-bottom: 0'>&nbsp;</p>



<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
<font face="Tahoma" size="4" color="#4476C1">Mise à jour des encadrants</font></b></p>
<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>
<table width="820" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">

</table>
<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>


<p align="center" style="margin-top: 0; margin-bottom: 0">
<font face="Tahoma"> Encadrant:&nbsp; </font>
<span style="text-decoration: none; font-weight:700">
<font face="Tahoma" color="#4476C1"><b><?php echo $onom ; ?>&nbsp;<?php echo $oprenom ; ?></b> </font>
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




<body bgcolor='<?php echo $bg_color; ?>'>




<form method="post" id="formulaire" action="prof_edit.php?nom=<?php echo $onom; ?>" name="formulaire">

<div align="center">
		
			<br>
			<table class="table-responsive table " style=" font-family:Tahoma; font-size:10pt">
			
			<tr >
		<td colspan="8" style="border-style:none; border-width:medium; height: 20px;" >
		<p align="center"><font size="2" color="#4476C1"><b>
		<font color="#4476C1">Coordonnées</font></b></font></td>
	</tr>


			<tr class="bg-success">
				<td >
				<font size="2"><b>Nom</b></font></td>
				
				<td  >
				<font size="2"><b>Prénom</b></font></td>

				<td >
				<font size="2"><b>GSM</b></font></td>

				<td >
				<font size="2"><b>Email</b></font></td>
				<td >
					<font size="2"><b>Login</b></font></td>
				<td >
					<font size="2"><b>Passe</b></font></td>
				<td >
					<font size="2"><b>Jury N° </b></font></td>
				<td >
					<font size="2"><b>Salle de soutenance</b></font></td>
				
			</tr>

			<tr>
				<td   bgcolor="#F4F4F0"><b><font face="Arial">
				<input name="nom"  value="<?php echo $onom;?>"   maxlength="32"
				   onkeyup="nospaces(this)"  
				  onkeypress="javascript:this.value=this.value.toUpperCase();" 
				   onmouseup ="javascript:this.value=this.value.toUpperCase();"
				   onchange="javascript:this.value=this.value.toUpperCase();"  ></font></b></td>
				<td bgcolor="#F4F4F0"><b>
				<font face="Arial"><input name="prenom"  onkeyup="nospaces(this)" value="<?php echo $oprenom;?>"  maxlength="30" ></font></b></td>
				   				<td bgcolor="#F4F4F0">
				<b><font face="Arial"><input name="GSM"  value="<?php echo $oGSM;?>"  size="18"  maxlength="18" onkeypress=OnlyNumber(event) ></font></b></td>
				<td bgcolor="#F4F4F0">
				<input name="email"  value="<?php echo $oemail;?>"  maxlength="42"  >
				</td>
				<td bgcolor="#F4F4F0">
					<input name="login_prof" required  onkeyup="nospaces(this)" type="text" value="<?php if($login_prof!=""){echo $login_prof;}else{ echo " ";}?>"   maxlength="42" >
				</td>
				<td bgcolor="#F4F4F0">
					<input name="passe_prof" required type="password" value="<?php if($passe_prof!=""){echo $passe_prof;}else{ echo "";}?>"  maxlength="42"  >
				</td>
				<td bgcolor="#F4F4F0">
				<input name="jury" value="<?php echo $ojury;?>"   onkeyup="nospaces(this)" size="8"  maxlength="2" onkeypress=OnlyNumber(event) >
				</td>
				<td bgcolor="#F4F4F0">
					<input name="salle"  value="<?php echo $osalle;?>"  onkeyup="nospaces(this)" maxlength="42"  >
				</td>
			</tr>
			
	
			
			</table>
			<br>


			
		<table width="820" height="38">
			<tr>
				<td align="center" >
				
				<p align="center" style="margin-top: 0; margin-bottom: 0">
				<font face="Arial">
				<input class="btn btn-danger" type="submit" name="submit" value="Valider le changement" onClick="validerForm(this.form)" style="font-family: Arial; font-size: 10pt; font-weight:bold" /></font></td>
			</tr>
		</table>
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		
	
		</div>
		</form>



<hr>
<footer>
	<?php include_once ("footer.php");?>
</footer>









</body>
</html>
<?php
}
else
{

$login_prof=htmlspecialchars(protect($_POST['login_prof']));
	$passe_prof=htmlspecialchars(protect($_POST['passe_prof']));
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



$jury	= protect($_POST['jury']);
$salle	= protect($_POST['salle']);


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
  
$sql2 = "UPDATE " . $table_profs . " SET 	

`nom`='$nom' , `prenom`='$prenom' , `GSM`='$GSM' , `salle`='$salle' , `email`='$email' , `login`='$login_prof',`passe`='$passe_prof', `jury`='$jury'

WHERE `nom`='".$_GET['nom']."'";

$query = mysql_query($sql2) or die(mysql_error());


echo "


<body bgcolor='" . $bg_color . "'>
<div align='center'>
<p align='center' style='margin-top: 0; margin-bottom: 0'>
&nbsp;</p>
<p style='margin-top: 0; margin-bottom: 0' align='center'>&nbsp;</p>

<div align='center'>
	<table width='783' bgcolor='#FFFFFF' style='border-width:0px; font-family:Tahoma; font-size:10pt'>
		<tr>
			<td width='777' style='border-style:none; border-width:medium; ' bgcolor='#F4F4F0'>
			<p style='margin-top: 0; margin-bottom: 0' align='center'>
			<font face='Tahoma' size='2'><b>Les données ont été modifiées avec succès</b>!.
			</font></p>
			</td>
			</tr>
		
	</table>
	
	
	<p style='margin-top: 0; margin-bottom: 0' align='center'>
	<br>
	<input class='btn btn-success' type='button' value='          Retourner vers liste des Encadrants         ' onClick=\"location.href='prof_liste.php'\"  name='button'>
	
	
	&nbsp;</p>
	</div>
";
 	

 

}
}
?>


<?php

}


} //session
else
{
	header('Location:interdit.php');
}
?>

