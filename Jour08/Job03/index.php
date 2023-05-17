<?php
session_start(); // Démarrer la session

// Vérifier si le bouton "Envoyer" a été cliqué
if (isset($_POST['prenom'])) {
    $prenom = $_POST['prenom']; // Récupérer le prénom depuis le formulaire

    // Ajouter le prénom à la variable de session
    $_SESSION['prenoms'][] = $prenom;
}

// Vérifier si le bouton "Reset" a été cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser la variable de session
    $_SESSION['prenoms'] = [];
}

// Afficher tous les prénoms enregistrés dans la variable de session
if (isset($_SESSION['prenoms'])) {
    echo "Liste des prénoms :";
    echo "<ul>";
    foreach ($_SESSION['prenoms'] as $prenom) {
        echo "<li>" . $prenom . "</li>";
    }
    echo "</ul>";
} else {
    echo "Aucun prénom enregistré.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Job 3 </title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom">
        <input type="submit" value="Envoyer">
        <input type="submit" name="reset" value="Reset">
    </form>
</body>
</html>