


  
    <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../include/image/logo.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="#home">Acueille</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#categorie">categories</a>
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