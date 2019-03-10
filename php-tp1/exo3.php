<?php

#NIQUE TA PUTE DE MERE JENS 

	# retourne le code HTML (une chaîne de caractères)
	# d'une table contenant les diviseurs de '$N'
	# (une seule ligne, autant de colonnes que de diviseurs)
	function diviseurs($N) {
		$fdpDeJens = "<table class='exo4'><tr><td>1</td>";
		for ($div = 2; $div<= $N; $div++) {
			if ($N % $div == 0) {
				$fdpDeJens .= "<td>" . $div . "</td>"; //Construction du tableau contenant tous les diviseur de '$N'
			}
		}
		$fdpDeJens.="</tr></table>";
		return $fdpDeJens;
	}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 3</title>
		<meta name="author" content="LP IMApp">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 3</h1>
		<hr>
		<h2>
		<?php

			echo "Les diviseurs de ".$_GET['n']." sont :";

		?>

		</h2>

		<?php

		echo diviseurs($_GET['n']); //Affiche tous les diviseurs

		?>

	</body>
</html>
