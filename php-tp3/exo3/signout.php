<?php
session_unset();
session_destroy();
session_regenerate_id(true);
header("Location: signin.php");
exit();
// à compléter
// dans cette partie, on détruit la session
// et on redirige l'utilisateur vers la page de login
?>
