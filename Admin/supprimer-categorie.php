<?php

require_once 'conx.php';
$id = $_GET['id'];
$sqlstate = $pdo->prepare(query:'DELETE FROM categories WHERE id=?' );
$sqlstate->execute([$id]);
header('location: categorie.php');

?>