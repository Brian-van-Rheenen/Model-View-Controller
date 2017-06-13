<?php
//Gebruik de Message class
include("Classes/Message.php");

//Maak een nieuw object aan
$bericht = new Message("ondERWerP");

//Zet de inhoud
$bericht->inhoud("Inhoud");

//Laat de properties op het beeld zien
echo $bericht->subject . "<br>";
echo $bericht->text;
?>