<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 09/03/2016
 * Time: 15:57
 */
session_start();
if(isset($_SESSION['user'])){
include_once ('../ressources/functions.php');
if(isset($_SESSION['login'])){
    $data= get_groupes_by_prof($_SESSION['login']);
}
    ?>

        <link href="../ressources/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .hr_email{
                border: 0;
                height: 1px;
                background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
            }
        </style>

    <div class="row">
        <p style="text-align: center;font-family: 'Lucida Fax';font-size: large"><span class="glyphicon glyphicon-bookmark"></span> Page déstiné à l'envoie des messages </p>
        <hr class="hr_email">
    </div>
    <div class="col-md-12">
    <form action="send_messages_action.php" id="mailForm">
        <br><br>
        <?php if(isset($_SESSION['login']) AND $_SESSION['user']=="professeur" ){ ?>
            <div class="row">
                <div class="col-md-12">
                    <p style="text-align: center"><em> Veuillez choisir la déstination</em> </p>
                    <table  class="table table-responsive table-bordered">
                        <tr class="bg-info"><th>Matr</th><th>Membres</th><th>Sujet</th><th>Email</th><th><span class="glyphicon glyphicon-envelope"></span></th></tr>
                        <?php while($groupes=$data->fetch()){ ?>
                            <tr><td><?php echo $groupes['filiere']."-".$groupes['groupe'] ;?></td>
                                <td><?php echo $groupes['nom1']." ".$groupes['prenom1'];
                                    if($groupes['nom2']){echo "<br>".$groupes['nom2']." ".$groupes['prenom2'];}
                                    if($groupes['nom3']){echo "<br>".$groupes['nom3']." ".$groupes['prenom3'];}
                                    ?>
                                </td>
                                <td><?php echo $groupes['sujet'] ;?></td>
                                <td><?php echo $groupes['email1'];
                                    if($groupes['email2']){echo "<br>".$groupes['email2'];}
                                    if($groupes['email3']){echo "<br>".$groupes['email3'];}
                                    ?>
                                </td>
                                <td><input type="checkbox" class="form-control"  value="<?php echo $groupes['groupe']; ?>"></td>
                            </tr>
                       <?php } ?>
                    </table>
                </div>
            </div>
        <?php } ?>
    <?php if(isset($_SESSION['user']) AND $_SESSION['user']=="admin" ){ ?>
        <div class="row">
            <div class="col-md-4 col-lg-offset-0">
                <select class="form-control "  id="select_destination" required>
                    <option selected value="">Sélectionner une déstination</option>
                    <option value="1">Tous les étudiant</option>
                    <option value="2">Etudiants G-Info</option>
                    <option value="3">Etudiants GTR</option>
                    <option value="4">Tous les Professeurs</option>
                </select>
            </div>
        </div>
        <?php } ?>
         <div class="row">
             <div class="col-md-5"><br>
                 <input type="text" placeholder="Objet " name="subject" required class="form-control">
             </div>
         </div>
        <div class="row">
            <div class="col-md-12"><br>
            <textarea  required class="form-control" rows="5" placeholder="Votre message ... " id="message_area"></textarea>
            </div>
            </div>
        <div class="row"><br>
            <div class="col-lg-12" id='loadingmessage' style='display:none;text-align: center'><p><img src="../ressources/img/loader.gif"> Envoie en cours  ...</p>
            </div>
            <div class="col-md-12 " align="center"><br>
                <input type="submit" value="Envoyer Message"  class="btn btn-success ">
                <input type="reset" value="Vider les Champs" onclick="hideInfo();" class="btn btn-warning ">
            </div>
        </div>
    </form>
    </div>
    <!-- the result of the search will be rendered inside this div -->
    <div id="result"></div>

    <script>

        function getChekedValues() {
            var allVals = [];
            $('#mailForm :checked').each(function() {
                allVals.push($(this).val());
            });
            return allVals;
        }

        function hideInfo(){
            $('#loadingmessage').hide();
        }

        // Attach a submit handler to the form
        $( "#mailForm" ).submit(function( event ) {
            $('#loadingmessage').show();
            //Stop form from submitting normally
            event.preventDefault();
            //Get some values from elements on the page:
            var $form = $( this ),
                subject = $form.find("input[name='subject']" ).val(),
                message = $('#message_area').val(),
                select_destination=$('#select_destination').val(),
                chekbox_liste=getChekedValues();
                url = $form.attr( "action" );
            // Send the data using post
            var posting = $.post( url, { subject: subject ,message: message,chekbox_liste:chekbox_liste,select_destination:select_destination});
            // Put the results in a div
            posting.done(function( data ) {
            //var content = $( data ).find( "#content" );
                $('#loadingmessage').html(data);
            });
        });
    </script>
    </body>
    </html>
<?php
}else{
    header('Location:interdit.php');
}
?>