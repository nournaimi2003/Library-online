 <?php
 session_start();
    require_once '../conx.php' ;
    $id= $_GET['id'];
    $sqlstate = $pdo->prepare(  "SELECT * FROM categories WHERE id=?");
    $sqlstate->execute([$id]);
    $categorie = $sqlstate->fetch(PDO::FETCH_ASSOC);
    $sqlstate = $pdo->prepare( "SELECT * FROM cours WHERE id_categories=?");
    $sqlstate->execute([$id]);
    $cours = $sqlstate->fetchAll(PDO::FETCH_OBJ);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="../css/cour.css">
    <!-- <link rel="stylesheet" href="../css/login.css"> -->
  <title>Catégorie | <?php echo $categorie['libelle']?></title>
</head>
<body>
  
<nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../include/image/logo.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signin.php">Login</a>
        </li>
        
      </ul>
      <?php
    $courCount =0;
    if(isset($_SESSION['etudiant'])){
      $email_etudiant= $_SESSION['etudiant']['email'];
      $courCount = count($_SESSION['panier'][ $email_etudiant] ?? []);

    }
  
  
    ?>
      <a class ="btn float-end" href="panier.php"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #0e0e0e;"></i><?php echo $courCount ;?></a>
    </div>
  </div>
</nav>
<br>
  <div class="container py-2">
    <h5>
    <i class=" fa <?php echo $categorie['image'] ?> "></i>
    <?php echo $categorie['libelle']?></h5><br>
    
    <div class="container">
      
      <div class="row">
        <?php
        
        foreach ($cours as $cour) {
           $id_cours = $cour->id;
          ?>
          
          <div class="card mb-6  col-md-3 p-0 m-3" >
          <img  class="card-img w-70 mx-auto height = 40rem" src="/project-stage/Front/<?= $cour->image ?>" >
          <div class="card-body">
            <center>
            <a  href= "cour.php?id=<?php echo $id_cours ?>" class="btn btn-light stretched-link">Detail</a><br><br>
            <h5 class="card-title"><?= $cour->libelle ?></h5><br>
            <h6 class="card-text"><?= $cour->prix ?> Dinard</h6>
          
            </center>
          </div>
          <div class="card-footer" style="z-index: 10">
          <?php 
      $email_etudiant = $_SESSION['etudiant']['email'];
      $qty = $_SESSION['panier'][$email_etudiant][$id_cours] ?? 0;
      $button = $qty == 0 ? 'Ajouter' : 'Modifier';
      
      ?>
      <form method="post" class="counter d-flex"  action="ajouter_panier.php">
      <button onclick="return false;"  class="btn btn-secondary  mx-3 counter-moins">-</button>
      <input type="hidden" name="id" value="<?php echo $id_cours ?>">
      <input  class="form-control"  value="<?php echo $qty ?>" type="number" name="qty" id="qty" max="99">
      <button  onclick="return false;" class="btn btn-secondary mx-3 counter-plus">+</button>
      <input class="btn btn-warning" type="submit" value="<?php echo $button;?>" name="ajouter">
      </form>
        
          </div>
        </div>
          <?php 
        }
        if (empty($cours)){
          ?>
          
          <div class= "alert alert-info" role="alert">
            Pas de cour pour l'instant

          </div>
          <?php
        }
              ?>
              
      </div>
    </div>
  <script src="../js/cour/counter.js"></script>
  </div><br><br><br>
  <?php
    require_once '../conx.php' ;

  include '../include/footer.php';
  ?>
</body>
</html> 