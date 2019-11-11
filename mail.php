
<?php



// Envoyer un email au candidat
$objet = "PFE_" . $groupe_label . "_[" . $nom1 . " " . $nom2 . " " . $nom3 . "]" ;
$message = "
<html>
<head> <meta http-equiv=Content-Type content='text/html; charset=utf-8' /> </head>
<body bgcolor='" . $bg_color . "' >
<font face='Arial' size='2'>
    $universite<br>
    $ecole <br>
    $dep_label<br>
    $titre
</font>
<p><font face='Arial' size='2'>Bonjour le groupe [<b>$nom1&nbsp; $nom2&nbsp; $nom3</b> ]</font></p>
<p><font face='Arial' size='2'> L'enregistrement de votre groupe a été effectué avec succès!. </font></p>
<font face='Arial' size='2'> Vous pouvez accéder à votre compte sur le
    <a href='" . $site . "'>site des PFE</a> avec les données suivantes:<br>
    &nbsp;
    USER : <b>$username</b><br>
    &nbsp; PASSWORD : <b>$password</b><br>
    <br>
    <table width='766' bgcolor='#FFFFFF' style='border-width:0px; font-family:Tahoma; font-size:10pt'>
        <tr>
            <td colspan='2' style='border-style:none; border-width:medium; height: 26px;'>
                <p style='margin-top: 0; margin-bottom: 0'>
                    <font face='Tahoma'>Matricule du groupe PFE : <font size='4'><b>&nbsp; $groupe_label  </b> </font></font>
            </td>
        </tr>
    </table>
    <table width='765' style='font-family:Tahoma; font-size:10pt; border-collapse:collapse; border-left-width:0px; border-right-width:0px; border-top-width:0px' cellspacing='0' border='1'>
        <tr>
            <td width='759' style='border-left:medium none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium' bgcolor='#99CCFF' height='21' colspan='4'>
                <font size='3'><b>Membres du groupe PFE
                    </b></font></td>
        </tr>
        <tr>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px;' width='197' align='center' bgcolor='#FFFFCC' >
                <b>Nom</b></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px;' width='202' align='center' bgcolor='#FFFFCC' >
                <b>Prénom</b></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px; width: 180px;' align='center' bgcolor='#FFFFCC'>
                <b>GSM</b></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; height: 19px;' width='299' align='center' bgcolor='#FFFFCC'>
                <b>Email</b></td>
        </tr>
        <tr>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='197' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $nom1</font></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='202' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $prenom1</font></td>
            <td align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px; width: 180px;' >
                $GSM1</td>
            <td   width='299' align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px;' >
                $email1</td>
        </tr>
        <tr>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='197' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $nom2</font></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='202' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $prenom2</font></td>
            <td align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px; width: 180px;' >
                $GSM2</td>
            <td   width='299' align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px;' >
                $email2</td>
        </tr>
        <tr>
            <td style='border-left:medium none #FFFFFF; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='197' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $nom3</font></td>
            <td style='border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px' width='202' align='center' bgcolor='#F4F4F0' valign='middle'>
                <font face='Arial'> $prenom3</font></td>
            <td align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px; width: 180px;' >
                $GSM3</td>
            <td   width='299' align='center' bgcolor='#F4F4F0' style='border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px; height: 19px;' >
                $email3</td>
        </tr>
    </table>
    <table width='766' bgcolor='#FFFFFF' style='border-width:0px; font-family:Tahoma; font-size:10pt'>
        <tr>
            <td colspan='2' style='border-left-style:none; border-left-width:medium; border-right-style:none;
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px' bgcolor='#99CCFF'>
                &nbsp;</td>
        </tr>
        <tr>
            <td width='280' style='border-style:none; border-width:medium; ' bgcolor='#F4F4F0' height='51'>
                <font face='Arial'>Date d'enregistrement :<b>  $date</b></font>
            </td>
            <td style='border-style:none; border-width:medium; ' bgcolor='#F4F4F0' height='51' width='476'>
                &nbsp;</td>
        </tr>
    </table>
    <p align='left'><font face='Arial' size='1'> ENSA Safi (C) <?php echo date('Y'); ?> </font></p>
</body>
</html>
";

mail($emails, $objet, $message, $headers) ;

?>