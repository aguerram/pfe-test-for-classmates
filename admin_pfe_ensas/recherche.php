<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 10/03/2016
 * Time: 19:36
 */
session_start();
if(!isset($_SESSION['user'])){
    header('Location:interdit.php');
}
?>
<div class="col-md-10">
    <p style="text-align: center;font-family: 'Lucida Fax';font-size: large"><span class="glyphicon glyphicon-bookmark"></span> Liste des PFE </p>
    <hr class="new_hr">
    <div class="row ">
        <div class="col-md-12" align="center">
            <div class="col-md-4 col-md-offset-4" >
                <select id="select_filiere" name="select_filiere" class="form-control ">
                    <optgroup label=" Liste à afficher "> </optgroup>
                    <option value="1"  selected>Toutes les filières</option>
                    <option value="2">Filière G-Info</option>
                    <option value="3">Filière GTR</option>
                    <option value="4">Avec Pré-Embauche</option>
                    <option value="5">Sans Pré-Embauche</option>
                </select>
            </div>

            <div class="col-md-3" >
                <select id="select_ordre" name="select_ordre" class="form-control">
                    <optgroup label=" Trier Par "> </optgroup>
                    <option value="filiere" selected >Filière</option>
                    <option value="encadrant">Encadrant</option>
                    <option value="ville">Ville</option>
                    <option value="note">Note</option>
                    <option value="date">Date Inscription</option>
                </select>
            </div>
            </div>
    </div>
    <div class="row"><br>
        <div class="col-lg-12" id='loading_message' style='display:none;text-align: center'><p><img src="../ressources/img/loader.gif"> Envoie en cours  ...</p>
        </div>
    <div class="row">
        <div class="col-md-12" id="list_pfe_content">
            <?php include "generate_liste_pfe.php" ; ?>
        </div>
    </div>
</div>
    </div>

    <script data-cfasync="false">

    var url="generate_liste_pfe.php";
    $(document).ready(function() {

        $("#select_filiere").change(function(){
            $('#loading_message').show();
            var select_filiere=$('#select_filiere').val(),
                select_order=$('#select_ordre').val(),
            // Send the data using post
                posting = $.post( url, { selected_choice: select_filiere,selected_ordre:select_order });
            // Put the results in a div
            posting.done(function( data ) {
                $('#loading_message').hide();
                $('#list_pfe_content').html(data);
            });
        });

        $("#select_ordre").change(function(){
            $('#loading_message').show();
            var select_filiere=$('#select_filiere').val(),
                select_order=$('#select_ordre').val(),
            // Send the data using post
            posting = $.post( url, { selected_choice: select_filiere,selected_ordre: select_order});
            // Put the results in a div
            posting.done(function( data ) {
                $('#loading_message').hide();
                $('#list_pfe_content').html(data);
            });
        });
    });

</script>