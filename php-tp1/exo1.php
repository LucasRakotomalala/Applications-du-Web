<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 1</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 1</h1>
		<hr>
		<?php

		$heure=date("H"); //Heures
		$min=date("i"); //Minutes
		$sec=date("s"); //Secondes

		$affichage = "Il est ".$heure." heure(s), ".$min." minute(s) et ".$sec." seconde(s).";

		?>

		<h2><?php

			echo $affichage //Affiche l'heure 
			
			?>
		</h2>
	</body>
</html>
