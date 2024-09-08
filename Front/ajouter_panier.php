<?php
session_start();
if(!isset($_SESSION['etudiant'])){
  header('location:../signin.php');
}

$id = $_POST['id'];
$qty=$_POST['qty'];
$email_etudiant = $_SESSION['etudiant']['email'];


  if(!isset($_SESSION['panier'][$email_etudiant ])){
    $_SESSION['panier'][$email_etudiant] = [];
  }
  if($qty==0){
    unset($_SESSION['panier'][$email_etudiant][$id]);
    
  }else{
    $_SESSION['panier'][$email_etudiant][$id]= $qty;
  }

  

  header("location:".$_SERVER['HTTP_REFERER']);



  

  



  
    // 'id'=>$id 


?> 