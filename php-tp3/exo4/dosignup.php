<?php

// à compléter
// Ce script vérifie les paramètres envoyés par l'utilisateur
// et, si ces paramètres sont corrects, réalise le signup puis
// redirige l'utilisateur vers le script "signin.php",
// sinon, redirige directement l'utilisateur vers le script
// "signin.php" avec le bon message d'erreur en paramètre

function array_to_csv($data) {
    $csv = "";
    foreach ($data as $key => $value) {
        $csv .= "$key,$value\n";
    }
    return $csv;
}

function extract_csv_data($file) {
    $data = [];
    foreach (file($file, FILE_IGNORE_NEW_LINES) as $line) {
        $tokens = explode(",", $line);
        $data[trim($tokens[0])] = trim($tokens[1]);
    }
    return $data;
}

if (isset($_POST["login"]) AND isset($_POST["password1"]) AND isset($_POST["password2"])) {
    $login = $_POST["login"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $data = extract_csv_data("users.csv");
    //echo ctype_alpha($login);
    //print($login);

    if (ctype_alpha($login)) {
        if (!array_key_exists($login, $data)) {
            if (strlen($password1) >= 4) {
                if ($password1 == $password2) {
                    $data[$login] = md5($password2);
                    file_put_contents("users.csv", array_to_csv($data));
                    header("Location: signin.php");
                    exit();
                }
                else {
                    $error = 4;
                }
            }
            else {
                $error = 3;
            }
        }
        else {
            $error = 2;
        }
    }
    else {
        $error = 1;
    }
    
    if (isset($error)) {
        header("Location: signup.php?badsignup=".$error);
        exit();
    }
}
else {
    header("Location: signup.php");
    exit();
}

// - si le paramètre vaut 1 : "le login ne contient pas que des lettres"
// - si le paramètre vaut 2 : "le login est déjà utilisé"
// - si la paramètre vaut 3 : "le mot de passe a moins de 4 caractères"
// - si la paramètre vaut 4 : "le mot de passe et la vérification sont différents"
?>

