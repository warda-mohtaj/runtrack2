<?php

if(isset($_COOKIE['nbvisites'])) {
    if(isset($_POST['reset'])) {
        setcookie('nbvisites', 0, time() - 3600); // le cookie est supprimé en définissant le temps d'expiration dans le passé
        $nbvisites = 0;
    } else {
        $nbvisites = $_COOKIE['nbvisites'] + 1;
    }
} else {
    $nbvisites = 1;
}

setcookie('nbvisites', $nbvisites, time() + 3600 * 24 * 30); // le cookie expire dans 30 jours

echo "Le nombre de visites est : ".$nbvisites;

?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Job 2 </title>
</head>
<body>

<form method="POST">
    <input type="hidden" name="reset" value="True">
    <input type="submit" value="reset">
</form>
    
</body>
</html>