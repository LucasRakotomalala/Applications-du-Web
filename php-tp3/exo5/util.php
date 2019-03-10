<?php

// Etant donnés la langue ($lang qui vaut "fr", "en" ou "it")
// et la page ($page qui vaut "index", "products" ou "contact")
// cette fonction retourne un tableau associatif contenant tous
// les couples (clef,information) contenus dans le fichier
// correspondant

function get_content($lang, $page) {
    $content = [];
    foreach (file($lang."/".$page.".txt") as $line) {
        $tokens = explode("#", $line);
        $data = explode(";", trim($tokens[1]));
        if (count($data) > 1) {
            $content[trim($tokens[0])] = $data;
        } else {
            $content[trim($tokens[0])] = trim($tokens[1]);
        }
    }
    return $content;
}


// à compléter
// Dans cette partie, il faut
// - démarrer/reprendre une session
// - stocker dans le tableau $_SESSION
//   la langue
// Par défaut, la langue est le français

session_start();

if (isset($_GET["lang"])) {
    $_SESSION["lang"] = $_GET["lang"];
}
elseif (!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = "fr";
}

?>
