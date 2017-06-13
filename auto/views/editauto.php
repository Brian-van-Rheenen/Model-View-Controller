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
	echo "<form action='' method='post'>";
	
	
	/*
	// Start de tabel
	echo "<table>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Kenteken</th>";
	echo "<th>Merk</th>";
	echo "<th>Type</th>";
	echo "<th>Kleur</th>";
	echo "<th>Bouwjaar</th>";
	echo "</tr>";
	
	// Lees alle boeken
	foreach ($informatie as $info)
	{
		echo "<tr>";
		echo "<td>" . $info->id . "</td>";
		echo "<td>" . $info->kenteken . "</td>";
		echo "<td>" . $info->merk . "</td>";
		echo "<td>" . $info->type . "</td>";
		echo "<td>" . $info->kleur . "</td>";
		echo "<td>" . $info->bouwjaar . "</td>";
		echo "</tr>";
	}
	
	// Sluit de tabel af
	echo "</table>";*/
}
?>

</html>