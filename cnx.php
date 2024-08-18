<?php

$dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
$user = 'root';
$pass = '';

try {
	$cnx = new PDO($dsn, $user, $pass);
	$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
} catch(PDOException $e) {

echo 'Un erreur est survenue !';
}
