<?php
require_once('db.class.php');
//echo($_GET[id]);

$db3 = new baza();
$db3->select_db("kolekcija") or die ("$db3->connect_errno - $db3->connect_error");
$delete_query = "DELETE FROM filmovi WHERE id_film =".$_GET[id]."";
	
    if($db3->query($delete_query))
    {
		echo "<br/>Uspješno ste izbrisali film iz baze!<br/>";
		echo "<meta http-equiv='refresh' content='1; url=index.php'>";
	}
	else
	{
		echo "Došlo je do greške.";
	}

?>
