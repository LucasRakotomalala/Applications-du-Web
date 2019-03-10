<?php

	# si '$N' est premier, retourne '$N'
	# sinon retourne le plus petit diviseur
	# de '$N'. Par exemple :
	# - premier(13) -> 13
	# - premier(35) -> 5
	function premier($N) {
		$i=2;
		while ($N % $i != 0) {
			$i++; //Tant que le reste n'est pas nul, on incrémente '$i' de 1
		}
		return $i; //Quoi qu'il arrive, on veut la valeur de '$i', qui peut être égale à celle de '$N' ou non
	}

	# retourne une chaîne de caractères du type :
	# - "Le nombre N est premier" si '$N' est premier
	# - "Le nombre N n'est pas premier car multiple de D"
	#   si '$N' est divisible par un nombre D (et donc, pas premier)
	function resultat($N) {
		if ($N==0) {
			return "0 n'est pas premier par définition !";
		}
		elseif (premier($N)!=$N) {
			return "Le nombre ".$N." n'est pas premier car il est divisible par ".premier($N)." !";
		}
		else {
			return "Le nombre ".$N." est premier !";
		}
	}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 4</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 4</h1>
		<hr>
		<h2>
		<?php

		$nombreURL=$_GET['nombre'];
		echo resultat($nombreURL); //Affichage
		
		?>

		</h2>
		<a class="bouton" href="exo4.html">Autre test</a>
	</body>
</html>
