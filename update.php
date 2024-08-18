<?php
require_once('cnx.php');

$message = '';

if(isset($_POST['modif'])) {
    $sql2 = "UPDATE client SET prenom = ?, nom = ? WHERE clientID = ?";

    $rs_modif = $cnx->prepare($sql2);

    $var_prenom     = $_POST['prenom'];
    $var_nom        = $_POST['nom'];
    $var_clientID   = $_POST['clientID'];

    $rs_modif->bindValue(1,$var_prenom,PDO::PARAM_STR);
    $rs_modif->bindValue(2,$var_nom,PDO::PARAM_STR);
    $rs_modif->bindValue(3,$var_clientID,PDO::PARAM_INT);

    $rs_modif->execute();

    $message = '<p class="msgGreen">Client modifié</p>';
}

if(isset($_GET['id'])) {

    $sql = "SELECT * FROM client WHERE clientID = ?";
    
    $rs_select = $cnx->prepare($sql);
    
    $var_clientID = $_GET['id'];
    
    $rs_select->bindValue(1,$var_clientID,PDO::PARAM_INT);
    $rs_select->execute();
    
    $donnees = $rs_select->fetch(PDO::FETCH_ASSOC);
    $prenom = $donnees['prenom'];
    $nom    = $donnees['nom'];
    } else {
        $prenom = '';
        $nom    = '';
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
    
<form action="" method="post">
        <p><input type="text" name="prenom" value="<?= $prenom; ?>" /> </p>
        <p><input type="text" name="nom" value="<?= $nom; ?>" /> </p>
        <input type="hidden" name="clientID" value="<?= $_GET['id']; ?>">

        <p><input type="submit" name="modif" value="Modifier" /></p>

    </form>

    <p><a href="index.php">RETOUR</a></p>

</body>
</html>