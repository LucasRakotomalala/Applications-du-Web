<?php

	include("exo1.inc.php");
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 2 - Exo 1</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp2.css">
	</head>
	<body>
		<h1>TP 2 - Exo 1</h1>
		<hr>
		
		<form action="exo1-action.php" method="get">
			Choisissez la langue :
<?php
				echo makeRadio($LANGUE,"langue");
?>
			<input type="submit" value="Afficher la date">
		</form>
	</body>
</html>
