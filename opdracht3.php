<?php
//Lees de config file
require "../config.php";

include "boeken/models/Book.php";

echo "<h2>Boek maken:</h2>";

$boek1 = new Book();

$boek1->title = "Lassie";
$boek1->author = "Dinges";
$boek1->isbn = "123456789";

var_dump($boek1);

echo "<br>";

echo "<h2>Boek lezen uit de database:</h2>";

$boek2 = new Book(2);

var_dump($boek2);

echo "<br>";

echo "<h2>Boek maken en opslaan in de database:</h2>";

$boek3 = new Book();

$boek3->title = "Titeltest";
$boek3->author = "Authortest";
$boek3->isbn = "3454346745";
$boek3->save();

echo "<br>";

var_dump($boek3);

echo "<br>";

echo "<h2>Boek updaten en opslaan in de database:</h2>";

$boek4 = new Book(3);
$boek4->title = "Nieuwe titel";
$boek4->author = "Nieuwe author";
$boek4->isbn = "856865775";
$boek4->save();

echo "<br>";

var_dump($boek4);

echo "<br>";
?>