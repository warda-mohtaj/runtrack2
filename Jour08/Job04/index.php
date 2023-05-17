<!DOCTYPE html>
<html>
<head>
  <title> Job 4 </title>
</head>
<body>

<?php
// Vérifier si le cookie existe
if(isset($_COOKIE['prenom'])){
  $prenom = $_COOKIE['prenom'];
  echo "Bonjour $prenom !";
  echo '<br>';
  echo '<button onclick="deconnexion()">Déconnexion</button>';
} else {
  // Afficher le formulaire de connexion
  echo '
  <form action="traitement.php" method="post">
    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" required>
    <input type="submit" value="Connexion">
  </form>';
}
?>

<script>
  // Fonction de déconnexion
  function deconnexion() {
    document.cookie = "prenom=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    location.reload();
  }
</script>

</body>
</html>