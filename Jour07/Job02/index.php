<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Job 2 </title>
</head>
<body>    
<?php

function bonjour($jour){
    if ($jour == true){
        echo "Bonjour";
    }
    else{
        echo "Bonsoir";
    }   
}

bonjour(true);
echo "<br>";
bonjour(false)
?>
</body>
</html>