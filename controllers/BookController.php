<?php
class BookController
{
	public function index()
	{
		global $mysqli;
		
		// Lees de is's van alle boeken
		$result = mysqli_query($mysqli, "SELECT id from mphp8_boeken ORDER BY id ASC");
		
		// Zijn er boeken gevonden
		if(mysqli_fetch_array($result) > 0)
		{
			// Maak een array van alle boeken
			$boeken = Array();
			
			// Voeg alle boeken toe aan de array
			while ($row = mysqli_fetch_array($result))
			{
				$boeken[] = new Book($row["id"]);
			}
			
			// Toon de lijst
			include "views/booklist.php";
		}
		
		else
		{
			return false;
		}
	}
	
	public function showBook($id)
	{
		//Maak een array van alle informatie
		$informatie = Array();
		
		//Vul de array met informatie
		$informatie[] = new Book($id);
		
		// Toon de informatie
		include "views/showbook.php";
	}
}
?>