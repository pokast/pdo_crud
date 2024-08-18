<?php
require_once('cnx.php');

$message = '';

if(isset($_POST['create'])) { // Si le client a cliqué sur lel bouton Insérer - DEBUT
    if((empty($_POST['prenom'])) || (empty($_POST['nom'])) ) {
        $message = '<p class="msgRed">Veuillez remplir tous les champs</p>';

    } else {
        $sql = "INSERT INTO client (prenom,nom) VALUES (?,?)";
        $rs_insert = $cnx->prepare($sql);

        $var_prenom = $_POST['prenom'];
        $var_nom    = $_POST['nom'];

        $rs_insert->bindValue(1,$var_prenom,PDO::PARAM_STR);
        $rs_insert->bindValue(2,$var_nom,PDO::PARAM_STR);

        $rs_insert->execute();
        $message = '<p class="msgGreen">Client bien inséré</p>';
    }
} // Si le client a cliqué sur le bouton Insérer - FIN 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?= $message; ?>

    <form action="" method="post">
        <p><input type="text" name="prenom" placeholder="Votre prenom" /> </p>
        <p><input type="text" name="nom" placeholder="Votre nom" /> </p>

        <p><input type="submit" name="create" value="Inserer" /> </p>

    </form>

    <p><a href="index.php">RETOUR</a></p>

</body>
</html>