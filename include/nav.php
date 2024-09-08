
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  

  <?php
  session_start();
  $connecte = false;
  if(isset($_SESSION['admin'])){
    $connecte = true;
   }

  ?>


<nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="include/image/logo.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
      <?php
        if($connecte){
          ?>
        <li class="nav-item">
          <a class="nav-link active" href="dashbord.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorie.php">categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cour.php">Livres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="visit.php">visiteur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="commande.php">Commandes</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="deconnexionuser.php"><i class="fa-solid fa-arrow-up-from-bracket" style="color:#9DA5A6;"></i>   Deconnexion</a>
        </li>   <?php
        }else {
          ?>
          
          <li class="nav-item">
          <a class="nav-link " a href="loginadmin.php"">Sign In</a>
        </li>

          <?php
        }
        ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search" data-listener-added_7e2e1c73="true">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
      
    </div>
  </div>
</nav>
</body>
</html>