<?php

require_once 'conx.php';
$id = $_GET['id'];
$sqlstate = $pdo->prepare(query:'DELETE FROM commande WHERE id=?' );
$sqlstate->execute([$id]);
header('location: commande.php');

?>



