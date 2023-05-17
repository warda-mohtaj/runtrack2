<?php
if(isset($_POST['prenom'])){
  $prenom = $_POST['prenom'];

  // Définir le cookie avec une expiration d'une heure (3600 secondes)
  setcookie('prenom', $prenom, time() + 3600, '/');
  
  // Rediriger vers la page principale après la connexion
  header('Location: index.php');
  exit();
}
?>