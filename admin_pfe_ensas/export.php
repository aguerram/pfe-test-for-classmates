<?php 

session_start();
$filiere= $_GET['filiere'] ;
if( isset($_SESSION['user']) AND isset($_SESSION['pass']) )
{
include '../db_connect.php';
switch ($filiere) {
case 'F':
$filiere_txt = 'Génie Informatique';
break;

case 'T':
$filiere_txt = 'Génie Télécom & R.';
break;
}

$select0 = "SELECT * FROM " . $table_pfe . " WHERE valide='1' AND `filiere`='" . $filiere . "' ORDER BY encadrant "  ;
$result0 = mysqli_query($con,$select0) or die ('Erreur : '.mysqli_error($con) );
$total = mysqli_num_rows($result0);


//echo $total ;
$var=0;
while($row = mysqli_fetch_array($result0)) {

if($row['nom1']) {


$username[$var]	 =	($row['username']);
$groupe[$var]	 =	($row['groupe']);
$encadrant[$var]	 =	($row['encadrant']);
$filiere2[$var]	 =	($row['filiere']);
$sujet[$var]	 =	($row['sujet']);
$groupe_label[$var] = $filiere2[$var] . '-' . $groupe[$var] ;
$note[$var]	 = ($row['note']);
//$note[$var] = str_replace(',', '.', $note[$var]);
$nom[$var]	 =	($row['nom1']);
$prenom[$var]	 =	($row['prenom1']);

}


if($row['nom2']) {

$var=$var+1;

$username[$var]	 =	($row['username']);
$groupe[$var]	 =	($row['groupe']);
$encadrant[$var]	 =	($row['encadrant']);
$filiere2[$var]	 =	($row['filiere']);
$sujet[$var]	 =	($row['sujet']);
$groupe_label[$var] = $filiere2[$var] . '-' . $groupe[$var] ;
$note[$var]	 = ($row['note']);
//$note[$var] = str_replace(',', '.', $note[$var]);
$nom[$var]	 =	($row['nom2']);
$prenom[$var]	 =	($row['prenom2']);
}



if($row['nom3']) {

$var=$var+1;

$username[$var]	 =	($row['username']);
$groupe[$var]	 =	($row['groupe']);
$encadrant[$var]	 =	($row['encadrant']);
$filiere2[$var]	 =	($row['filiere']);
$sujet[$var]	 =	($row['sujet']);
$groupe_label[$var] = $filiere2[$var] . '-' . $groupe[$var] ;
$note[$var]	 = ($row['note']);
//$note[$var] = str_replace(',', '.', $note[$var]);
$nom[$var]	 =	($row['nom3']);
$prenom[$var]	 =	($row['prenom3']);

}

$var=$var+1;
}


//array_multisort($nom, $prenom, $encadrant, $sujet, $note, $groupe_label);


//echo $var ;
?>





<div class="col-md-12" align="center">

<p align="center"><font style="font-family:Arial" size="3">Filière : </font><font style="font-family:Arial" size="3"><b><?php echo $filiere_txt; ?></b></font></p>
<br>

<input class="btn btn-info" type="submit" value="Télécharger le Fichier Excel" onclick="location.href='<?php echo $filiere; ?>.csv'" >

<br><br>
<table  id="myTable" class="table table-responsive table-bordered"  >
<tr align="center" class="bg-success"  >
  <th class="sortable-numeric" style="height: 15px" >N°</th>
  <th class="sortable-text" style="height: 15px" >Grp&nbsp;</th>
  <th  class="sortable-text" style="height: 15px">Nom</th>
  <th  class="sortable-text" style="height: 15px">Prénom</th>
  <th class="sortable-text" style="height: 15px">Encadrant</th>
  <th class="sortable-text" style="height: 15px">Sujet</th>
  <th class="sortable-text" style="height: 15px" >Note</th>
  
  </tr>


<?php
for($v=0;$v < $var;$v++) 
  { 
?>


<tr >
  <td ><?php echo $v+1; ?></td>
  <td >  <font color="#000000"><?php echo $groupe_label[$v]; ?></font>  </td>
  <td  > <font color="#000000"> <?php echo $nom[$v] ; ?> </font> </td>
  <td > <font color="#000000"> <?php echo $prenom[$v] ; ?> </font> </td>

  <td>   <font color="#000000"><?php echo $encadrant[$v]; ?></font>  </td>
  <td>   <font color="#000000"> <?php echo $sujet[$v]; ?>  </font>    </td>
  
  <td  >   <font color="#000000"><b><?php echo $note[$v]; ?></b>&nbsp;</font>  </td>
		
</tr>
	

<?php

}


?>

</table>
<br>

<input class="btn btn-info" type="submit" value="Télécharger le Fichier Excel" onclick="location.href='<?php echo $filiere; ?>.csv'" >

</div>





<?php

} //session
else
{
  header('Location:interdit.php');
}
?>



