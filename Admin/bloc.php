<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
  
  <title>Document</title>
</head>
<body>
<?php
 require_once 'conx.php';
  session_start();
  $connecte = false;
  if(isset($_SESSION['admin'])){
    $connecte = true;
   }

  if (isset($_SESSION['admin'])){
    include
  'include/function.php';
  }

  ?>
  <?php
  if(!isset($_SESSION['admin'])){
    header('location: loginadmin.php');
  }
   ?>

  <div class="blocsash">
  
    <div class="bloclink">
      
      <img src="include/image/logo.png" alt=""><br><br><br>
          <a class="nav-link " href="bloc.php"><i class="fa-solid fa-house fa-lg"></i> Home
          </a><br>
          <?php
        if($connecte){
          ?>
          <a class="nav-link" href="categorie.php"><i class="fa-solid fa-layer-group fa-lg" ></i> Categories</a><br>
          <a class="nav-link" href="cour.php"><i class="fa-solid fa-book fa-lg"></i> Livres</a><br>
          <a class="nav-link" href="visit.php"><i class="fa-solid fa-users fa-lg  "></i> Visiteur</a><br>
          <a class="nav-link" href="commande.php"><i class="fa-brands fa-shopify fa-lg" ></i> Commandes</a><br>
          <a class="nav-link" href="deconnexionuser.php"><i class="fa-solid fa-arrow-up-from-bracket fa-lg" ></i>   Deconnexion</a>
          <?php
        }else {
          ?>
          
          <a class="nav-link " a href="loginadmin.php"">Sign In</a>
        
          <?php
        }
        ?>
    </div>
    <div class="cont" >
    <div class="container home-stat text-center">
    <div class="row">
    <div class="col-md-3">
    <div class="back1">
    <div class=" stat stat-categorie">
      <i class="fa-solid fa-layer-group fa-xl"></i>
        <div class="info">
        Total catégories
        <span id="id1"> <a href="categorie.php"><?php echo countCategorie('id', 'categories') ?></a></span>
      </div>
        </div>
    </div>
    </div>

    <div class="col-md-3">
    <div class="back2">
    <div class=" stat stat-livre">
      <i class="fa-solid fa-book fa-lg" ></i>
        <div class="info">
        Total Livres
        <span id="id2"><a href="cour.php"><?php echo countlivre('id','cours' )?></a></span>
        </div>
      </div>
    </div>
    </div>

    <div class="col-md-3">
    <div class="back3">
    <div class="stat stat-visit">
      <i class="fa-solid fa-users fa-lg" ></i>
        <div class="info">
        Total Visiteur
        <span id="id3"><a href="visit.php"><?php echo countvisit('id','etudiant' )?></a></span>
        </div>
      </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="back4">
    <div class=" stat stat-commande">
      <i class="fa-brands fa-shopify fa-lg" ></i>
        <div class="info">
        Total Commandes
        <span id="id4"><a href="commande.php"><?php echo countcommande('id','commande' )?></a></span>
        </div>
      </div>
    </div>
    </div>

  </div>
    </div>
    </div>
    
    </div><br>
  

</body>
</html>