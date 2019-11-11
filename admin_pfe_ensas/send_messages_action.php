<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 09/03/2016
 * Time: 16:07
 */
session_start();
if(isset($_POST['subject']) AND isset($_POST['message'])){
    include_once ('../ressources/functions.php');
    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: ENSAS - IRT <ensas.admin@gmail.com>\n";
            if(isset($_SESSION['login']))
            {
          if(isset($_POST['chekbox_liste'])) {
              $emails = "";
              foreach ($_POST['chekbox_liste'] as $ligne) {
                  $data = get_emails_of_groupe($ligne);
                  $emails .= $data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3'] . ', ';
              }
               mail($emails,$_POST['subject'],$_POST['message'],$headers);
              echo "<p><img src='../ressources/img/ok.png'> Message envoyé avec succés!</p>";

          }
            } elseif(isset($_POST['select_destination'])){
              $emails=get_emails_by_params($_POST['select_destination']);
              mail($emails,$_POST['subject'],$_POST['message'],$headers);
                echo "<p><img src='../ressources/img/ok.png'> Message envoyé avec succés!</p>";

            }

}
?>