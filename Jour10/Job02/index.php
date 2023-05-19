<?php

$host = 'localhost'; 
$dbname = 'jour09';
$username = 'root';
$password = 'root';

try {
 
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $query = "SELECT nom, capacite FROM salles";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if (count($result) > 0) {

        echo "<table>";
        echo "<thead><tr>";
        foreach ($result[0] as $key => $value) {
            echo "<th>$key</th>";
        }
        echo "</tr></thead>";
        echo "<tbody>";
        foreach ($result as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Aucun résultat trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>