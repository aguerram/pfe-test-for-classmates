<?php
session_start();


if( isset($_SESSION['user']) AND isset($_SESSION['pass']) )
{

include '../db_connect.php';
?>


<html>
<head>
</head>
<body >

<p align="center" style="margin-top: 0; margin-bottom: 0">
&nbsp;</p>



<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
<font face="Tahoma" size="4" color="#4476C1">Saisi des notes</font></b></p>

<br>

<?php 



$select0 = 'SELECT * FROM ' . $table_profs . '  ORDER BY nom' ;
$result0 = mysqli_query($con,$select0) or die ('Erreur : '.mysqli_error($con) );


?>

<head>
<meta http-equiv=Content-Type content='text/html; charset=utf-8' /> 

<style type="text/css">
a.infobulle em {display:none;}
a.infobulle:hover { border: 0;position: relative;z-index: 500;text-decoration:none;}
a.infobulle:hover em { font-style: normal;display: block;position: absolute;top: 20px;left: -10px;
padding: 5px;color: #000;border: 1px solid #bbb;background: #ffc; }
</style>

<script type="text/javascript" src="tablesort.js"></script>

<script type="text/javascript">
function CreateExcelSheet()
{
   var x=myTable.rows
   var xls = new ActiveXObject("Excel.Application")
   xls.visible = true
   xls.Workbooks.Add
      for (i = 0; i < x.length; i++)
      {
         var y = x[i].cells
         for (j = 0; j < y.length; j++)
         {
            xls.Cells( i+1, j+1).Value = y[j].innerText
         }
      }

}
</script>


</head>

<p align="center"><font face="Arial" size="2"><strong>Remarque :</strong> Aprés l'attribution des Encadrants , Les
        encadrants teintés en vert ont introduit toutes leurs notes</font></p>


<div align="center" class="col-md-5 col-md-offset-4">
    <table id="myTable"   class="table table-borderedtable-responsive "  >
<tr align="center" class="bg-success" >
  <th  >N°</th>
  <th >Encadrant</th>
  </tr>
<?php

$var = 0;
while($row = mysqli_fetch_array($result0)) {

$nom	 =	($row['nom']);
$prenom	 =	($row['prenom']);
$email	 =	($row['email']);
$GSM	 =	($row['GSM']);
$jury	 =	($row['jury']);
$salle	 =	($row['salle']);



$sql0="SELECT * from `" . $table_pfe . "` WHERE  INSTR( encadrant  , '" .$nom. "') " ;
$res0=mysqli_query($con,$sql0) or die(mysqli_error($con));
$FF0 = mysqli_num_rows($res0) ;



$sql1="SELECT * from `" . $table_pfe . "` WHERE note AND  INSTR( encadrant  , '" .$nom. "') " ;
$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
$FF1 = mysqli_num_rows($res1) ;




?>

<tr <?php if($FF0 ==$FF1){ echo "bgcolor='#99FFCC' ";} ?> >

  <td ><?php echo $var+1; ?></td>
  
  

  <td >   <font color="#000000"><?php echo $nom . ' ' . $prenom; ?></font>  </td>


  <td >
<a target="_blank" href="notes.php?encadrant=<?php echo $nom; ?>"><button style="width: auto" class="btn btn-danger"> Notes </button></a>
  </td>


</tr>
		





<?php 

$var=$var+1;


}//Boucle mysql



?>	





</table>




</div>		
</body>
</html>





<?php

} //session
else
{
    header('Location:interdit.php');
}
?>







