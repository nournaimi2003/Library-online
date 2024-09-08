<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <title>Document</title>
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
          <a class="nav-link" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#feedback">Feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#inscription">Inscription</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="first">
    <div class="content" id="home">
      <h2>Une <span>Bibliothéque</span> d'exception <br> pour les lecteurs exigeants</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Eligendi voluptatem laudantium eius doloribus<br>
        molestiae minus obcaecati dolor! Officiis <br>sapiente quisquam esse </p>
    </div>
</div>
<section class="secondbloc" id="about">
  <div class="container">
    <h2>About <span>Us</span></h2><br><br><br>
    <div class="aboutbloc">
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. <br>Quae ratione porro possimus, id quisquam <br>voluptatem quos iste maxime accusantium <br>Lorem ipsum dolor sit amet consectetur, adipisicing elit.<br>Quae ratione porro possimus, id quisquam</p>
    <img src="../include/image/about.png" alt="">
    </div>
  </div>
  
  
</section>

  <div class="cont" id="feedback">
    
    <div class="back1">
      <center>
    
      <img src="../include/image/testimonial-1.jpg" alt=""><br><br>
      <h5>Maram Aouni</h5><br>
      <p><i class="fa-solid fa-quote-left fa-lg" style="color: #303030;"></i>Lorem ipsum dolor sit amet<br> consectetur adipisicing elit. </p>
      </center>

    </div>
    <div class="back2">
    <center>
    <img src="../include/image/testimonial-3.jpg" alt=""><br><br>
    <h5>Ahmed Tounsi</h5><br>
    
      <p><i class="fa-solid fa-quote-left fa-lg" style="color: #303030;"></i>Lorem ipsum dolor sit amet<br> consectetur adipisicing elit. </p>
      
      </center>
    </div>
    <div class="back3">
    <center>
  
    <img src="../include/image/testimonial-4.jpg" alt=""><br><br>
    <h5>Nour Tounsi</h5><br>
      <p><i class="fa-solid fa-quote-left fa-lg" style="color: #303030;"></i>Lorem ipsum dolor sit amet<br> consectetur adipisicing elit.<br>Lorem ipsum dolor sit amet </p>
      </center>

    </div>
    <div class="back4">
    <center>
  
    <img src="../include/image/testimonial-2.jpg" alt=""><br><br>
    <h5>Rayen Belhaj</h5><br>
      <p><i class="fa-solid fa-quote-left fa-lg" style="color: #303030;"></i>Lorem ipsum dolor sit amet<br> consectetur adipisicing elit. </p>
      </center>

    </div>

  </div>
  <div class="pub">
  <img src="../include/image/pub.png" alt="">
</div>
<div class="formulaire" id="inscription">
  <?php
    require_once '../conx.php' ;
  include 'home.php';
  include '../include/footer.php';
  ?>

</div>



</body>
</html>