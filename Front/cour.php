<?php
session_start();
    require_once '../conx.php' ;
    $id= $_GET['id'];
    $sqlstate = $pdo->prepare( query: "SELECT * FROM cours WHERE id=?");
    $sqlstate->execute([$id]);
    $cour = $sqlstate->fetch(PDO::FETCH_ASSOC);
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

  <title>Cour | <?php echo $cour['libelle']?></title>
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

  <div class="container py-2">
    <!-- <span class="fa <?php echo $cour['icone']?>"></span> -->
    <!-- <span class ="badge text-bg-succes></span> -->
    <!-- class="d-flex"->ki thb deux button bjnab bathhoum -->
    <!-- max-auto 1 2 ->center marge   mx-auto-->
    <!-- include '' ->fichier tt3adaw fy kol page -->
    <div class = "d-flex align-items-center"></div>
    <h4><?php echo $cour['libelle']?></h4><br>
    <div class="countainer">  
      <div class="row">
        <div class="col-md-6">
        <img class="img img-fluid w-50" src="/project-stage/Front/<?php echo $cour['image'] ?>" >
        </div>
        <div class="col-md-6">
          <h1><?php echo $cour['libelle']?> </h1><br><hr>
          <p class ="mx-1"><?php echo $cour['description']?></p>
          <h5>
            <span class="badge text-bg-dark" >
            <?php echo $cour['prix']?> Dinard</span>
          </h5><br>
          <?php
          $id_cours =$cour['id'] ;
          include '../include/counter.php'
          ?> 
          <hr>
        </div>
      </div>

</div>
<script src="../js/cour/counter.js"></script>
</div><br><br><br><br>
<?php
    require_once '../conx.php' ;

  include '../include/footer.php';
  ?>
</body>
</html>