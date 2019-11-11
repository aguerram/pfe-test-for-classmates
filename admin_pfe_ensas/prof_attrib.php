<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 11/03/2016
 * Time: 14:11
 */
session_start();
if(!isset($_SESSION['user']) or $_SESSION['user']!="admin"){
    header('Location:interdit.php');
}
?>

<div>
    <p style="text-align: center;font-family: 'Lucida Fax';font-size: large"><span class="glyphicon glyphicon-bookmark"></span> Attribution des encadrants
    </p>
    <hr class="new_hr">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4 col-md-offset-3">
                <select id="select_filiere" name="select_filiere" class="form-control ">
                    <optgroup label=" Liste à afficher "> </optgroup>
                    <option value="1"  selected>Toutes les filières</option>
                    <option value="2">Filière G-Info</option>
                    <option value="3">Filière GTR</option>
                    <option value="4">Avec Pré-Embauche</option>
                    <option value="5">Sans Pré-Embauche</option>
                </select>
            </div>

            <div class="col-md-3">
                <select id="select_ordre" name="select_ordre" class="form-control">
                    <optgroup label=" Trier Par "> </optgroup>
                    <option value="filiere" selected >Filière</option>
                    <option value="encadrant">Encadrant</option>
                    <option value="groupe">Matricule</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row"><br>
        <div class="col-lg-12" id='loading_message' style='display:none;text-align: center'><p><img src="../ressources/img/loader.gif"> Envoie en cours  ...</p>
        </div>
        <div class="row">
            <div class="col-md-12 " >

<div class="col-md-12">
<form  action="generate_prof_attrib.php" id="prof_attrib_form" >
        <input type="hidden" name="modify_attribution" value="modify_attribution">
    <p id="etat_modifications" style="display:none;text-align: center;font-family: 'Lucida Fax'"><img src="../ressources/img/ok.png"> Les modifications sont enregistrés</p>


    <!-- <p id="etat_attrib" style="text-align: center;font-family: 'Lucida Fax'" >
        <?php if($etat_attribution!="valide"){ ?> <img  src="../ressources/img/erreur.png"/> Les attributions ne sont pas encore validés <?php
        }else{ ?>
            <img id='etat_attrib' src='../ressources/img/ok.png'/> Les attributions  sont  validés
        <?php } ?></p> -->
    <p id="etat_modifications" style="display: none;text-align: center;font-family: 'Lucida Fax'"><img src="../ressources/img/ok.png"> Les modifications sont enregistrés</p>

    <!-- <p style="text-align:center;font-size: large;font-family:'Times New Roman' "><?php echo "<strong><span style='color: red'>".$count."</span></strong>";?> PFE Trouvés</p> -->
    <p align="center">

        <input type="submit"  class="btn btn-success" name="submit_prof_pfe_ensas" id="submit_prof_pfe_ensas_1"  value="Enregistrer les modifications" />
        
        <!-- <?php if($etat_attribution=="valide"){ ?>
            <button  type="button" class="btn btn-danger" id="valider_attribution"  >Annuler les attributions</button>
        <?php }
        else{ ?>
            <button  type="button" class="btn btn-danger" id="valider_attribution"  >Valider les attributions</button>
        <?php } ?> -->
    </p>
    <div class="col-md-12 " >

             <div id="list_pfe_content">
                <?php include "generate_prof_attrib.php" ; ?>
            </div>

    </div>
</form>
</div>

            </div>
        </div>
</div>

<script data-cfasync="false">


$(document).ready(function() {

        var url="generate_prof_attrib.php";

        $("#valider_attribution").click(function (event) {
            if($(this).text()=="Valider les attributions"){
                $(this).text('Annuler les attributions');
                $.post( "annuler_valider_attribution.php", { attribution: "valide" } );
                $('#etat_attrib').html(" <img id='etat_attrib' src='../ressources/img/ok.png'/> Les attributions  sont  validés");
            }else{
                $(this).text('Valider les attributions');
                $.post( "annuler_valider_attribution.php", { attribution: "non_valide" } );
                $('#etat_attrib').html(" <img id='etat_attrib' src='../ressources/img/erreur.png'/> Les attributions ne sont pas validés");

            }
        });

        $("#prof_attrib_form").submit(function( ev ){
            
             ev = ev || window.event;
              if (ev.preventDefault) ev.preventDefault();
              ev.returnValue = false; // for old IE

                 $.ajax({
                    type    : "POST",
                    url : "generate_prof_attrib.php",
                    data    : $("#prof_attrib_form").serialize(),
                    datatype : 'html',
                    success: function(data) {
                        $('#list_pfe_content').html(data);
                        $('#etat_modifications').show();
                        $("#etat_modifications").delay(3200).fadeOut(300);
                    }
                });
          });

            $("#select_filiere").change(function(){
                var select_filiere=$('#select_filiere').val(),
                    select_order=$('#select_ordre').val(),
                    posting = $.post( url, { selected_choice: select_filiere,selected_ordre:select_order });
                posting.done(function( data ) {
                    $('#list_pfe_content').html(data);
                });
            });

            $("#select_ordre").change(function(){
                var select_filiere=$('#select_filiere').val(),
                    select_order=$('#select_ordre').val(),
                    posting = $.post( url, { selected_choice: select_filiere,selected_ordre: select_order});
                posting.done(function( data ) {
                    $('#loading_message').hide();
                    $('#list_pfe_content').html(data);
                });
            });

    });
</script>
  