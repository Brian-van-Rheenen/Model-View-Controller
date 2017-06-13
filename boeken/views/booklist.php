<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Boekenlijst</title>
</head>

<body>
</body>

<h1>Boekenlijst</h1>

<?php
// Zijn er boeken weer te geven?
if(count($boeken) > 0)
{
	// Start de tabel
	echo "<table>";
	echo "<tr>";
	echo "<th>Titel</th>";
	echo "<th>Auteur</th>";
	echo "<th>ISBN</th>";
	echo "<th>Details</th>";
	echo "</tr>";
	
	// Lees alle boeken
	foreach ($boeken as $boek)
	{
		echo "<tr>";
		echo "<td>" . $boek->title . "</td>";
		echo "<td>" . $boek->author . "</td>";
		echo "<td>" . $boek->isbn . "</td>";
		echo "<td><a href='index.php?book=" . $boek->id . "'>Link</a></td>";
		echo "</tr>";
	}
	
	// Sluit de tabel af
	echo "</table>";
}
?>

</html>