<?php
// Définition de la chaîne
$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

// Parcours de la chaîne
for ($i = 0; $i < strlen($str); $i += 2) {
    echo $str[$i];
}
?>
