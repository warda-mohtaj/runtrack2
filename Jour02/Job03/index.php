<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$i = 0;
while ($i <= 100) {
    if ($i == 42) {
        echo "La Plateforme_<br>";
    } elseif ($i >= 0 && $i <= 20) {
        echo "<i>$i</i><br>";
    } elseif ($i >= 25 && $i <= 50) {
        echo "<u>$i</u><br>";
    } else {
        echo "$i<br>";
    }
    $i++;
}



?>

    
</body>
</html>