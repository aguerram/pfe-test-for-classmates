<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 11/03/2016
 * Time: 14:18
 */
if(!isset($_SESSION)){
    session_start();
}
if( !isset($_SESSION['user']) or $_SESSION['user']!="admin" ) {
    header('Location:interdit.php');
}
else{

    include_once('../ressources/functions.php');
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $count=0;
    $numero=0;

if(isset($_POST['modify_attribution'])) {
    foreach ($_POST as $key => $element)
    {
        update_encadrant($key,htmlspecialchars($element));
    }
    $req=$bdd->query("SELECT * FROM ensas_pfe WHERE valide='1' ORDER BY filiere ");
    $count = $req->rowCount();
    $numero=0;

}
    else if(isset($_POST['selected_choice']) and isset($_POST['selected_ordre']) ) {

        $ordre=$_POST['selected_ordre'];
        switch ($_POST['selected_choice']) {

            case 1:
                $req = $bdd->query("SELECT * FROM ensas_pfe WHERE  valide='1' ORDER BY  " . $ordre."");
                $count = $req->rowCount();
                break;
            case 2:
                $req = $bdd->query("SELECT * FROM ensas_pfe WHERE filiere='F'AND valide='1' ORDER BY " . $ordre);
                $count = $req->rowCount();
                break;
            case 3:
                $req = $bdd->query("SELECT * FROM ensas_pfe WHERE filiere='T' AND valide='1' ORDER BY " . $ordre);
                $count = $req->rowCount();
                break;
            case 4:
                $req = $bdd->query("SELECT * FROM ensas_pfe  WHERE preembauche='oui'AND valide='1'  ORDER BY " . $ordre);
                $count = $req->rowCount();
                break;
            case 5:
                $req = $bdd->query("SELECT * FROM ensas_pfe  WHERE preembauche='non' AND valide='1' ORDER BY " . $ordre);
                $count = $req->rowCount();
                break;
        }

    }else{
        $req=$bdd->query("SELECT * FROM ensas_pfe WHERE valide='1' ORDER BY filiere ");
        $count = $req->rowCount();
        $numero=0;
    }



}
include_once('../ressources/functions.php');
$etat_attribution=get_option_value('prof_attrib_valide');

?>
        <table class="table table-responsive table-bordered " >
            <tr class="bg-info"><th> N° </th><th> Matricule </th><th> Membres </th><th> Encadrant </th><th> Sujet </th></tr>
            <?php
            while($donnees=$req->fetch()){
                $numero++;
                $matr = $donnees['filiere']."-".$donnees['groupe'];
                ?>
                <tr>
                    <td><?php echo $numero;?></td>
                    <td><?php echo $matr; ?></td>
                    <td><?php if($donnees['nom1']){ echo $donnees['nom1'] . "&nbsp;" . $donnees['prenom1'] . "&nbsp;" ;  }?>
                        <?php if($donnees['nom2']){ echo "<br>".$donnees['nom2'] . "&nbsp;" . $donnees['prenom2'] . "&nbsp;" ;  }?>
                        <?php if($donnees['nom3']){ echo "<br>".$donnees['nom3'] . "&nbsp;" . $donnees['prenom3'] . "&nbsp;" ;  }?>
                    </td>
                    <td><select name="<?php echo $donnees['groupe'] ;?>">
                            <option value="null"> </option>
                            <?php
                            $liste_profs=$bdd->query("SELECT * FROM ensas_pfe_profs ORDER BY nom ");
                            while($prof=$liste_profs->fetch()){
                                ?>
                                <option value="<?php echo $prof['nom'];?>" <?php if($prof['nom']== $donnees['encadrant'] ) {echo "SELECTED";} ?>><?php echo $prof['nom']; ?></option>
                            <?php } ?>
                        </select> </td>
                    <td><?php echo $donnees['sujet']; ?></td>
                </tr>
            <?php } ?>
</table>

