
<?php

include "db_connect.php";



$select1 = "SELECT * FROM " . $table_pfe . " WHERE filiere = 'F' ORDER BY groupe";
$result1 = mysql_query($select1,$con) or die ('Erreur : '.mysql_error() );
$total1 = mysql_num_rows($result1);


$select2 = "SELECT * FROM " . $table_pfe . " WHERE filiere = 'T' ORDER BY groupe " ;
$result2 = mysql_query($select2,$con) or die ('Erreur : '.mysql_error() );
$total2 = mysql_num_rows($result2);




?>


<html>
<head>

<meta http-equiv=Content-Type content='text/html; charset=utf-8' />




</head>

<body bgcolor= <?php echo $bg_color; ?> lang=FR>

<div align=center >

<div >
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>


<br>



</div>



<table visible="false" width="900" bgcolor="#FFFFFF" style=" border-width:0px; font-family:Tahoma; font-size:10pt">
<tr>

<td width="445" align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#D0A375">
				<font size="2"><b>Génie Informatique</b></font></td>

<td width="445" align="center" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#D0A375">
				<font size="2"><b>Génie Télécom et Réseaux</b></font></td>

</tr>



<tr>

<td width="420" valign="top" >

<table width="445" bordercolor='#6699FF' style="border-collapse: collapse; font-family: Arial; font-size: 10px" border="1"  bgcolor="#FFFFFF"   >
<tr align="center" bgcolor="#FFFF99" style="font-weight: bold" >
  <td width="20">N°</td>  <td width="28">Matr</td>  <td>Membres</td> <td width="70">Encadrant<br>
	interne</td> <td>---------Sujet et ville---------</td> </tr>

<?php
$var1 = 1;
while($row1 = mysql_fetch_array($result1)) {


$username	 =	($row1['username']);
$filiere	 =	($row1['filiere']);
$groupe	 =	($row1['groupe']);
$groupe_label = $filiere . '-' . $groupe ;
$filename = $groupe_label . "-" . $username . ".pdf" ;
$target_path = "rapports/" . $filename ;

?>
<tr <?php if(file_exists($target_path)) {echo" bgcolor= #CCFFCC ";} ?> >
  
  <td width="20"><?php echo $var1; ?></td>
  <td width="28"><?php echo $row1['filiere']; ?>-<?php echo $row1['groupe']; ?></td>
  <td>&nbsp;<?php echo $row1['nom1']; ?>&nbsp;<?php echo $row1['prenom1']; ?>
  
    <?php if($row1['nom2']) {echo" <br>&nbsp;" . $row1['nom2'] . "&nbsp;" . $row1['prenom2'] ;} ?>
    <?php if($row1['nom3']) {echo" <br>&nbsp;" . $row1['nom3'] . "&nbsp;" . $row1['prenom3'] ;} ?>

  </td>
  
    <td width="70">&nbsp;<?php echo $row1['encadrant']; ?></td>
    <td>&nbsp;<?php echo $row1['sujet']; ?>&nbsp;&nbsp;<b><font color="blue"><?php if($row1['ville']) { echo '[' . $row1['ville'] . ']';} ?></font></b>
    
    
    </td>

  
</tr>

<?php 
$var1=$var1+1; 
}
?>	

</table>


</td>



<td width="420" valign="top" >

<table width="445" bordercolor='#6699FF' style="border-collapse: collapse; font-family: Arial; font-size: 10px" border="1"  bgcolor="#FFFFFF"   >
<tr align="center" bgcolor="#FFFF99" style="font-weight: bold" >
  <td width="20">N°</td>  <td width="28">Matr</td>  <td>Membres</td> <td width="70">Encadrant<br> 
	interne</td> 
	<td >---------Sujet et ville---------</td> </tr>

<?php
$var2 = 1;
while($row2 = mysql_fetch_array($result2)) {


$username	 =	($row2['username']);
$filiere	 =	($row2['filiere']);
$groupe	 =	($row2['groupe']);
$groupe_label = $filiere . '-' . $groupe ;
$filename = $groupe_label . "-" . $username . ".pdf" ;
$target_path = "rapports/" . $filename ;

?>
<tr <?php if(file_exists($target_path)) {echo" bgcolor= #CCFFCC ";} ?> >


  <td  width="20"><?php echo $var2; ?></td>
  <td width="28" ><?php echo $row2['filiere']; ?>-<?php echo $row2['groupe']; ?></td>


  <td style="height: 15px">&nbsp;<?php echo $row2['nom1']; ?>&nbsp;<?php echo $row2['prenom1']; ?>
  
    <?php if($row2['nom2']) {echo" <br>&nbsp;" . $row2['nom2'] . "&nbsp;" . $row2['prenom2'] ;} ?>
    <?php if($row2['nom3']) {echo" <br>&nbsp;" . $row2['nom3'] . "&nbsp;" . $row2['prenom3'] ;} ?>

  </td>


      <td width="70" style="height: 15px">&nbsp;<?php echo $row2['encadrant']; ?></td>
    <td>&nbsp;<?php echo $row2['sujet']; ?>&nbsp;&nbsp;<b><font color="blue"><?php if($row2['ville']) { echo '[' . $row2['ville'] . ']';} ?></font></b>


</tr>

<?php 
$var2=$var2+1; 
}
?>	

</table>


</td>






</tr>
</table>
<br>

<p align="center"><font face="Arial" size="2">Remarque : Les Groupes teintés en vert ont enregistré leurs rapports 
d'avancement de projet</font></p>

<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><font face="Arial" size="1"> <?php echo $copyright; ?> </font></p>



</div>


</body>
</html>


