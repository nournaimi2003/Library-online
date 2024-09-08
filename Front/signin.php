<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
<?php


require_once '../conx.php';
      if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!empty($email) && !empty($password)) {
          $sql = $pdo->prepare(query: 'SELECT email, password FROM etudiant WHERE email=? AND password=?');
          $sql->execute([$email, $password]);
          if ($sql->rowCount() >= 1) {
            session_start();
            $_SESSION['etudiant'] = $sql->fetch();
            header('location:index.php');
          } else {
            ?>
            <div class="alert alert-danger" role="alert">
              username or password is not correct.
            </div>
            <?php
          }
        }
      }
      ?><br> <br>
      <div class="bloc-login">
        <center>
  <div class="container">
  
      <section class="bloc">
      <img src="../include/image/logo.png"><br><br><br>
    <form class="login" method="POST">
      <input  class="form-control" type="text" name="email" placeholder="Email" > <br>
      <input  class="form-control" type="text" name="password" placeholder="Password" > <br><br>
      <button type="submit" name="signin" class="btn btn-primary">Login </button>
    </form>
      </section>
  </div> 
    </center>
    <div class="image">
      <div class="img1">
        <img src="../include/image/img3.png" >
      </div>
      <div class="img2">
      <img src="../include/image/img2.png" >
      </div>
    </div>
    </div>
    
</body>
</html>