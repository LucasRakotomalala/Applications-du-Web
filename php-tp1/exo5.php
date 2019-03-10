<?php

	# retourne le code HTML (une chaîne de caractères)
	# d'une table 10x10 contenant les 10 tables de
	# multiplication
	function table() {
		$table = "<table class='exo6'>\n";
		for($i=1; $i<11; $i++){
			$table .= "<tr>\n";
			for ($k=1; $k<11; $k++){
				$table .= "<td><strong>".$i."</strong> x ".$k." = ".$i*$k."</td>\n"; //Construction du tableau
			}
			$table .= "</tr>\n";
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
		<title>TP 1 - Exo 5</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 5</h1>
		<hr>
		<?php

		echo table(); //Affichage de la table de multiplication de 10
		
		?>
		
	</body>
</html>
