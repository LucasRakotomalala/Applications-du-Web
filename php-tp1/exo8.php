<?php

	# retourne un tableau à deux éléments [ C , N ] où :
	# - C est une chaîne de caractères de la forme
	#   "n1, n2, n3, n4, n5" où n1, n2,..., n5
	#   sont cinq nombres triés croissant tirés au hasard
	#   dans l'intervalle [1, 49]
	# - N un nombre tiré au hasard dans l'intervalle [1, 10]
	function loto() {
		$loto5 = array(); //On définit une liste
		array_push($loto5, rand(1,49)); //On ajoutr déjà un nombre aléatoire dedans
		for ($i=0; $i<4; $i++) { //On fait une boucle pour en ajouter 4 autres
			$add = rand(1,49);
			while (in_array($add, $loto5)) { //Tant que '$add' est déjà dans la liste alors on retire un autre nombre aléatoire
				$add = rand(1,49);
			}
			array_push($loto5, $add); //On ajoute le nombre à la liste car il n'y est pas
		}
		sort($loto5); //On trie la liste de manière croissante
		$affichage  = "Les 5 numéros sont : ";
		for ($indice=0; $indice<sizeof($loto5)-1; $indice++) {
			$affichage  .= $loto5[$indice].", "; //On ajoute les 4 premiers chiffres
		}
		$nbrChance = rand(1,10);
		$affichage .= $loto5[sizeof($loto5)-1]." - Le numéro chance est : ".$nbrChance; //On ajoute le dernier et le numéro chance
		return $affichage;
	}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 8</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>

	<body>
		<h1>TP 1 - Exo 8</h1>
		<hr>
		<h2>Loto Flash</h2>
		<p>
			<?php

			echo loto(); //Affiche des numéros tirés
			
			?>
		</p>
		<p>
			<a class="bouton" href="exo8.php">Un autre Loto Flash</a>
		</p>
	</body>
</html>
