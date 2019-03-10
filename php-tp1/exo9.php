<?php

	# retourne la chaîne '$s' normalisée
	# (toutes les lettres en minuscule sauf la première)
	function normalize($s) {
    	$s = strtolower($s); //Mets toute la chaîne en minuscule
    	$s = ucfirst($s); //Mets la 1ère lettre de la chaîne en majuscule
    	$s = trim($s); //Supprime les caractères invisibles en début et fin de chaîne

    	return $s;
		
	}
	
	# Teste si les prénom et nom sont bien renseignés et
	# retourne le tableau des messages d'erreurs
	# (tableau vide s'il n'y a pas d'erreur)
	function check_input() {
		$errors = array(); //Initialise un tableau
		if (empty($_GET['prenom'])) { //Si le paramètre 'prenom' est vide
			array_push($errors, "Prénom manquant"); //Ajout d'une chaîne de caractères au tableau
		}
		if (empty($_GET['nom'])) { //Si le paramètre 'nom' est vide
			array_push($errors, "Nom manquant"); //Ajout d'une chaîne de caractères au tableau
		}
		return $errors;
	}
	
	# retourne le code HTML (une chaîne de caractères) 
	# d'une liste "<ul><li>..</li>..</ul>", les
	# éléments de liste contenant les erreurs
	# contenues dans le tableau '$errors' 
	function display_errors($errors) {
		$display = "<ul>\n";
		for ($indice=0; $indice<sizeof($errors); $indice++) {
			$display  .= "<li>".$errors[$indice]."</li>\n"; //Affiche toutes les erreurs possibles du tableau
		}
		$display .= "</ul>\n";
		return $display;
	}
	
	# retourne le code HTML (une chaîne de caractères) 
	# d'un heading "<h2>...</h2>" contenant le message
	# de bienvenu en anglais
	function display_welcome($heure,$civilite,$prenom,$nom) {
		$display = "<h2>";
		if ($heure >= 0 && $heure < 12) {
			$display .= "Good morning ";
		}

		elseif ($heure >= 12 && $heure < 18) {
			$display .= "Good afternoon ";
		}

		else {
			$display .= "Good evening ";
		}

		$display .= $civilite." ".normalize($prenom)." ".normalize($nom).", welcome to Polytech!</h2>\n";
		return $display;
	}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 9</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 9</h1>
		<hr>
		<?php

 		$heure = date("G");
 		if (sizeof(check_input()) == 0) { //S'il n'y a pas d'erreurs
 			echo display_welcome($heure, $_GET['civilite'], $_GET['prenom'], $_GET['nom']);
 		}
 		else {
 			echo display_errors(check_input()); //Sinon affiche les erreurs
 		}

		?>
	</body>
</html>
