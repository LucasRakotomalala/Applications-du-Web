<?php

session_start();
$_SESSION['x']=rand(2,10);
$_SESSION['y']=rand(2,10);

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
		<form action="exo11-action.php" method="get">
			<?php 

			echo $_SESSION['x']." x ".$_SESSION['y'];
			
			?>
			= <input type="text" name="resultat" />
			<br><br>
			<input type="submit" value="Vérifier" />
		</form>

	</body>
</html>
