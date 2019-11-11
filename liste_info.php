<?php
require_once('ressources/functions.php');
$query_info=liste_pfe("F");
$attribution_valide=is_attribution_activated();
?>
<div class="col-md-12">

<br>

<p align="center"><span class="remarque"></span> 

<table   class="table table-responsive table-bordered table-condensed">
    <tr  class="bg-info"  style="font-family: Calibri"><td colspan="6" style="text-align: center"><h4>Génie Informatique</h4></td></tr>
    <tr style="background-color:#f4f3f5;text-align: center;font-family: Calibri" ><td>N&nbsp;°</td><td> Matr&nbsp;</td><td>Membres</td>
        <td> Encadrant Interne</td><td>Sujet et ville</td><td>Rapport</td></tr><?php
$i=1;
while($data=$query_info->fetch()){
    if($data['valide']=='1'){
        $matricul = $data['filiere'] . '-' .$data['groupe'] ;
        $filename = $matricul . "-" . $data['username'] . ".pdf" ;
        $target_path = "rapports/" . $filename ;
    ?>
    <tr  style="font-size: small;"><td><?php echo $i++;?></td><td><?php echo $data['filiere']."-".$data['groupe'];?></td>
        <td><?php
            if($data['nom1'] & $data['prenom1']){echo $data['nom1']."&nbsp;".$data['prenom1'];}
            if($data['nom2'] & $data['prenom2']){echo "<br>".$data['nom2']."&nbsp;".$data['prenom2'];}
            if($data['nom3'] & $data['prenom2']){echo "<br>".$data['nom3']."&nbsp;".$data['prenom3'];}?>
        </td>
        <td><?php
            if($attribution_valide=='valide'){ echo $data['encadrant']; }
            else{
                echo "<img src='ressources/img/wait.png'>&nbsp;En&nbsp;Cours";
            }
            ?></td>
        <td><?php echo $data['sujet']."&nbsp;<i><u>[".$data['ville']."]</i></u>";?></td>
        <td style="text-align:center"><?php if(file_exists($target_path)) {echo"<img src='ressources/img/ok.png'>";}else{echo"&nbsp;<img src='ressources/img/wait.png'>";} ?></td>
    </tr>

<?php } } ?>
</table>
</div>