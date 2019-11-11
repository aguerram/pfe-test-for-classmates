<?php
session_start();


if( isset($_SESSION['user']) AND isset($_SESSION['pass']) )
{


include "../db_connect.php";

$username	= protect($_GET['username']);





$sql="SELECT * from `" . $table_pfe . "` WHERE `username`='". $username ."' ";
$res1=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_assoc($res1);



if(mysql_num_rows($res1) != 1)
{
echo '<script type="text/javascript">
	alert("Groupe non existant  ");
	self.close()	
	</script>';

	
}
else
{


$sql2="DELETE FROM " . $table_pfe . " WHERE username = '" . $username . "'";
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
&nbsp;</p>
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="margin-top: 0; margin-bottom: 0">
<font face="Tahoma" size="4">Groupe supprimé avec succès !</font></p>
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="margin-top: 0; margin-bottom: 0">
<font face="Tahoma" size="4">user <b> : <?php echo $username ; ?> 
</b></font></p>
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="margin-top: 0; margin-bottom: 0">
<font face="Arial">
<input type='button' value='           OK          ' onClick="location.href='recherche.php'"  name='button'> 

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






