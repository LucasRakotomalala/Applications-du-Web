<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 12 (Méthode POST)</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 12 (Méthode POST)</h1>
		<hr>
		<?php

		session_start();
		$_SESSION['essais']=0;

			if (empty($_POST['proposition'])) {
				$_SESSION['secret']=rand(1,100);
				echo "<h3>Je pense à un nombre compris entre 1 et 100... à vous de le deviner !</h3>\n";
				echo "<form class='exo10' method='POST'>
		  				Votre proposition : <input type='text' name='proposition'>
		  				<input type='hidden' name='essais' value='".$_SESSION['essais']."'>
		  				<input type='hidden' name='secret' value='".$_SESSION['secret']."'>
		  				<input type='submit' value='Vérifier'>
						</form>";
			}

			else {

				if ($_POST['proposition'] > $_SESSION['secret']) {
					$_POST['essais'] ++;
					echo "<h2>Vous proposez ".$_POST['proposition']." :</h2>\n";
					echo "<h3>Trop grand, essayez encore...</h3>\n";
					echo "<form class='exo10' method='POST'>
			 			Votre proposition : <input type='text' name='proposition'>
			 			<input type='hidden' name='essais' value='".$_POST['essais']."'>
			  			<input type='hidden' name='secret' value='".$_SESSION['secret']."'>
			 			<input type='submit' value='Vérifier'>
						</form>";
				}

				if ($_POST['proposition'] < $_SESSION['secret']) {
					$_POST['essais']++;
					echo "<h2>Vous proposez ".$_POST['proposition']." :</h2>\n";
					echo "<h3>Trop petit, essayez encore...</h3>\n";
					echo "<form class='exo10' method='POST'>
			  			Votre proposition : <input type='text' name='proposition'>
			  			<input type='hidden' name='essais' value='".$_POST['essais']."'>
			  			<input type='hidden' name='secret' value='".$_SESSION['secret']."'>
			  			<input type='submit' value='Vérifier'>
						</form>";
				}

				if ($_POST['proposition'] == $_SESSION['secret']) {
					$_POST['essais']++;
					echo "<h2>Vous proposez ".$_POST['proposition']." :</h2>\n";
					echo "<h3>Bravo, vous avez trouvé en ".$_POST['essais']." essai(s) !</h3>
						<a class='bouton' href='exo12-POST.php'>Autre partie</a>	</body>";
				}
			}

		?>
	</body>
</html>