<?php

require_once 'conx.php';
$id = $_GET['id'];
$sqlstate = $pdo->prepare(query:'DELETE FROM ligne_commande WHERE id=?' );
$sqlstate->execute([$id]);
header('location: listecommande.php');

?>