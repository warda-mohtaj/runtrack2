<?php

$host = 'localhost'; 
$dbname = 'jour09';
$username = 'root';
$password = 'root';

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $query = "SELECT COUNT(*) AS nb_etudiants FROM étudiants";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {

        echo "<table>";
        echo "<thead><tr>";
        echo "<th>nb_etudiants</th>";
        echo "</tr></thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>{$result['nb_etudiants']}</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Aucun résultat trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>