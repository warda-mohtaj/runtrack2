<?php
session_start();

// Vérifie si une partie est en cours
if (!isset($_SESSION['grid']) || !isset($_SESSION['player'])) {
    // Initialise une nouvelle partie
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['player'] = 'X';
}

// Fonction pour réinitialiser la partie
function resetGame()
{
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['player'] = 'X';
}

// Fonction pour vérifier si un joueur a gagné
function checkWinner($player)
{
    $grid = $_SESSION['grid'];

    // Vérification des lignes
    for ($i = 0; $i < 3; $i++) {
        if ($grid[$i][0] == $player && $grid[$i][1] == $player && $grid[$i][2] == $player) {
            return true;
        }
    }

    // Vérification des colonnes
    for ($j = 0; $j < 3; $j++) {
        if ($grid[0][$j] == $player && $grid[1][$j] == $player && $grid[2][$j] == $player) {
            return true;
        }
    }

    // Vérification des diagonales
    if (($grid[0][0] == $player && $grid[1][1] == $player && $grid[2][2] == $player) ||
        ($grid[0][2] == $player && $grid[1][1] == $player && $grid[2][0] == $player)) {
        return true;
    }

    return false;
}

// Traitement du clic sur une case
if (isset($_POST['row']) && isset($_POST['col'])) {
    $row = $_POST['row'];
    $col = $_POST['col'];

    $grid = $_SESSION['grid'];

    // Vérifie si la case est vide
    if ($grid[$row][$col] == '-') {
        // Remplace la case vide par le symbole du joueur actuel
        $grid[$row][$col] = $_SESSION['player'];

        $_SESSION['grid'] = $grid;

        // Vérifie si le joueur a gagné
        if (checkWinner($_SESSION['player'])) {
            echo $_SESSION['player'] . ' a gagné !';

            // Réinitialise la partie
            resetGame();
        } else {
            $full = true;

            // Vérifie si toutes les cases ont été cliquées
            foreach ($grid as $row) {
                if (in_array('-', $row)) {
                    $full = false;
                    break;
                }
            }

            if ($full) {
                echo 'Match nul !';

                // Réinitialise la partie
                resetGame();
            }
        }

        // Passe au joueur suivant
        $_SESSION['player'] = ($_SESSION['player'] == 'X') ? 'O' : 'X';
    }
}

// Traitement du clic sur le bouton "Réinitialiser la partie"
if (isset($_POST['reset'])) {
    resetGame();
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Jeu du Morpion</title>
</head>
<body>
    <h1>Jeu du Morpion</h1>

    <table>
        <?php foreach ($_SESSION['grid'] as $row => $cols) { ?>
            <tr>
                <?php foreach ($cols as $col => $value) { ?>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="row" value="<?php echo $row; ?>">
                            <input type="hidden" name="col" value="<?php echo $col; ?>">
                            <?php if ($value == '-') { ?>
                                <input type="submit" name="submit" value="-">
                            <?php } else { ?>
                                <?php echo $value; ?>
                            <?php } ?>
                        </form>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <form method="POST" action="">
        <input type="submit" name="reset" value="Réinitialiser la partie">
    </form>
</body>
</html>