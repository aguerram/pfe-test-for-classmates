<?php

if(!isset($_SESSION['user']) or $_SESSION['user']!="admin" ){
header('Location:interdit.php');
}
?>

<html>

<head>

 <meta http-equiv=Content-Type content='text/html; charset=utf-8' />
	<script src="../ressources/jquery.min.js"></script>
	<script>
					function nospaces(t){
			if(t.value.match(/\s/g)){
				t.value=t.value.replace(/\s/g,'');
			}
		}
		
		if (!$("link[href='../ressources/css/bootstrap.min.css']").length)
			$('<link href="../ressources/css/bootstrap.min.css" rel="stylesheet">').appendTo("head");
		if (!$("link[href='../ressources/css/portfolio-item.css']").length)
			$('<link href="../ressources/css/portfolio-item.css" rel="stylesheet">').appendTo("head");

	</script>
	<style>
		.monter{
			display: none;
		}
	</style>
	<script language="JavaScript">
 
 function OnlyNumber(e) { 
// if aEvent is null, means the Internet Explorer event model, so get window.event. 
var IE5 = false; 
if (!e) var e = window.event; 
if (e.keyCode) { IE5= true; code = e.keyCode;} 
else if (e.which) code = e.which ; 
//test du code 
if ((code < 48 || code > 57 )&& code != 188  && code != 110   && code != 8 
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




<body bgcolor="<?php echo $bg_color ?>" > 
<div align="center">
<p align="center" style="margin-top: 0; margin-bottom: 0">
&nbsp;</p>




	<b><font face="Tahoma" size="4" color="#4476C1">Ajout d'encadrant</font></b><p style="margin-top: 0; margin-bottom: 0" align="center">
	&nbsp;</p>

<table width="820" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">
	<tr>
		<td style="border-style:none; border-width:medium; " class="bg-info">
		<p align="center"><font size="2" color="#4476C1"><b><a target="_self" href="mean.php">
		<font color="#4476C1">Accueil</font></a></b></font></td>
	</tr>
</table>

<br>

</div>

<form method="post" action="prof_register.php" name="formulaire">

<div align="center">
		
			<br>
			<table class="table table-responsive"  style="border-width:0px; font-family:Tahoma; font-size:10pt">
			
			<tr>
		<td colspan="6" style="border-style:none; border-width:medium; " >
		<p align="center"><font size="2" color="#4476C1"><b>
		<font color="#4476C1">Coordonnées</font></b></font></td>
	</tr>


			<tr class="btn-success">
				<td align="center" >
				<font size="2"><b>Nom</b></font></td>
				
				<td align="center"  >
				<font size="2"><b>Prénom</b></font></td>

				<td align="center" >
				<font size="2"><b>GSM</b></font></td>

				<td align="center" >
				<font size="2"><b>Email</b></font></td>
				<td align="center" >
					<font size="2"><b>Login</b></font></td>
				<td align="center" >
					<font size="2"><b>Password</b></font></td>
				
			</tr>

			<tr>
				<td width="100px" style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0"><b><font face="Arial">
				<input name="nom" required  maxlength="32"  size="25"
				  onkeypress="javascript:this.value=this.value.toUpperCase();" 
				   onmouseup ="javascript:this.value=this.value.toUpperCase();"
				   onchange="javascript:this.value=this.value.toUpperCase();"  
				   onkeyup="nospaces(this);"
				   ></font></b></td>
				<td width="100px" style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0"><b>
				<font face="Arial"><input name="prenom" required maxlength="32" size="25" onkeyup="nospaces(this)" ></font></b></td>
				   				<td width="100px" style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
				<b><font face="Arial"><input name="GSM" size="18"  maxlength="18" onkeypress=OnlyNumber(event) ></font></b></td>
				<td width="180px" style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
				<input name="email" type="email" required  maxlength="42"   style="width: 224px">
				</td>
				<td  width="180px" style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
					<input name="login" type="text" required maxlength="42" size="20" onkeyup="nospaces(this);" style="width: 200px">
				</td>
				<td width="180px" style="border-style:none; border-width:medium; height: 26px;" bgcolor="#F4F4F0">
					<input name="password" type="password" required maxlength="42" size="20" style="width: 150px">
				</td>
			</tr>

			</table>
			<br>

		<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
		<table width="820" height="38">
			<tr>
				<td align="center" >
				
				<p align="center" style="margin-top: 0; margin-bottom: 0">
				<font face="Arial">
				<input class="btn btn-danger" type="submit" name="submit" value="Ajouter l'encadrant" onClick="validerForm(this.form)" style="font-family: Arial; font-size: 10pt; font-weight:bold" /></font>
					<input class="btn btn-warning" type="reset" value="Reset" />
				</td>
			</tr>
		</table>
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		
	
		</div>
		</form>
		<p>&nbsp;</p>
<hr>
<!-- Footer -->
<footer>
	<?php include_once ("footer.php");?>
</footer>
</body>
</html>
