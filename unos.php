<!DOCTYPE html>
<html>
<head>
		<title>Unos novog filma</title>
</head>
	<body>
		<div align="center"><strong><font face="geneva" color="black" size="5">Unos filmova</font></strong></div>
		<br/>
		<div align="right"><a href=index.php>povratak na početnu stranicu</a></div>
		<br/>
		<form method="POST" action="" enctype="multipart/form-data">
		Naslov:<br />
		<input type="text" name="naslov" value=""/><br />
		<br />
		Žanr:<br />
		<select name="zanr">
		<?php
//////ISPIS ZANROVA IZ BAZE

		require_once('klase.php');
		
		$zanrovi = new filmovi();
		$zanrovi->dohvatiZanrove();
		$zanrovi->ispisiZanrove();
    
		?>
		</select>
		<br />
		Godina:<br />
		<select name="godina">
            <option value=""></option>
            <?php
            for ($godina=date("Y"); $godina>=1900; $godina--)
              {
                echo'<option value="'.$godina.'">'.$godina.'</option>'; 
              } 
            ?> 
        </select>
        <br />
        <br />
		Trajanje:<br />
		<input type="number" name="trajanje" min="0" max="9999">
	
		<br /><br />

		Slika:<br />
		<input type="file" name="datoteka" value="" />
		<br />
		<br />
		<input type="submit" name="gumb" value="Unesi podatke" />
		</form>
<?php

if (isset($_POST['gumb']))
{	
	if ($_POST['naslov']=="")
	{
		echo 'Naslov je obavezan';
	}
	else
	{
///////zanr ID
	
	$zanr_id= new filmovi();
	
	$zanr_result = $zanr_id->dohvatiId($_POST['zanr']);
    
    echo "<br/>";
    
     $table = mysqli_fetch_all($zanr_result,MYSQLI_ASSOC);
     $zanr = $table[0]['id'];
     
	  
////upload slike putanja
    $folder='./inc';
    $ime_datoteke=$folder.'/'.basename($_FILES['datoteka']['name']);

/////prebacivanje slike na definirano mjesto
    move_uploaded_file($_FILES['datoteka']['tmp_name'], $ime_datoteke);
    
/////Upis u bazu   
	$naslov=$_POST['naslov'];
	$godina=$_POST['godina'];
	$trajanje=$_POST['trajanje'];
	$slika=$ime_datoteke;
	
	$unos = new filmovi();
	$unos_result = $unos->upisiFilmove($naslov,$zanr,$godina,$trajanje,$slika);
	
	
		if($unos_result)
		{
			echo "<br/>Uspješno ste unijeli film u bazu!<br/>";
		}
		else
		{
			echo "Došlo je do greške.";
		}
	
	}

}
	echo "<br/>";

////ispis postojeće baze
$ispis= new filmovi();
$ispis->dohvatiBazu();

echo '<table align="center" border="1px solid black" width="80%">';
echo '<tr align="center" style="background-color:#ccccff;"><td><b>Slika</b></td><td><b>Naslov filma</b></td><td><b>Godina</b></td><td><b>Trajanje</b></td><td><b>Akcija</b></td></tr>';
//echo($_POST[id]);	
$ispis->ispisiBazu();
echo '</table>';

?>
	</body>
</html>
