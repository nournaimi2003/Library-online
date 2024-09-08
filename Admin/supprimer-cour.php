<?php

require_once 'conx.php';
$id = $_GET['id'];
$sqlstate = $pdo->prepare(query:'DELETE FROM cours WHERE id=?' );
$sqlstate->execute([$id]);
header('location: cour.php');

?>
