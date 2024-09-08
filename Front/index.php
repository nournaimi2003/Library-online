
  <?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/front.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  
  <title>Document</title>
</head>

<body>

<?php include
  '../include/nav_front.php';
  ?>
  <div class="first">
    <div class="content" id="home">
    <div class="image">
      <img src="../include/image/cap.png" alt="">
    </div>
    <div class="text">
      <h2><center>Nouvelle année</center>
          Nouvelles parutions </h2><br><br>
      <center>
      <button class="btn btn-danger " style="width: 15rem ;"> Découvrir</button>
      </center>

    </div>
    </div>
</div>
<section class="categorie" id="categorie">


<center>
<h2> VOUS CHERCHEZ <span>? </span> </h2><br><br><br>
    </center>

  <div class="container py-2">
  <?php
  if(!isset($_SESSION['etudiant'])){
    header('location: signin.php');
  }
   ?>
   
    <?php
    require_once '../conx.php';
    $categories =$pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_OBJ);
    ?>

<?php
  foreach($categories as $categorie){
    ?>
<div></div>

    <div class= "container">
    <div class="card mb-3 col-md-2 border-danger mb-3 " style="width: 16rem ;">
    
      <div class="card-body">
        <center>
        <i class=" fa <?php echo $categorie->image ?> fa-2xl"></i> <br><br>
        <a href="categorie.php?id=<?php echo $categorie->id ?>" class="btn btn-danger">
      
      <?php echo $categorie->libelle ?>
      </a>
        </center>
  </div>
</div>
    </div>
    
<?php
  }
?>

  </div>
  </section>
  <cen>
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

  </div><br><br><br><br><br><br>
  <div class="capture">
  <img src="../include/image/cap1.png" alt="">

  </div><br><br>
  <?php
    require_once '../conx.php' ;

  include '../include/footer.php';
  ?>

</div>


</body>
</html>