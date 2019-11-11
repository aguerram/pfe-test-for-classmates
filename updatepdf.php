<?php
session_start();

include "db_connect.php";


$today = mktime(0, 0, 0, date("m"), date("d"), date("y"));
if ($today <= $datefinale) {
	include "expiration.php";
} else {
	if ($_SESSION['username']) {

		$sql = "SELECT * from `" . $table_pfe . "` WHERE `username`='" . $_SESSION['username'] . "' ";


		$res = mysqli_query($con,$sql) or die(mysqli_error($con));

		if (mysqli_num_rows($res) != 1) {


			echo "<script language=\"Javascript\" type=\"text/javascript\">
	alert(\"Accès non authorisé!!!!\")
	document.location.href='index.php'</script>";
		} else {


			$row = mysqli_fetch_assoc($res);

			$username	 = ($row['username']);
			$groupe	 = ($row['groupe']);
			$filiere	 = ($row['filiere']);
			$groupe_label = $filiere . '-' . $groupe;

			$sujet	 = ($row['sujet']);
			$encadrant	 = ($row['encadrant']);


			$nom1	 = ($row['nom1']);
			$nom2	 = ($row['nom2']);
			$nom3	 = ($row['nom3']);


			$filename = $groupe_label . "-" . $username . ".pdf";
			$target_path = "rapports/" . $filename;




			$date1 = date('d-m-Y');
			$heure = date('H:i');

			$date	 =	$date1 . " " . $heure;


			?>


			<html>

			<head>
				<meta http-equiv=Content-Type content='text/html; charset=utf-8' />

				<script>
					function blink(ob) {
						if (ob.style.visibility == 'visible') {
							ob.style.visibility = 'hidden';
						} else {
							ob.style.visibility = 'visible';
						}
					}
					setInterval('blink(bl)', 500);
				</script>








			</head>

			<body onLoad='showLoadingDiv()' bgcolor=<?php echo $bg_color; ?> lang=FR>

				<div align='center'>
					<p align='center' style='margin-top: 0; margin-bottom: 0'></p>



					<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
							<font face="Tahoma" size="4" color="#4476C1">Insertion du rapport </font>
						</b></p>
					<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>
					<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>


					<p align="center" style="margin-top: 0; margin-bottom: 0">
						<font face="Tahoma"> Groupe PFE :&nbsp; </font>
						<span style="text-decoration: none; font-weight:700">
							<font face="Tahoma" color="#4476C1"><b><?php echo $groupe_label; ?></b> </font>
						</span><br>
						<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>

				</div>
				<script type="text/javascript">
					function showLoadingDiv() {
						document.getElementById('progressbox').style.display = 'block';
					}
				</script>
			</body>

			</html>



			<?php


						if (file_exists($target_path)) {  ?>
				<p style="text-align:center;color:green;"> <label class="glyphicon glyphicon-ok-sign"> </label> Votre rapport a été déposé avec succès ! <br>
				</p>
			<?php }




						if (!isset($_POST['submit'])) {
							?>



				<html>

				<head>

					<meta http-equiv=Content-Type content='text/html; charset=utf-8' />



					<script type="text/javascript">
						function checkFile() {
							var fileElement = document.getElementById("uploadfile");
							var fileExtension = "";
							if (fileElement.value.lastIndexOf(".") > 0) {
								fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
							}
							if (fileExtension == "pdf" || fileExtension == "PDF") {
								return true;
							} else {
								alert(" Format de fichier non valide ! ");
								return false;
							}
						}
					</script>





				</head>




				<body bgcolor="#DDECFE">



					<form enctype="multipart/form-data" action="updatepdf.php" method="POST" name="formulaire" onsubmit="return checkFile();">



						<div align="center">



							<table width="740" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">
								<tr>
									<td align="center" colspan="2" style="border-left-style:none; border-left-width:medium; border-right-style:none; 
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px; height: 24px;">
										<font size="3"><b>Inserer votre rapport en format pdf</b></font>
									</td>
								</tr>
								<tr>
									<td align="center" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
										<br>
										<font face="Arial">

											<input type="hidden" name="MAX_FILE_SIZE" value="999999999999" />
											<input class="btn btn-success" name="uploadfile" id="uploadfile" type="file" accept="application/pdf" size="999" /> </font>
									</td>
								</tr>




							</table>


							<br>


							<br>


							<table width="740" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">

								<tr>
									<td align="center">

										<p align="center" style="margin-top: 0; margin-bottom: 0">
											<font face="Arial">
												<input type="submit" class="btn btn-success" name="submit" value="Enregistrer le rapport" onClick="showLoadingDiv();validerForm(this.form);" style="font-family: Arial; font-size: 10pt; font-weight:bold" />
											</font>
									</td>
								</tr>
							</table>

						</div>
					</form>
					<br>
					<p style="display:none;text-align:center;font-size:large;" id="progressbox"> <img src="ressources\img/loader.gif" /> SVP veuillez patienter pendant le chargement du fichier !</p>
				</body>

				</html>
<?php
			} else {




				$date1 = date('d-m-Y');
				$heure = date('H:i');

				$groupe = $groupe;

				$groupe_label = $filiere . '-' . $groupe;



				$errors = array();



				if (count($errors) > 0) {


					echo "
  <div align='center'>
  <br>
  <font color='red'>
  ";

					foreach ($errors as $error) {
						echo "<p>" . $error . "\n";
					}
					echo "</font><p><a href='javascript:history.go(-1)'>Recommençer</a></p></div>";
				} else {

					$pathfile = "rapports/" . $groupe_label . "-" . $username;
					$rapports = glob($pathfile . "*.pdf");
					$filecount = count($rapports);
					//echo $filecount;
					if ($filecount) {
						unlink($pathfile . ".pdf");
						//rename ($pathfile . ".pdf", $pathfile . "(v" . $filecount . ").pdf" ) ;
					}




					$target_path = "rapports/" . $filename;
					$_FILES['uploadfile']['tmp_name'];

					if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)) {



						echo "


<body bgcolor='" . $bg_color . "'>
<div align='center'>
<p align='center' style='margin-top: 0; margin-bottom: 0'>
&nbsp;</p>
<p style='margin-top: 0; margin-bottom: 0' align='center'>&nbsp;</p>

<div align='center'>
	<table width='783' bgcolor='#FFFFFF' style='border-width:0px; font-family:Tahoma; font-size:10pt'>
		<tr>
			<td width='777' style='border-style:none; border-width:medium; ' bgcolor='#F4F4F0'>
			<p style='margin-top: 0; margin-bottom: 0' align='center';color:green;>
			<font face='Tahoma' size='2'>Votre rapport a été enregistré avec <b>succès</b>!.<br>
			Vous pouvez consulter la liste des PFE , la colonne ' Rapport ' , pour vérifier l'enregistrement des rapports !
			</td>
			</tr>
		
	</table>
	<p style='margin-top: 0; margin-bottom: 0' align='left'>&nbsp;</p>
	</div>
	<p style='text-align:center' ><a href='mean.php'> Retourner vers l'acceuil </a></p>
";
					}
				}
			}
		}
	} else {
		include "interdit.php";
	}
} //condition de delai




?>