<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Details</title>
</head>

<body>
</body>

<h1>Details</h1>

<?php
// Zijn er boeken weer te geven?
if(count($informatie) > 0)
{
	// Start de tabel
	echo "<table>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Titel</th>";
	echo "<th>Auteur</th>";
	echo "<th>ISBN</th>";
	echo "</tr>";
	
	// Lees alle boeken
	foreach ($informatie as $info)
	{
		echo "<tr>";
		echo "<td>" . $info->id . "</td>";
		echo "<td>" . $info->title . "</td>";
		echo "<td>" . $info->author . "</td>";
		echo "<td>" . $info->isbn . "</td>";
		echo "</tr>";
	}
	
	// Sluit de tabel af
	echo "</table>";
}
?>

</html>