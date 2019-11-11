<?php
session_start();


if( isset($_SESSION['user']) AND isset($_SESSION['pass']) )
{


?>




<html>
<head>
<title>MiniProjets - Attribution</title>


</head>
<body bgcolor='#D0A080'>


<p align="center" style="margin-top: 0; margin-bottom: 0">
<img border="0" src="../images/entete.jpg" ></p>
<p align='center' style='margin-top: 0; margin-bottom: 0'><b>
<font size='4' face='Tahoma' color='#000080'>Gestion des Mini-Projets</font></b></p>
<p align='center' style='border-width:0px; font-family:Tahoma; font-size:10pt;margin-top: 0;'>
<strong>Département Informatique, Réseaux &amp; Télécommunications</strong></p>



<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
<font face="Tahoma" size="4" color="#4476C1">Initialisation des encadrants</font></b></p>

<br>

<?php 
include '../db_connect.php';


//initialiser les encadrants de tous les groupes
$sql0 = "UPDATE miniprojets SET `encadrant`='' , `email_encadrant`='' ";
$query = mysql_query($sql0) or die(mysql_error());












$select1 = "SELECT * FROM miniprojets WHERE filiere = '3F' ORDER BY groupe " ;
$result1 = mysql_query($select1,$con) or die ('Erreur : '.mysql_error() );
$total1 = mysql_num_rows($result1);


$select2 = "SELECT * FROM miniprojets WHERE filiere = '4F' ORDER BY groupe " ;
$result2 = mysql_query($select2,$con) or die ('Erreur : '.mysql_error() );
$total2 = mysql_num_rows($result2);


$select3 = "SELECT * FROM miniprojets WHERE filiere = '3T' ORDER BY groupe " ;
$result3 = mysql_query($select3,$con) or die ('Erreur : '.mysql_error() );
$total3 = mysql_num_rows($result3);


$select4 = "SELECT * FROM miniprojets WHERE filiere = '4T' ORDER BY groupe " ;
$result4 = mysql_query($select4,$con) or die ('Erreur : '.mysql_error() );
$total4 = mysql_num_rows($result4);










?>



<div align=center >


<table visible="false" width="1000" bgcolor="#FFFFFF" style=" border-width:0px; font-family:Tahoma; font-size:10pt">
<tr>

<td width="220" align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#D0A375">
				<font size="2"><b>3ème Année G.Info</b></font></td>

<td width="220" align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#D0A375">
				<font size="2"><b>4ème Année G.Info</b></font></td>

<td width="220" align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#D0A375">
				<font size="2"><b>3ème Année G.T.R</b></font></td>

<td width="220" align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#D0A375">
				<font size="2"><b>4ème Année G.T.R</b></font></td>

</tr>



<tr>

<td width="220" valign="top" >

<table width="100%" bordercolor='#6699FF' style="border-collapse: collapse; font-family: Arial; font-size: 10px" border="1"  bgcolor="#FFFFFF"   >
<tr align="center" bgcolor="#FFFF99" style="font-weight: bold" >
  <td>N°</td>  <td>Matr</td>  <td>Membres</td> <td>Encadrant</td> </tr>

<?php
$var1 = 1;
while($row1 = mysql_fetch_array($result1)) {
?>


<tr >
  <td>&nbsp;<?php echo $var1; ?></td>
  <td>&nbsp;<?php echo $row1['filiere']; ?>-<?php echo $row1['groupe']; ?></td>
  <td>&nbsp;<?php echo $row1['nom1']; ?>&nbsp;<?php echo $row1['prenom1']; ?><br>
  &nbsp;<?php echo $row1['nom2']; ?>&nbsp;<?php echo $row1['prenom2']; ?><br>
  &nbsp;<?php echo $row1['nom3']; ?>&nbsp;<?php echo $row1['prenom3']; ?><br>
  &nbsp;<?php echo $row1['nom4']; ?>&nbsp;<?php echo $row1['prenom4']; ?>  </td>
  
    <td>&nbsp;<?php echo $row1['encadrant']; ?></td>

  
</tr>

<?php 
$var1=$var1+1; 
}
?>	

</table>


</td>



<td width="220" valign="top" >

<table width="100%" bordercolor='#6699FF' style="border-collapse: collapse; font-family: Arial; font-size: 10px" border="1"  bgcolor="#FFFFFF"   >
<tr align="center" bgcolor="#FFFF99" style="font-weight: bold" >
  <td>N°</td>  <td>Matr</td>  <td>Membres</td> <td>Encadrant</td> </tr>

<?php
$var2 = 1;
while($row2 = mysql_fetch_array($result2)) {
?>


<tr >
  <td>&nbsp;<?php echo $var2; ?></td>
  <td>&nbsp;<?php echo $row2['filiere']; ?>-<?php echo $row2['groupe']; ?></td>
  <td>&nbsp;<?php echo $row2['nom1']; ?>&nbsp;<?php echo $row2['prenom1']; ?><br>
  &nbsp;<?php echo $row2['nom2']; ?>&nbsp;<?php echo $row2['prenom2']; ?><br>
  &nbsp;<?php echo $row2['nom3']; ?>&nbsp;<?php echo $row2['prenom3']; ?><br>
  &nbsp;<?php echo $row2['nom4']; ?>&nbsp;<?php echo $row2['prenom4']; ?>  </td>
      <td>&nbsp;<?php echo $row2['encadrant']; ?></td>

</tr>

<?php 
$var2=$var2+1; 
}
?>	

</table>


</td>



<td width="220" valign="top" >

<table width="100%" bordercolor='#6699FF' style="border-collapse: collapse; font-family: Arial; font-size: 10px" border="1"  bgcolor="#FFFFFF"   >
<tr align="center" bgcolor="#FFFF99" style="font-weight: bold" >
  <td>N°</td>  <td>Matr</td>  <td>Membres</td> <td>Encadrant</td> </tr>

<?php
$var3 = 1;
while($row3 = mysql_fetch_array($result3)) {
?>


<tr >
  <td>&nbsp;<?php echo $var3; ?></td>
  <td>&nbsp;<?php echo $row3['filiere']; ?>-<?php echo $row3['groupe']; ?></td>
  <td>&nbsp;<?php echo $row3['nom1']; ?>&nbsp;<?php echo $row3['prenom1']; ?><br>
  &nbsp;<?php echo $row3['nom2']; ?>&nbsp;<?php echo $row3['prenom2']; ?><br>
  &nbsp;<?php echo $row3['nom3']; ?>&nbsp;<?php echo $row3['prenom3']; ?><br>
  &nbsp;<?php echo $row3['nom4']; ?>&nbsp;<?php echo $row3['prenom4']; ?>  </td>
      <td>&nbsp;<?php echo $row3['encadrant']; ?></td>

</tr>

<?php 
$var3=$var3+1; 
}
?>	

</table>


</td>



<td width="220" valign="top" >

<table width="100%" bordercolor='#6699FF' style="border-collapse: collapse; font-family: Arial; font-size: 10px" border="1"  bgcolor="#FFFFFF"   >
<tr align="center" bgcolor="#FFFF99" style="font-weight: bold" >
  <td>N°</td>  <td>Matr</td>  <td>Membres</td> <td>Encadrant</td> </tr>

<?php
$var4 = 1;
while($row4 = mysql_fetch_array($result4)) {
?>


<tr >
  <td>&nbsp;<?php echo $var4; ?></td>
  <td>&nbsp;<?php echo $row4['filiere']; ?>-<?php echo $row4['groupe']; ?></td>
  <td>&nbsp;<?php echo $row4['nom1']; ?>&nbsp;<?php echo $row4['prenom1']; ?><br>
  &nbsp;<?php echo $row4['nom2']; ?>&nbsp;<?php echo $row4['prenom2']; ?><br>
  &nbsp;<?php echo $row4['nom3']; ?>&nbsp;<?php echo $row4['prenom3']; ?><br>
  &nbsp;<?php echo $row4['nom4']; ?>&nbsp;<?php echo $row4['prenom4']; ?>  </td>
      <td>&nbsp;<?php echo $row4['encadrant']; ?></td>

</tr>

<?php 
$var4=$var4+1; 
}
?>	

</table>


</td>






</tr>





</table>





</div>		
</body>
</html>



<?php

} //session
else
{
echo "Accés non authorisé!";
}
?>



