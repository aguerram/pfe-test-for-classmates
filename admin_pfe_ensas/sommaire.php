<?php
session_start();

if( isset($_SESSION['user']) AND isset($_SESSION['pass']) )
{

include '../db_connect.php';

?>









<HTML>


<head>

<meta http-equiv=Content-Type content='text/html; charset=utf-8' /> 

<style>
<!--
.Menu01      {  font-family: Lucida Sans Unicode; font-size: 10pt;  margin-left:4; font-weight: bold; margin: 0;  background ='<?php echo $bg_color ; ?>'}
.Menu02      {  font-family: MS Reference Sans Serif; font-size: 9pt; margin-left:4; margin-top:0; margin-bottom:0; color:#800000 }
.Menu03      {  font-family: MS Reference Sans Serif; font-size: 8pt; margin-left:4; margin-top:0; margin-bottom:0; color:#00000 }

-->
</style>

<style type="text/css">



	
#link01 a {
	text-decoration:none;
	}

#link01 a:hover {
	text-decoration:underline;
	
	}
	
    </style>



<base target="droite">




<!----------------------------Script-------------------------->
<script LANGUAGE="Javascript">
<!--
var sToolTip = "Cliquez ici pour développer ou réduire."
function toggleTOC(src)
	{
	if (src.style.display == "none") 
		src.style.display = "";
	else
		src.style.display = "none";
	return;
	}
function TOCeffect(src)
	{
	src.title = sToolTip;
	return;
	}
-->
</script>


<script type="text/javascript" >
	
	
	/* Variables, go nuts changing those! */
	// initial position 
	var dn_startpos=120; 			
	// end position
	var dn_endpos=-200; 			
	// Speed of scroller higher number = slower scroller 
	var dn_speed=20;				
	// ID of the news box
	var dn_newsID='news';			
	// class to add when JS is available
	var dn_classAdd='hasJS';		
	// Message to stop scroller
	var dn_stopMessage='Stop scroller';	
	// ID of the generated paragraph
	var dn_paraID='DOMnewsstopper';

	/* Initialise scroller when window loads */
	window.onload=function()
	{
		// check for DOM
		if(!document.getElementById || !document.createTextNode){return;}
		initDOMnews();
		// add more functions as needed
	}
	/* stop scroller when window is closed */
	window.onunload=function()
	{
		clearInterval(dn_interval);
	}

/*
	This is the functional bit, do not press any buttons or flick any switches
	without knowing what you are doing!
*/

	var dn_scrollpos=dn_startpos;
	/* Initialise scroller */
	function initDOMnews()
	{
		var n=document.getElementById(dn_newsID);
		if(!n){return;}
		n.className=dn_classAdd;
		dn_interval=setInterval('scrollDOMnews()',dn_speed);
		var newa=document.createElement('a');
		var newp=document.createElement('p');
		newp.setAttribute('id',dn_paraID);
		newa.href='#';
		//newa.appendChild(document.createTextNode(dn_stopMessage));
		newa.onclick=stopDOMnews;
		newp.appendChild(newa);
		n.parentNode.insertBefore(newp,n.nextSibling);
		n.onmouseover=function()
		{		
			clearInterval(dn_interval);
		}
		n.onmouseout=function()
		{
			dn_interval=setInterval('scrollDOMnews()',dn_speed);
		}
	}

	function stopDOMnews()
	{
		clearInterval(dn_interval);
		var n=document.getElementById('news');
		n.className='';
		n.parentNode.removeChild(n.nextSibling);
		return false;
	}
	function scrollDOMnews()
	{
		var n=document.getElementById(dn_newsID).getElementsByTagName('ul')[0];
		n.style.top=dn_scrollpos+'px';	
		if(dn_scrollpos==dn_endpos){dn_scrollpos=dn_startpos;}
		dn_scrollpos--;	
	}

	</script>


<!--------------------------Fin du Script--------------------->


</head>


<body bgcolor="<?php echo $bg_color ; ?>">
<p align=center><i>
<b><font size="2" face="Arial"><br><?php echo $ecole; ?><br><?php echo $dep_label ; ?><br>
<?php echo $titre; ?><br>
</font></b></i><br>

<img border="0" src="../images/irt_logo.png" width="127" > </p>

<div id="link01"> 


<p  class="Menu01" onclick="toggleTOC(smenu00)" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
&nbsp; Menu</p>

<div style="display: yes" id="smenu00" >

<table>

<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="home.php" onmouseover=" window.status=''; return true" onmouseout="window.status=''; return true" onmousedown="window.status=''; return true"  >
<font color="#800000">
Accueil</font></a></p>


<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="../calendrier.php"><font color="#800000">Calendrier PFE</font></a></p>


<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="recherche.php?liste=ok"><font color="#800000">Liste des PFE</font></a></p>

<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="../planning.php"><font color="#800000">Planning Soutenances</font></a></p>

<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="../downloads.php"><font color="#800000">Modalités PFE</font></a></p>


<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="prof_liste.php"><font color="#800000">Liste Encadrants</font></a></p>


<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="saisi_notes.php"><font color="#800000">Saisi des notes</font></a></p>


<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="mean_notes.php"><font color="#800000">Liste des notes</font></a></p>



<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a target="_blank" href="../index.php" onmouseover=" window.status=''; return true" onmouseout="window.status=''; return true" onmousedown="window.status=''; return true" >
<font color="#800000">
Site Etudiants</font></a></p>



<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="mailinglist.php"><font color="#800000">Mailing List</font></a></p>





    <?php   if (  ($_SESSION['user'] =='admin') )  {  ?>


<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="prof_attrib.php"><font color="#8088F">Attribution Encadrants</font></a></p>







  <?php   }  ?>


<p  class="Menu02" onmouseout="this.style.background ='<?php echo $bg_color ; ?>'" onMouseOver="this.style.background ='<?php echo $bg_color ; ?>'; this.style.cursor = 'hand'" >
<a href="logout.php" target="_parent"><font color="#800000">Quitter</font></a></p>


</table>
</div>
                 

</div>


<p>&nbsp;</p>


</BODY>

</HTML>





<?php

} //session
else
{
echo "Accés non authorisé!";
}
?>





