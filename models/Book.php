<?php
class Book
{
	public $id = null;
	public $title = "";
	public $author = "";
	public $isbn = "";
	
	public function __construct($id = null)
	{
		//Is er een paramenter ingevuld
		if (!is_null($id))
		{
			//Laad de data uit de database
			$this->load($id);
		}
	}
	
	private function load($id)
	{
		global $mysqli;

		//Zoek het boek op in de database
		$result = mysqli_query($mysqli, "SELECT * FROM mphp8_boeken WHERE id = {$id}");

		//Is er een boek gevonden
		if (mysqli_num_rows($result) == 1)
		{
			//Lees de data uit het resultaat
			$row = mysqli_fetch_array($result);

			//Sla de data op
			$this->id = $id;
			$this->title = $row['title'];
			$this->author = $row['author'];
			$this->isbn = $row['isbn'];
		}
		
		//Als er geen boek gevonden is
		else
		{
			//Laat een error zien
			throw new Exception("Kan het boek met de ID {$id} niet vinden");
		}
	}
	
	public function save()
	{
		global $mysqli;
		
		//Schoon de tekstdata op
		$this->title = htmlentities(html_entity_decode($this->title, ENT_QUOTES), ENT_QUOTES);
		$this->author = htmlentities(html_entity_decode($this->author, ENT_QUOTES), ENT_QUOTES);
		
		//Controleer of alle gegevens aanwezig zijn
		if (strlen($this->title) > 0 && strlen($this->author) > 0 && strlen($this->isbn) > 0)
		{
			//Controleer of dit een nieuw of bestaand boek is
			if (is_null($this->id))
			{
				//Plaats het boek op in de database
				$result = mysqli_query($mysqli, "INSERT INTO `mphp8_boeken`(`id`, `title`, `author`, `isbn`) VALUES (NULL, '{$this->title}', '{$this->author}' ,'{$this->isbn}')");
				
				$id = $mysqli->insert_id;
				
				$this->id = $id;
				
				//Is er een boek gevonden
				if ($result)
				{
					//Laat een melding zien dat het gelukt is
					echo "Het inserten van het boek is gelukt<br>";
				}
				
				else
				{
					//Laat een melding zien dat het niet gelukt is
					echo "Het inserten van het boek is niet gelukt<br>";
				}
			}
			
			else
			{
				//Update het boek op in de database
				$result = mysqli_query($mysqli, "UPDATE `mphp8_boeken` SET `title` = '{$this->title}', `author` = '{$this->author}', `isbn` = '{$this->isbn}' WHERE `id` = '{$this->id}'");
				
				//Is het updaten gelukt?
				if ($result)
				{
					//Laat een melding zien dat het gelukt is
					echo  "Het saven van het boek is gelukt<br>";
				}
				
				else
				{
					//Laat een melding zien dat het niet gelukt is
					echo  "Het saven van het boek is niet gelukt<br>";
				}
			}
		}
	}
}
?>