<?php

    # retourne le code HTML (une chaîne de caractères)
    # correspondant à un élément SELECT dont l'attribut
    # 'name' vaut '$name' et contenant '$max' éléments
    # OPTION
	function select($name,$max) {
		//Je n'ai pas compris ce que devait faire cette fonction
	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 10 - HTML</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 10 - HTML</h1>
		<hr>
		<form action="exo10.php" method="get">
			Jour :

			<?php

			$display = "<select name='jour'>\n";
			for ($jour=1; $jour<=31; $jour ++) {
				$display .= "<option value='".$jour."'>".$jour."</option>\n";
			}
			$display.= "</select>\n";
			echo $display;

			?>

			<br><br>
			Mois : 
			
			<?php

			$display = "<select name='mois'>\n";
			for ($mois=1; $mois<=12; $mois ++) {
				$display .= "<option value='".$mois."'>".$mois."</option>\n";
			}
			$display.= "</select>\n";
			echo $display;

			?>

			<br><br>			
			Année : <input type="text" name="annee" />
			<br><br>
			<input type="submit" value="Envoyer" />
		</form>
	</body>
</html>
