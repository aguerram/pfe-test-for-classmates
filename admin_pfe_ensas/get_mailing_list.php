<?php


include '../db_connect.php';
if (isset($_POST['filiere'])) {

    $tri =   'nom1';
    $filiere =   protect($_POST['filiere']);

    switch ($filiere) {
        case 'F':
            $filiere_txt = 'Génie Informatique';
            break;

        case 'T':
            $filiere_txt = 'Génie Télécom & R.';
            break;

        case '':
            $filiere_txt = 'Toutes les filières';
            break;
    }
    $requete = '';


    if ($filiere) {
        $requete = $requete . ' WHERE ';
    }

    if ($filiere) {
        $requete = $requete . ' (INSTR( filiere  , "' . $filiere . '")) ';
    }

    //echo $requete ;



    $select0 = 'SELECT * FROM  ' . $table_pfe . '  ' . $requete . ' ORDER BY ' . $tri;
    $result0 = mysqli_query( $con,$select0) or die('Erreur : ' . mysqli_error( $con));
    $total = mysqli_num_rows($result0);

    ?>

        <!--email_off-->


        <br>



        <p style="text-align: center"> Filière : <b><?php echo $filiere_txt; ?></b> </p>
        <br>
        <div class="col-md-5 col-md-offset-3">
            <table class="table table-bordered table-responsive table-condensed">
                <tr class="bg-success">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
                <?php
                    $var = 0;
                    while ($row = mysqli_fetch_array($result0)) {

                        if ($row['valide'] == '1') {
                            $username     = ($row['username']);
                            $password     = ($row['password']);
                            $groupe     = ($row['groupe']);

                            $nom1     = ($row['nom1']);
                            $nom2     = ($row['nom2']);
                            $nom3     = ($row['nom3']);

                            $prenom1     = ($row['prenom1']);
                            $prenom2     = ($row['prenom2']);
                            $prenom3     = ($row['prenom3']);


                            $email1     = ($row['email1']);
                            $email2     = ($row['email2']);
                            $email3     = ($row['email3']);


                            $GSM1     = ($row['GSM1']);
                            $GSM2     = ($row['GSM2']);
                            $GSM3     = ($row['GSM3']);



                            $encadrant     = ($row['encadrant']);
                            $email_encadrant     = ($row['email_encadrant']);
                            $filiere     = ($row['filiere']);
                            $sujet     = ($row['sujet']);
                            $date     = ($row['date']);


                            $groupe_label = $filiere . '-' . $groupe;






                            ?>

                        <tr>
                            <td><?php echo $nom1; ?></td>
                            <td><?php echo $prenom1; ?></td>
                            <td><?php if ($email1) {
                                                echo $email1;
                                            } ?></td>
                        </tr>

                        <?php if ($nom2) {
                                        ?>

                            <tr>
                                <td><?php echo $nom2; ?></td>
                                <td><?php echo $prenom2; ?></td>
                                <td><?php if ($email2) {
                                                        echo $email2;
                                                    } ?></td>
                            <?php  }  ?>
                            </tr>

                            <?php if ($nom3) {
                                            ?>

                                <tr>
                                    <td><?php echo $nom3; ?></td>
                                    <td><?php echo $prenom3; ?></td>
                                    <td><?php if ($email3) {
                                                            echo $email3;
                                                        } ?></td>
                                <?php  }  ?>
                                </tr>








                        <?php

                                    $var = $var + 1;
                                }
                            } //Boucle mysql



                            ?>

            </table>
        </div>

        <!--/email_off-->





    <?php

    } //formulaire

    ?>