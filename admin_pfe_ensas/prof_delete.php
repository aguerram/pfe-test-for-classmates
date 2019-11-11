<?php
session_start();


if( isset($_SESSION['user']) AND isset($_SESSION['pass']) )
{


include "../db_connect.php";

$name	= protect($_GET['nom']);



$sql="SELECT * from `" . $table_profs . "` WHERE `nom`='". $name ."' ";
$res1=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_assoc($res1);



if(mysql_num_rows($res1) != 1)
{
echo '<script type="text/javascript">
	alert("Encadrant non existant  ");
	self.close()	
	</script>';

	
}
else
{


//$sql = "REPLACE INTO 3a_trash SELECT * FROM 3a_inscription WHERE CIN = '" . $CIN . "'"; 
//$query = mysql_query($sql) or die(mysql_error());

$sql2="DELETE FROM " . $table_profs . " WHERE nom = '" . $name . "'";
mysql_query($sql2) or die(mysql_error());





echo '<script type="text/javascript">
	window.location="javascript:history.go(-1)"	
	</script>';


}
?>

<html>
<head>
<meta http-equiv=Content-Type content='text/html; charset=utf-8' />

</head>

<body bgcolor='<?php echo $bg_color; ?>'>
<div align=center>
<p align="center" style="margin-top: 0; margin-bottom: 0">
</p>
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="margin-top: 0; margin-bottom: 0">
<font face="Tahoma" size="4">Encadrant supprimé avec succès !</font></p>
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="margin-top: 0; margin-bottom: 0">
<font face="Tahoma" size="4">Prof.&nbsp; <b> &nbsp;<?php echo $name ; ?></b></font></p>
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="margin-top: 0; margin-bottom: 0">
<font face="Arial">
<input type='button' value='           OK          ' onClick="location.href='prof_liste.php'"  name='button'> 

</font>
</div>
		  <p>&nbsp;</p><p align='center'><font face='Arial' size='1'><?php echo $copyright ;?></font></p>

</body>
</html>






<?php

} //session
else
{
echo "Accés non authorisé!";
}
?>






