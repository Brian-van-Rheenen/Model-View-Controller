<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Autolijst</title>
</head>

<body>
</body>

<h1>Autolijst</h1>

<?php
// Zijn er boeken weer te geven?
if(count($autos) > 0)
{
	// Start de tabel
	echo "<table>";
	echo "<tr>";
	echo "<th>Kenteken</th>";
	echo "<th>Merk</th>";
	echo "<th>Type</th>";
	echo "<th>Kleur</th>";
	echo "<th>Bouwjaar</th>";
	echo "<th>Bewerken</th>";
	echo "</tr>";
	
	// Lees alle boeken
	foreach ($autos as $auto)
	{
		echo "<tr>";
		echo "<td>" . $auto->kenteken . "</td>";
		echo "<td>" . $auto->merk . "</td>";
		echo "<td>" . $auto->type . "</td>";
		echo "<td>" . $auto->kleur . "</td>";
		echo "<td>" . $auto->bouwjaar . "</td>";
		echo "<td><a href='index.php?auto=" . $auto->id . "'>Link</a></td>";
		echo "</tr>";
	}
	
	// Sluit de tabel af
	echo "</table>";
}
?>

</html>