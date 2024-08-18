<?php
require_once('cnx.php');

$sql = "SELECT * FROM client ORDER BY clientID DESC";
$rs_select = $cnx->prepare($sql);
$rs_select->execute();
// RECUPERER LES DONNEES

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL</title>
</head>
<body>
    <p><a href="create.php">Creer un nouveau client</a></p>
    <h3>Liste de mes clients :</h3>

    <?php
    while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <p>[<a href="delete.php?id=<?= $donnees['clientID']; ?>">x</a>]<a href="update.php?id=<?= $donnees['clientID']; ?>"><?= $donnees['prenom']; ?> <?= $donnees['nom']; ?></a></p>
    <?php
    }
    ?>
    


</body>
</html>