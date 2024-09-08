<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <title>Document</title>
</head>

<body>

  <?php 
require_once '../conx.php' ;
  if (isset($_POST['signup'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($password)) {
      $sqlstate = "INSERT INTO etudiant (prenom,nom,email,password) VALUES('$prenom','$nom','$email','$password')";
      $succes = $pdo->exec($sqlstate);
      header('location:index.php');
      // header('location:index.php');
    } 
  }

  ?>
  <div class="container">
  <h2>Sign <span>Up</span></h2><br><br>
  <center>
    <form class="login" method="POST">
    
      <input  class="form-control" type="text" name="prenom" placeholder="Prénom" > <br>

      <input  class="form-control" type="text" name="nom" placeholder="Nom"> <br>
    
      <input  class="form-control" type="text" name="email" placeholder="Email" > <br>
    
      <input  class="form-control" type="text" name="password" placeholder="password" > <br><br>
      
      <button type="submit" name="signup" class="btn btn-light">Sign Up </button>
      <a href="signin.php" class="btn btn-light">Login</a>
    </form>
    </center>

  </div>


</body>

</html>