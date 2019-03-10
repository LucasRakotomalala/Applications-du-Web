<?php

	# retourne le nom du jour de la semaine
	# correspondant à '$week', le  numéro du
	# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
	function jour($week) {
		switch ($week) {
			case "1":
				return $week = "Lundi";
				break;
			case "2":
				return $week = "Mardi";
				break;
			case "3":
				return $week = "Mercredi";
				break;
			case "4":
				return $week = "Jeudi";
				break;
			case "5":
				return $week = "Vendredi";
				break;
			case "6":
				return $week = "Samedi";
				break;
			default:
				return $week = "Dimanche";
				break;
		}

	}

	# retourne le nom du mois correspondant à '$month',
	# le  numéro du mois (1 -> janvier, 2 -> février, ...)
	function mois($month) {
		switch ($month) {
			case "1":
				return $month = "Janvier";
				break;
			case "2":
				return $month = "Février";
				break;
			case "3":
				return $month = "Mars";
				break;
			case "4":
				return $month = "Avril";
				break;
			case "5":
				return $month = "Mai";
				break;
			case "6":
				return $month = "Juin";
				break;
			case "7":
				return $month = "Juillet";
				break;
			case "8":
				return $month = "Août";
				break;
			case "9":
				return $month = "Septembre";
				break;
			case "10":
				return $month = "Octobre";
				break;
			case "11":
				return $month = "Novembre";
				break;
			default:
				return $month = "Décembre";
				break;
		}

	}

$date = "Nous sommes le ".jour(date("w"))." ".date("d")." ".mois(date("m"))." ".date("Y")." !";

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 2</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 2</h1>
		<hr>
		<h2>
			<?php

			echo $date
			
			?>

		</h2>
	</body>
</html>
