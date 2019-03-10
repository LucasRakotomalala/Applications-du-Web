<?php

	# retourne le nom du jour de la semaine
	# correspondant à '$week', le  numéro du
	# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
	function jour($week) {
		$jour = [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ];
		return $jour[$week];	
		
	}

	# retourne le nom du mois correspondant à '$month',
	# le  numéro du mois (1 -> janvier, 2 -> février, ...)
	function mois($month) {
		$mois = [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ];
		return $mois[$month-1]; //Les mois allant de 1 à 12, on doit retirer 1 pour afficher le mois correct
	}
	
	$day = date("j");
	$jour = jour(date("w"));
	$mois = mois(date("n"));
	$year = date("Y");
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 7</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 7</h1>
		<hr>
		<h2>
		<?php

		echo "Nous sommes le ".$jour." ".$day." ".$mois." ".$year;

		?>

		</h2>
	</body>		
</html>
