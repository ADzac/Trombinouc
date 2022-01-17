<?php
try{
	$bd= new PDO ("mysql:host=localhost;dbname=bm016140","bm016140","bm016140b48d");
	$bd->exec('SET NAMES utf8');
}
catch (Exception $e) {
	die ("Erreur: Connexion à la base impossible");
}
?>
