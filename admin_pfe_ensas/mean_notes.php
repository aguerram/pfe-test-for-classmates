<?php
session_start();

if( isset($_SESSION['user']) AND isset($_SESSION['pass']) )
{


header('Content-Type: text/html;charset=UTF-8');

include "../db_connect.php";


?>


<html >
<head>

<title> <?php echo $titre; ?> </title>


<meta http-equiv=Content-Type content='text/html; charset=utf-8' />

<style type="text/css">

body {
	margin: 0;
	padding: 0;
	font: 0.75em/1.4em Arial, Helvetica, sans-serif;
}
#container {
	position: relative;
	width: 940px;
	margin: 3em auto;
	text-align: left;
	border: 4px solid #AF9D4C;
	background-color: #AF9D4C;
}
#container * {
	margin: 0;
	padding: 0;
}
#container ul#menu {
	position: relative;
	width: 100%;
	font-weight: bold;
}
#container ul#menu li {
	float: left;
	display: inline;
}
#container ul#menu li a {
	text-align: center;
	display: block;
	width: 200px;
	height: 25px;
	line-height: 25px;
	text-decoration: none;
}
#container ul#menu li a:hover {
	background-color: #EFDC86;
}
#container h1,
#container h2 {
	margin: 0.5em 0 0.5em 0;
	font-size: 1.4em;
}
#container .content {
	padding: 1em 2em;
	margin: -2px 0 0 0;
	_margin: -16px 0 0 0;
	background-color: #E7FFCF;
}
#container hr {
	clear: both;
	visibility: hidden;
}
#container a.current {
	background-color: #E7FFCF;
	color: #000;
}
#container a.ghost  {
	background-color: #AF9D4C;
	color: #000;
}
#container .on {
	display: block;
}
#container .off {
	display: none;
}
-->
</style>
<script type="text/javascript">
<!--
function multiClass(eltId) {
	arrLinkId = new Array('_0','_1','_2','_3');
	intNbLinkElt = new Number(arrLinkId.length);
	arrClassLink = new Array('current','ghost');
	strContent = new String()
	for (i=0; i<intNbLinkElt; i++) {
		strContent = "menu"+arrLinkId[i];
		if ( arrLinkId[i] == eltId ) {
			document.getElementById(arrLinkId[i]).className = arrClassLink[0];
			document.getElementById(strContent).className = 'on content';
		} else {
			document.getElementById(arrLinkId[i]).className = arrClassLink[1];
			document.getElementById(strContent).className = 'off content';
		}
	}	
}
-->
</script>
</head>
<body bgcolor='<?php echo $bg_color; ?>'>




<p align="center" style="margin-top: 0; margin-bottom: 0">
&nbsp;</p> <br>

<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
<font face="Tahoma" size="4" color="#4476C1">Listes des notes</font></b></p>


<div align="center">


<div align="center" id="container">
	<ul id="menu">
		<li class="menu0">
			<a href="#" id="_0" class="current" onclick="multiClass(this.id)" alt="menu1">
			Génie Informatique</a>
		</li>
		<li class="menu1">
			<a href="#" id="_1" class="ghost" onclick="multiClass(this.id)" alt="menu1">
			Génie Télécom et R.</a>
		</li>
	</ul>
	<hr />
	<div id="menu_0" class="on content"> <?php $filiere = 'F'; include "export.php" ; ?> </div>
	<div id="menu_1" class="off content"><?php $filiere = 'T'; include "export.php" ; ?> </div>
	
</div>



<p>&nbsp;</p>


<p align="center"><font face="Arial" size="1"> <?php echo $copyright; ?> </font></p>




</div>



</body>
</html>






<?php

} //session
else
{
	header('Location:interdit.php');
}
?>








