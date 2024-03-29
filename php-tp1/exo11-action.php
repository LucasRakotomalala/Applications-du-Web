<?php

	# retourne une chaîne de caractères indiquant
	# le résultat, où '$x' et '$y' sont les nombres
	# dont il fallait deviner la valeur du produit
	# et '$user' la valeur proposée par l'utilisateur
	function resultat($x,$y,$user) {
		$res = $x * $y;
		if ($res==$user) {
			return "Bravo, vous avez raison, ".$x." x ".$y." = ".$res." !";
		}
		else {
			return "Faux : ".$x." x ".$y." = ".$res." et non ".$user." !";
		}
	}
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 11</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 11</h1>
		<hr>
		<p>
			<?php

			session_start();
			$x = $_SESSION['x'];
			$y = $_SESSION['y'];
			$resultatURL = $_GET['resultat'];
			echo resultat($x, $y, $resultatURL);

			?>
		</p>
		<p>
			<a class="bouton" href="exo11-formulaire.php">Autre multiplication</a>
		</p>
	</body>
</html>
