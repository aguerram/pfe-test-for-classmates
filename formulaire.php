
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Abainou Yasine">
    <title> Formulaire PFE </title>
    <link href="ressources/css/bootstrap.min.css" rel="stylesheet">
    <link href="ressources/css/portfolio-item.css" rel="stylesheet">
	<script src="ressources/jquery.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<style>
		.container{
			width: 70%;
		}
		.monter{
			display: none;
		}
		.info{
			margin-top: 0px;
			text-align: center;
			border-bottom: double lightgray;
		}

	</style>
	<script type="text/javascript">

		// Only number in input type tel( GSM)
		function OnlyNumber(evt) {
			var theEvent = evt || window.event;
			var key = theEvent.keyCode || theEvent.which;
			key = String.fromCharCode( key );
			var regex = /[0-9]|\./;
			if( !regex.test(key) ) {
				theEvent.returnValue = false;
				if(theEvent.preventDefault) theEvent.preventDefault();
			}
		}

		//verify password equal
		function checkPasswordMatch() {
			var pass1 = document.getElementById("pass1").value;
			var pass2 = document.getElementById("pass2").value;
			if (pass1 != pass2) {
				document.getElementById("divCheckPasswordMatch").innerHTML= "<img src='ressources/img/erreur.png'> Mots de passe différents";
			}
			else {
				document.getElementById("divCheckPasswordMatch").innerHTML= "";

			}
		}

		// verifier redondance username
		$(document).ready(function() {

			$("#username").focusout(function() {
				cacher_loader("loader");
				$("#username_check").load("ressources/verify_redondance.php", { username: $("#username").val()});
			});

			$("#email1").focusout(function() {
				cacher_loader("loader2");
				$("#email1_check").load("ressources/verify_redondance.php", { email1: $("#email1").val()});
			});

			$("#nom1").focusout(function() {
				cacher_loader("loader3");
				if($("#prenom1").val()!=""){
					$("#user_check").load("ressources/verify_redondance.php", { nom1: $("#nom1").val(),prenom1: $("#prenom1").val()});
				}
			});

			$("#prenom1").focusout(function() {
				cacher_loader("loader3");
				if($("#nom1").val()!=""){
					$("#user_check").load("ressources/verify_redondance.php", { nom1: $("#nom1").val(),prenom1: $("#prenom1").val()});
				}
			});
		});
		
				function nospaces(t){
			if(t.value.match(/\s/g)){
				t.value=t.value.replace(/\s/g,'');
			}
		}

		function empty_content(id){
			document.getElementById(id).innerHTML = "";
		}
		function afficher_loader(id){
			document.getElementById(id).style.display = "inline";
		}

		function cacher_loader(id){
			document.getElementById(id).style.display = "none"
		}

	</script>

</head>
<body>
<header>
<?php include_once ("header.php");?>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-12" text-align="center"><br>
            <a href="index.php" style="text-align: center" ><p>Accueil</p></a>
        </div>
		<div class="col-md-12" >
			<p style="font-size: x-large" class="info bg-info">
				<span class="glyphicon glyphicon-education " style="" ></span>&nbsp; Formulaire d'enregistrement de PFE <br>  </p>
		</div>
	</div>
    <div class="row">
        <div class="col-md-12">
            <form class="form" method="post" action="register.php" name="formulaire" onsubmit="ValidCaptcha()" >
                <div class="row">
                    <div class="col-md-12">
                        <h4>Données d'accès</h4><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p>Filière : &nbsp; </p>
                    </div>
                    <div class="col-md-2">
                        <select name="filiere" class="form-control" required >
                            <option selected></option>
                            <option value="F">Génie Informatique</option>
                            <option value="T">Génie Télecom et R.</option>
                        </select> 
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">
                        <p>Nom d'utilisateur : &nbsp; </p>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="username" onkeyup="nospaces(this)"  onfocus="afficher_loader('loader');empty_content('username_check');" name="username" class="form-control" required />
						<span id="loader" style="display: none;"><img src="ressources/img/loader.gif" alt="loading" /></span>
						<span style="color: red" id="username_check" >&nbsp;</span>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">
                        <p>Mot de passe : &nbsp; </p>
                    </div>
                    <div class="col-md-3">
                        <input type="password" name="password" id="pass1"  onmouseout="checkPasswordMatch();" class="form-control" required/>
                    </div>
                    <div class="col-md-2">
                        <p>Confirmation : &nbsp; </p>
                    </div>
                    <div class="col-md-3">
                        <input type="password" name="password2" id="pass2" onchange="checkPasswordMatch();" class="form-control" required />
						<address style="color: red" id="divCheckPasswordMatch"></address>
					</div>
                </div>
                <div class="row">
                    <div class="col-md-12"><br>
                        <h4> Membres du groupe PFE </h4><br>
					</div>
                </div>
				<div class="row">
					<div class="col-md-3">
						<p style="text-align: center">Nom</p>
						<p><input name="nom1" id="nom1" required onfocus="afficher_loader('loader3');" class="form-control" ></p>
						<p><input name="nom2" class="form-control" ></p>
						<p><input name="nom3" class="form-control" ></p>
						<span id="loader3" style="display: none;"><img src="ressources/img/loader.gif" alt="loading" /></span>
						<span style="color: red" id="user_check" >&nbsp;</span>
					</div>
					<div class="col-md-3">
						<p style="text-align: center">Prénom</p>
						<p><input name="prenom1" id="prenom1" onfocus="afficher_loader('loader3');" class="form-control" required></p>
						<p><input name="prenom2" class="form-control"></p>
						<p><input name="prenom3" class="form-control"></p>
					</div>
					<div class="col-md-3">
						<p style="text-align: center">GSM</p>
						<p><input name="GSM1" type="tel"  onkeypress="OnlyNumber(event)" class="form-control" required></p>
						<p><input name="GSM2" type="tel" onkeypress="OnlyNumber(event)" class="form-control" ></p>
						<p><input name="GSM3" type="tel" onkeypress="OnlyNumber(event)" class="form-control"></p>
					</div>
					<div class="col-md-3">
						<p style="text-align: center" >Email</p>
						<p><input name="email1" id="email1" type="email"  onfocus="afficher_loader('loader2');empty_content('email1_check')" class="form-control" required>
							<span id="loader2" style="display: none;"><img src="ressources/img/loader.gif" alt="loading" /></span>
						</p>
						<p><input name="email2" type="email" class="form-control"></p>
						<p><input name="email3" type="email" class="form-control" ></p>
						<span style="color: red" id="email1_check" ></span>
					</div>
				</div>
				<div class="row"><br>
					<div  class="col-md-5"></div>
						<div align="center" class="g-recaptcha" data-sitekey="6LdeIBsUAAAAAALVXRDe9CJwG8iIYt5KvB-CJcQP"></div>
				</div>
<br>
				<div class="row">
					<div class="col-md-12" align="center" ><input type="submit" name="submit" class="btn btn-info" id="btn_submit"  value=" Valider le formulaire PFE "> </div>
            </form>
        </div>
		<hr>
	</div>
	<footer>
		<?php include_once ("footer.php");?>
	</footer>
</div>
</body>
</html>
