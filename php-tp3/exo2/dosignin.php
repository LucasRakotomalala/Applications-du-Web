<?php
session_start();

function extract_csv_data($file) {
    $data = [];
    foreach (file($file, FILE_IGNORE_NEW_LINES) as $line) {
        $tokens = explode(",", $line);
        $data[trim($tokens[0])] = trim($tokens[1]);
    }
    return $data;
}

if (isset($_POST["login"]) && isset($_POST["password"])) {
    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);
    $list = extract_csv_data("users.csv");
    //print_r ($list);
    if (array_key_exists($login, $list)) {
        //echo $login;
        //echo $list[$login];
        if ($password == $list[$login]) {
            $_SESSION["username"] = $login;
        }
    }
}

if (!isset($_SESSION["username"])) {
    header("Location: signin.php");
    exit();
}
else {
    header("Location: page1.php");
    exit();
}

// à compléter
// Dans cette partie, on teste le login et le mot de passe :
// - on teste si le login proposé existe bien 
// - on teste si le mot de passe correspond
// En cas de succès, on redirige l'utilisateur vers page1.php
// En cas d'échec, on redirige l'utilisateur vers la page de login
?>
