<?php
session_start();
if(!isset($_SESSION['etudiant'])){
  header('location:../signin.php');
}

$email_etudiant = $_SESSION['etudiant']['email'];
$id = $_POST['id'];
unset($_SESSION['panier'][$email_etudiant][$id]);
header("location:".$_SERVER['HTTP_REFERER']);





?> 