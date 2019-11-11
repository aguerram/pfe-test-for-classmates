<?php
session_start();
if( !isset($_SESSION['user']) ){
header('Location:interdit.php');
}

?>
<script data-cfasync="false">
	$(document).ready(function() {
		$("#select_filiere").change(function(){
			$("#mailing_area").load("get_mailing_list.php", { filiere: $("#select_filiere").val()});
		});

	});
</script>

<div class="row" align="center">
	<br>
	<P style="font-size: large;color: #4476C1"><b>Mailing List</b></P>
	<select name="filiere" id="select_filiere" class="btn btn-success">
		<option value="X">Sélectionner une option</option>
		<option value="">Toutes les filières</option>
		<option value="F">Génie Informatique</option>
		<option value="T">Génie Télecom et R.</option>
	</select>
</div>
<div class="row"  id="mailing_area">

</div>

