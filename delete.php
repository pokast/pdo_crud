<?php
require_once('cnx.php');

$message = '';
if(isset($_GET['id'])) {

$sql = "DELETE FROM client WHERE clientID = ?";

$rs_sup = $cnx->prepare($sql);

$var_clientID = $_GET['id'];

$rs_sup->execute(array($var_clientID));

$message = '<p class="msgGreen">Client supprimé</p>';

} else {
    $message = '<p class="msgRed">Une erreur est survenue</p>';

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?= $message; ?>

<p><a href="index.php">RETOUR</a></p>

</body>
</html>