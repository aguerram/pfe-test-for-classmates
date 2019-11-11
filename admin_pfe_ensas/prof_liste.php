<?php
session_start();

if (isset($_SESSION['user']) and isset($_SESSION['pass'])) {

  include '../db_connect.php';
  $liste_title = "";
  if (isset($prof_name)) {
    $encadrant = $prof_name = $_SESSION['login'];
    $select0 = "SELECT * from `" . $table_profs . "` WHERE `jury`=
    (SELECT jury FROM `" . $table_profs . "`
      WHERE `login`='" . $encadrant . "') ";
  } else {
    $liste_title = "
    <div class=\"col-md-12\">
        <hr>
        <p style=\"text-align: center ; font-family: 'Lucida Fax';font-size: large\"><span class='glyphicon glyphicon-bookmark'></span> Liste des encadrants </p>
        <hr>
    </div>";
    $select0 = 'SELECT * FROM ' . $table_profs . '  ORDER BY nom';
  }
  $result0 = mysqli_query($con, $select0) or die('Erreur : ' . mysqli_error($con));

  ?>





  <html>

  <head>


    <meta http-equiv=Content-Type content='text/html; charset=utf-8' />
    <style type="text/css">
      a.infobulle em {
        display: none;
      }

      a.infobulle:hover {
        border: 0;
        position: relative;
        z-index: 500;
        text-decoration: none;
      }

      a.infobulle:hover em {
        font-style: normal;
        display: block;
        position: absolute;
        top: 20px;
        left: -10px;
        padding: 5px;
        color: #000;
        border: 1px solid #bbb;
        background: #ffc;
      }
    </style>

    <script type="text/javascript" src="tablesort.js"></script>

    <script type="text/javascript">
      function CreateExcelSheet() {
        var x = myTable.rows
        var xls = new ActiveXObject("Excel.Application")
        xls.visible = true
        xls.Workbooks.Add
        for (i = 0; i < x.length; i++) {
          var y = x[i].cells
          for (j = 0; j < y.length; j++) {
            xls.Cells(i + 1, j + 1).Value = y[j].innerText
          }
        }

      }
    </script>


  </head>

  <body bgcolor='<?php echo $bg_color; ?>'>
    <!--email_off-->

    <p align="center" style="margin-top: 0; margin-bottom: 0"><?php echo $liste_title; ?></p>
    <?php if ($_SESSION['user'] == 'admin') {  ?>
      <p align="center"><br><a target="_blank" href="prof_register.php"><button class="btn btn-info" style="width: auto">Ajouter un encadrant</button></a>
      </p>
    <?php   }  ?>
    <div align="center">



      <table id="myTable" class="table table-responsive" bordercolor='#6699FF' style="border-collapse: collapse; font-family: Arial; font-size: 15px" border="1" bgcolor="#FFFFFF">
        <tr align="center" class="bg-success" style="font-weight: bold">
          <?php if (!isset($prof_name)) { ?>
            <th>N°</th>
          <?php } ?>
          <th>Encadrant</th>
          <th>Email</th>

          <th>Jury</th>
          <th>Salle</th>

          <th>G.INF</th>

          <th>G.T.R</th>

          <th>Total</th>

          <?php if (($_SESSION['user'] == 'admin')) {  ?>

            <th>&nbsp;</th>

          <?php   }   ?>

        </tr>




        <?php

          $var = 0;
          while ($row = mysqli_fetch_array($result0)) {





            $nom   = ($row['nom']);
            $prenom   = ($row['prenom']);
            $email   = ($row['email']);
            $GSM   = ($row['GSM']);

            $jury   = ($row['jury']);
            $salle   = ($row['salle']);



            $sqlc = "SELECT * from `" . $table_pfe . "` WHERE `filiere`='F' AND  INSTR( encadrant  , '" . $nom . "') ";
            $res1c = mysqli_query($con, $sqlc) or die(mysqli_error($con));
            $FF3 = mysqli_num_rows($res1c);

            $sqlc = "SELECT * from `" . $table_pfe . "` WHERE `filiere`='T' AND  INSTR( encadrant  , '" . $nom . "') ";
            $res1c = mysqli_query($con, $sqlc) or die(mysqli_error($con));
            $TT3 = mysqli_num_rows($res1c);

            $sqlc = "SELECT * from `" . $table_pfe . "` WHERE INSTR( encadrant  , '" . $nom . "') ";
            $res1c = mysqli_query($con, $sqlc) or die(mysqli_error(con));
            $total = mysqli_num_rows($res1c);


            $sqlc = "SELECT * from `" . $table_pfe . "` WHERE `filiere`='F'  ";
            $res1c = mysqli_query($con, $sqlc) or die(mysqli_error(con));
            $F = mysqli_num_rows($res1c);

            $sqlc = "SELECT * from `" . $table_pfe . "` WHERE `filiere`='T'  ";
            $res1c = mysqli_query($con, $sqlc) or die(mysqli_error(con));
            $T = mysqli_num_rows($res1c);

            ?>


          <tr <?php if ((isset($_SESSION['login']) and $_SESSION['login'] == $nom)) { ?> class="bg-info" <?php } ?>>
            <?php if (!isset($prof_name)) { ?>

              <td style="height: 31px"><?php echo $var + 1; ?></td>
            <?php } ?>



            <td style="height: 31px">
              <font color="#000000"><?php echo $nom . ' ' . $prenom; ?></font>
            </td>


            <td style="height: 31px">
              <font color="#000000"><?php echo $email . ', '; ?></font>
            </td>
            <td style="height: 31px; text-align:center">
              <font color="#000000"><?php echo $jury; ?></font>
            </td>
            <td style="height: 31px;">
              <font color="#000000"><?php echo $salle; ?></font>
            </td>


            <td style="height: 31px; text-align:center">
              <font color="#FF0000">
                <?php if ($FF3) {
                      echo $FF3 . '</font>';
                    }    ?>
            </td>


            <td style="height: 31px; text-align:center">
              <font color="#FF0000">
                <?php if ($TT3) {
                      echo $TT3 . '</font>';
                    }    ?>
            </td>


            <td bgcolor="#FFFF99" style="height: 31px; text-align:center; font-size:small"><b>
                <font color="#000000">


                  <?php if ($total) {
                        echo $total . '</font></b>';
                        echo '';
                        echo '';
                      }    ?>
            </td>

            <?php if (($_SESSION['user'] == 'admin')) {  ?>

              <td style="height: 31px">
                <a target="_blank" href="prof_edit.php?nom=<?php echo $nom; ?>"><button class="btn btn-success" style="width: auto">Edit</button></a>
              </td>
            <?php   }



                if ($_SESSION['user'] == 'admin') {  ?>


              <td style="height: 31px">

                <button class="btn btn-danger" style="width: auto" onclick="if (window.confirm('Etes vous sur de supprimer le prof: <?php echo $nom; ?> ?'))
{location.href='prof_delete.php?nom=<?php echo $nom; ?>';return true;} else {return false;}">Del</button>
              </td>



            <?php   }  ?>

          </tr>






        <?php

            $var = $var + 1;
          } //Boucle mysql



          ?>
      </table>
    </div>
    <!--/email_off-->
  </body>
  <script src="../ressources/jquery.min.js"></script>
  <script>
    if (!$("link[href='../ressources/css/bootstrap.min.css']").length)
      $('<link href="../ressources/css/bootstrap.min.css" rel="stylesheet">').appendTo("head");
  </script>

  </html>





<?php

} //session
else {
  header('Location:interdit.php');
}
?>