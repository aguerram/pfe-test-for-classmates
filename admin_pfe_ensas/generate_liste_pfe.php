<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 10/03/2016
 * Time: 19:50
 */
include_once ('../ressources/db_connect_2.php');
$dataBase = new DataBase();
$bdd=$dataBase->connexionBdd();

if(isset($_POST['selected_choice']) and isset($_POST['selected_ordre']) ) {

    $ordre=$_POST['selected_ordre'];
    switch ($_POST['selected_choice']) {

        case 1:
            $req = $bdd->query("SELECT * FROM ensas_pfe WHERE  valide='1' ORDER BY  " . $ordre."");
            break;
        case 2:
            $req = $bdd->query("SELECT * FROM ensas_pfe WHERE filiere='F'AND valide='1' ORDER BY " . $ordre);
            break;
        case 3:
            $req = $bdd->query("SELECT * FROM ensas_pfe WHERE filiere='T' AND valide='1' ORDER BY " . $ordre);
            break;
        case 4:
            $req = $bdd->query("SELECT * FROM ensas_pfe  WHERE preembauche='oui'AND valide='1'  ORDER BY " . $ordre);
            break;
        case 5:
            $req = $bdd->query("SELECT * FROM ensas_pfe  WHERE preembauche='non' AND valide='1' ORDER BY " . $ordre);
            break;
    }

}else{
    $req = $bdd->query("SELECT * FROM ensas_pfe WHERE valide='1' ORDER BY filiere" );
}
?>
<div class="col-md-12" align="center">
    <table class="table table-bordered table-responsive" style="font-size: " >
        <tr class="bg-info" style="font-family: 'Times New Roman'">
            <th>Matr</th><th>Membres et Emails</th><th>Encadrant</th><th>Ville</th><th>Inscription</th><th>Consultation</th>
        </tr>
    <?php while($donnees=$req->fetch()){
             $username=$donnees['username'];
        ?>
        <tr>
            <td><?php echo $donnees['filiere']."-".$donnees['groupe']; ?></td>
            <td><?php if($donnees['nom1']){ echo $donnees['nom1'] . "&nbsp;" . $donnees['prenom1'] . "&nbsp;" ;  }?>
                <?php if($donnees['email1']){ echo "<br><em style='color:#2e6da4'>".$donnees['email1']."</em>" ;}?>
                <?php if($donnees['nom2']){ echo "<br>".$donnees['nom2'] . "&nbsp;" . $donnees['prenom2'] . "&nbsp;" ;  }?>
                <?php if($donnees['email2']){ echo "<br><em style='color:#2e6da4'>".$donnees['email2']."</em>" ;}?>
                <?php if($donnees['nom3']){ echo "<br>".$donnees['nom3'] . "&nbsp;" . $donnees['prenom3'] . "&nbsp;" ;  }?>
                <?php if($donnees['email3']){ echo "<br><em style='color:#2e6da4'>".$donnees['email3']."</em>" ;}?>
             </td>
             <td><?php echo $donnees['encadrant']; ?></td>


             <td><?php echo $donnees['ville']; ?></td>


            <td><?php echo $donnees['date']; ?></td>

            <td><?php echo $donnees['dateconsult']; ?></td>
        </tr>


    <?php } ?>
    </table>
</div>