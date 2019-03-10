<?php

	# retourne le code HTML (une chaîne de caractères)
	# d'une table '$n'x'$n' représentant un échiquier
	# alternant cases blanches et noires
	function table($n) {
		$table = "<table class='exo7'>  <tr>\n";
		for($k=0; $k<$n; $k++) {
			if ($k%2 == 0) {
				for($i=0; $i<$n; $i++) {
					if ($i % 2 == 0) {
						$table.="<td class='noir'></td>\n";
					}
					else {
						$table.="<td class='blanc'></td>\n";
					}
				}
			}
			else {
				for($i=0; $i<$n; $i++) {
					if ($i % 2 == 0) {
						$table.="<td class='blanc'></td>\n";
					}
					else {
						$table.="<td class='noir'></td>\n";
					}
				}
			}
			$table.="<tr>\n";
		}
		$table .= "</table>";
		return $table;
	}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 6</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 6</h1>
		<hr>
		<h2>
		<?php

		if (isset($_GET['taille'])) {
			echo "Échiquier ".$_GET['taille']."x".$_GET['taille'];
		}
		else {
			echo "Échiquier 8x8"; 
		}
		?></h2>
		<?php
		if (isset($_GET['taille'])) { //Si le paramètre existe alors on fait l'échiquier de la taille demandé
			echo table($_GET['taille']);
		}
		else {
			echo table(8); //Sinon on en fait un de taille 8
		}

		?>
		
	</body>
</html>
