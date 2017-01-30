<!DOCTYPE html>
<html>
	<head>
		<title>Početna stranica</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/ana.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
<div id="naslov" align="center"><a href="/Algebra">BAZA FILMOVA</a></div>
<div align="right"><a href=unos.php>obrazac za unos novih filmova u bazu</a></div>
<br />
<?php

	$slova[]="A";
	$slova[]="B";
	$slova[]="C";
	$slova[]="D";
	$slova[]="E";
	$slova[]="F";
	$slova[]="G";
	$slova[]="H";
	$slova[]="I";
	$slova[]="J";
	$slova[]="K";
	$slova[]="L";
	$slova[]="M";
	$slova[]="N";
	$slova[]="O";
	$slova[]="P";
	$slova[]="R";
	$slova[]="S";
	$slova[]="T";
	$slova[]="U";
	$slova[]="V";
	$slova[]="Z";

//ISPIS TRAKE ZA ODABIR SLOVA
echo '<div align="center">';	 
foreach ($slova as $slovo)
	//echo"| $slovo |";
	echo '|	 <a href="?slovo='.$slovo.'">'.$slovo.'</a>		';
echo "|";	
echo '</div>';
echo '<br />';

//ISPIS PODATAKA IZ BAZE
require_once('klase.php');
$filmovi= new filmovi();
$filmovi->dohvatiFilmove($_GET['slovo']);

echo '<div>';
echo '<table id="centralna">';

$filmovi->ispisiFilmove();

echo '</table>';
echo '</div>';


?>
	<script src="js/ana.js"></script>
	</body>
</html>



