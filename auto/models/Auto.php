<?php
class Auto
{
	public $id = null;
	public $kenteken = "";
	public $merk = "";
	public $type = "";
	public $kleur = "";
	public $bouwjaar = "";
	
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

		//Zoek de auto op in de database
		$result = mysqli_query($mysqli, "SELECT * FROM mphp8_auto WHERE id = {$id}");

		//Is er een auto gevonden
		if (mysqli_num_rows($result) == 1)
		{
			//Lees de data uit het resultaat
			$row = mysqli_fetch_array($result);

			//Sla de data op
			$this->id = $id;
			$this->kenteken = $row['kenteken'];
			$this->merk = $row['merk'];
			$this->type = $row['type'];
			$this->kleur = $row['kleur'];
			$this->bouwjaar = $row['bouwjaar'];
		}
		
		//Als er geen auto gevonden is
		else
		{
			//Laat een error zien
			throw new Exception("Kan de auto met de ID {$id} niet vinden");
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
			//Controleer of dit een nieuw of bestaande auto is
			if (is_null($this->id))
			{
				//Plaats de auto op in de database
				$result = mysqli_query($mysqli, "INSERT INTO `mphp8_auto`(`id`, `kenteken`, `merk`, `type`, `kleur`, `bouwjaar`) VALUES (NULL, '{$this->kenteken}', '{$this->merk}', '{$this->type}' , '{$this->kleur}', '{$this->bouwjaar}')");
				
				$id = $mysqli->insert_id;
				
				$this->id = $id;
				
				//Is er een auto gevonden
				if ($result)
				{
					//Laat een melding zien dat het gelukt is
					echo "Het inserten van de auto is gelukt<br>";
				}
				
				else
				{
					//Laat een melding zien dat het niet gelukt is
					echo "Het inserten van de auto is niet gelukt<br>";
				}
			}
			
			else
			{
				//Update de auto op in de database
				$result = mysqli_query($mysqli, "UPDATE `mphp8_auto` SET `kenteken` = '{$this->kenteken}', `merk` = '{$this->merk}', `type` = '{$this->type}', `kleur` = '{$this->kleur}', `bouwjaar` = '{$this->bouwjaar}' WHERE `id` = '{$this->id}'");
				
				//Is het updaten gelukt?
				if ($result)
				{
					//Laat een melding zien dat het gelukt is
					echo  "Het saven van de auto is gelukt<br>";
				}
				
				else
				{
					//Laat een melding zien dat het niet gelukt is
					echo  "Het saven van de auto is niet gelukt<br>";
				}
			}
		}
	}
}
?>