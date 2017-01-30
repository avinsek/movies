<?php

require_once('db.class.php');


class filmovi 
{
	private $baza;
	private $result;
	
	public function __construct()
	{
		$this->baza = new baza();
	}

	public function dohvatiFilmove($slovo)
	{
		$sql="SELECT slika, naslov, godina, trajanje 
		FROM filmovi WHERE naslov LIKE '". $slovo ."%' ORDER BY filmovi.naslov ASC";
		
		$this->result = $this->baza->query($sql);
	}
	
	public function ispisiFilmove()
	{	
		while ($row = $this->result->fetch_array())
		{
			echo '<tr>';
			echo '<td><img src="'.$row[0].'"/></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td align="center"><i>'.$row[1]."	(".$row[2].")".'</i></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td align="center"><i>'."Trajanje:	".$row[3]."	min".'</i></td>';
			echo '</tr>';
		}
	}


	public function dohvatiZanrove()
	{
		$sql1="SELECT naziv FROM zanr";
		$this->result = $this->baza->query($sql1);	
	}
		
	public function ispisiZanrove()
	{
		foreach ($row=$this->result as $zanr)
		{
			foreach ($zanr as $z)
			{
				echo '<option value="'.$z.'">'.$z.'</option>';
			}
		}
	}
		
	public function dohvatiId($id)
	{	
		$sql2="SELECT id FROM zanr WHERE naziv like '". $id ."'";
		return $this->result = $this->baza->query($sql2);	
	}
		
	public function upisiFilmove($naslov,$zanr,$godina,$trajanje,$slika)
	{	
		$sql3="INSERT INTO filmovi (naslov, id_zanr, godina, trajanje, slika) VALUES ('$naslov', $zanr, '$godina', '$trajanje', '$slika')";
		return $this->baza->query($sql3);	
	}
	
	public function dohvatiBazu()
	{	
		$sql4="SELECT * FROM filmovi";
		$this->result=$this->baza->query($sql4);	
	}
	
	public function ispisiBazu()
	{
		while ($ro = $this->result->fetch_array())
		{
			echo '<tr align="center">';
			echo '<td><img src="'.$ro['slika'].'"/></td>';
			echo '	<td>'.$ro['naslov'].'</td>';
			echo '	<td>'.$ro['godina'].'</td>';
			echo '	<td>'.$ro['trajanje']." min".'</td>';
			echo '	<td>[<a href=delete.php?id='.$ro['id_film'].'>obriši</a>]</td>';
			echo '</tr>';	
		}					
		
	}
	
}
?>
