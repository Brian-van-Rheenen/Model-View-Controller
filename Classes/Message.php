<?php
class Message
{
	//Properties
	public $subject;
	public $text;
	
	public function __construct($onderwerp)
	{
		//Zet het onderwerp naar het meegestuurde onderwerp
		$this->subject = $this->clean($onderwerp);
	}
	
	public function clean($onderwerp)
	{
		//Zet alles naar kleine letters
		$onderwerp = strtolower($onderwerp);
		
		//Zet het eerste karakter in de string naar een hoofdletter
		$onderwerp = ucfirst($onderwerp);
		
		//Als de string langer is dan 32 karakters
		if (strlen($onderwerp) > 32)
		{
			//Maak de string 32 karakters
			$onderwerp = mb_strimwidth($onderwerp, 0, 32);
		}
		
		//Geef het onderwerp terug
		return $onderwerp;
	}
	
	public function inhoud($inhoud)
	{
		//Zet de tekst naar de meegestuurde inhoud
		$this->text = $inhoud;
	}
}
?>