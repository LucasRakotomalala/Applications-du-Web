<?php
	include("exo6.inc.php");
	
    // à compléter
    
    update_student_array($STUDENT_FILE,$_GET['id'], $_GET['prenom'], $_GET['nom']);
    update_score_array($SCORE_FILE, $_GET['id'], $_GET['score1'], $_GET['score2'], $_GET['score3']);
    
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 2 - Exo 6</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/tp2.css">
	</head>
	<body>
        <h1>TP 2 - Exo 6</h1>
        <hr>

		<h2>Modification(s) effectuée(s)</h2>
		<a class="bouton" href="exo6-formulaire.html">Nouvelle recherche</a>
	</body>
</html>
