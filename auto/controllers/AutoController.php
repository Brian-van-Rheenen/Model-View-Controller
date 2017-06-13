<?php
class AutoController
{
	public function index()
	{
		global $mysqli;
		
		// Lees de is's van alle auto`s
		$result = mysqli_query($mysqli, "SELECT id from mphp8_auto ORDER BY id ASC");
		
		// Zijn er auto`s gevonden
		if(mysqli_num_rows($result) > 0)
		{
			// Maak een array van alle auto`s
			$autos = Array();
			
			// Voeg alle auto`s toe aan de array
			while ($row = mysqli_fetch_array($result))
			{
				$autos[] = new Auto($row["id"]);
			}
			
			// Toon de lijst
			include "views/autolist.php";
		}
		
		else
		{
			return false;
		}
	}
	
	public function editAuto($id)
	{
		//Maak een array van alle informatie
		$informatie = Array();
		
		//Vul de array met informatie
		$informatie[] = new Auto($id);
		
		// Toon de informatie
		include "views/editauto.php";
	}
}
?>