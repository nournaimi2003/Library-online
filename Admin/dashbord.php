<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <title>Document</title>
</head>
<body>
  <?php
   include
  'include/nav.php';
  require_once 'conx.php';
  if (isset($_SESSION['admin'])){
    include
  'include/function.php';
  }
  ?>
   <div class="section">
<div class="container home-stat text-center">
<?php
  if(!isset($_SESSION['admin'])){
    header('location: loginadmin.php');
  }
   ?>
   
  <h1 >Dashboard</h1><br>
  <hr><br>
  
  <div class="row">
    <div class="col-md-3">
      <div class=" stat stat-categorie">
      <i class="fa-solid fa-layer-group fa-xl" style="color: #7574A7 ;"></i>
        <div class="info">
        Total catégories
        <span id="id1"> <a href="categorie.php"><?php echo countCategorie('id', 'categories') ?></a></span>
      </div>
        </div>
    </div>
    <div class="col-md-3">
      <div class=" stat stat-livre">
      <i class="fa-solid fa-book fa-lg" style="color: #2980B9;"></i>
        <div class="info">
        Total Livres
        <span id="id2"><a href="cour.php"><?php echo countlivre('id','cours' )?></a></span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat stat-visit">
      <i class="fa-solid fa-users fa-lg" style="color:#f9a61f;"></i>
        <div class="info">
        Total Visiteur
        <span id="id3"><a href="visit.php"><?php echo countvisit('id','etudiant' )?></a></span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class=" stat stat-commande">
      <i class="fa-brands fa-shopify fa-lg" style="color:  #7BB0A6;"></i>
        <div class="info">
        Total Commandes
        <span id="id4"><a href="commande.php"><?php echo countcommande('id','commande' )?></a></span>
        </div>
      </div>
    </div>
  
  </div><br><br><br>
</div> 

</div>
<!-- <?php
   include
  'include/footer.php';
  ?> -->

</body>
</html>