<?php
session_start();
$x = $_SESSION["x"];
$y = $_SESSION["y"];

function resultat($x, $y, $user) {
    if (($res = $x * $y) == $user) {
        return "Bravo, vous avez raison, $x x $y = $res !";
    } else { // Mauvais résultat
        return "Faux ! $x x $y = $res, et non $user !";
    }
    session_unset(); session_destroy(); session_regenerate_id(true);

}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>TP 3 - Exo 1</title>
        <meta name="author" content="Marc Gaetano">
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <link rel="stylesheet" href="../css/tp3.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>TP 3 - Exo 1</h1>
        <hr>

        <h2>Multiplication</h2>
        <p>
            <?php
echo resultat($x, $y, $_GET["utilisateur"]);
            ?>
        </p>
        <p>
            <a href="formulaire.php">Autre multiplication</a>
        </p>
    </body>
</html>
