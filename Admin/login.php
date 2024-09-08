<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>Document</title>
</head>
<body>
  <?php
     ?>
    <div class="alert alert-danger" role="alert">
     username or password is not correct.
    </div>
    <?php

   ?>
   <center>
    <h2>Admin login</h2>
     <form class="login" method="POST">
     <input  class="form-control" type="text" name="name" placeholder="username"> <br><br>
      <input  class="form-control" type="text" name="pass" placeholder="password"><br><br>
     <button type="submit" name="login" class="btn btn-dark">Login </button>
    </form>
  </center>
</body>

</html>
<?php
 session_start();
    require_once '../conx.php' ;

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
  <title>Panier </title>
</head>
<body>
<?php include
  '../include/nav_front.php';
  
  ?>
  <div class="container py-2">
    <h4> Panier</h4><br>
    <div class="countainer">
      <div class="row">
        <?php
        $email_etudiant = $_SESSION['etudiant']['email'];
      
        
        if(empty($panier)){
          ?>
          <div class="alert  alert-warning" role="alert">
            Votre panier est vide
          </div>
          <?php

        }else{
          $panier=$_SESSION['panier'][$email_etudiant];
          $id_cours = array_keys($panier);
          $id_cours = implode(',',$id_cours);
          $cours = $pdo->query("SELECT * FROM cours WHERE id IN ($id_cours)")->fetchAll(PDO::FETCH_ASSOC);
      
          ?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Libelle</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
          <?php
          $total =0;
          foreach ($cours as $cour) {
            $id_cours= $cour['id'];
            $totalcour = $cour['prix'] * $panier[$id_cours];
            $total += $totalcour ;

            ?>
            <tr>
            <td><?php echo $cour['id']?></td>
            <td><img width ="140px"  src="/project-stage/Front/<?php echo $cour['image'] ?> "></td>
            <td><?php echo $cour['libelle']?></td>
            <td><?php include '../include/counter.php' ?></td>
            <td><?php echo $cour['prix']?> Dinard</td>
            <td><?php echo   $totalcour?> Dinard</td>
        
            </tr>
            <?php
            
          }
          ?>
          <tfoot >
            <tr>
            <td colspan="5"><strong >Total</strong></td>
            <td ><?php echo $total ?> Dinard</td>
            </tr>
            <tr>
            <td colspan="10" >
              <?php
              var_dump($email_etudiant);
              ?>
              <form method="post">
                <input type="submit" class="btn btn-success" name="valide" value="Valider la commande">
                <input onclick ="return confirm('Voulez vous vraiment vider le panier ?')"  type="submit" class="btn btn-danger" name="vide" value="Vide le panier">
              </form>
          </td>  
            </tr>
          </tfoot>
          </table>
          <?php
          
        }
        ?>      
      </div>
    </div>
  <script src="../js/cour/counter.js"></script>
  </div>
</body>
</html> 
<?php
 session_start();
    require_once '../conx.php' ;

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
  <title>Panier </title>
</head>
<body>
<?php include
  '../include/nav_front.php';
  
  ?>
  <div class="container py-2">
    <?php 
    if (isset($_POST['valide'])){
    
    

    }
    ?>
    <h4> Panier (<?php echo $courCount ;?>)</h4><br>
    <div class="countainer">
      <div class="row">
        <?php
        $email_etudiant = $_SESSION['etudiant']['email'];
        $panier=$_SESSION['panier'][$email_etudiant];
        if(empty($panier)){
          ?>
          <div class="alert  alert-warning" role="alert">
            Votre panier est vide
          </div>
          <?php

        }else{
        
          $id_cours = array_keys($panier);
          $id_cours = implode(',',$id_cours);
          $cours = $pdo->query("SELECT * FROM cours WHERE id IN ($id_cours)")->fetchAll(PDO::FETCH_ASSOC);
      
          ?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Libelle</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
          <?php
          $total =0;
          foreach ($cours as $cour) {
            $id_cours= $cour['id'];
            $totalcour = $cour['prix'] * $panier[$id_cours];
            $total += $totalcour ;

            ?>
            <tr>
            <td><?php echo $cour['id']?></td>
            <td><img width ="140px"  src="/project-stage/Front/<?php echo $cour['image'] ?> "></td>
            <td><?php echo $cour['libelle']?></td>
            <td><?php include '../include/counter.php' ?></td>
            <td><?php echo $cour['prix']?> Dinard</td>
            <td><?php echo   $totalcour?> Dinard</td>
        
            </tr>
            <?php
            
          }
          ?>
          <tfoot >
            <tr>
            <td colspan="5"><strong >Total</strong></td>
            <td ><?php echo $total ?> Dinard</td>
            </tr>
            <tr>
            <td colspan="10" >
              <?php
              if(isset($_POST['vide'])){
                $_SESSION['panier'][$email_etudiant] = [];
                header('location: panier.php');
              }
              
              ?>
              <form method="post">
                <input type="submit" class="btn btn-success" name="valide" value="Valider la commande">
                <input onclick ="return confirm('Voulez vous vraiment vider le panier ?')"  type="submit" class="btn btn-danger" name="vide" value="Vide le panier">
              </form>
          </td>  
            </tr>
          </tfoot>
          </table>
          <?php
          
        }
        ?>      
      </div>
    </div>
  <script src="../js/cour/counter.js"></script>
  </div>
</body>
</html> 
!-- <?php
require_once 'conx.php';
// $idCommande = $_GET['id'];
// $sqlstate = $pdo->prepare('SELECT * From commande WHERE id =?');
// $sqlstate->execute([$idCommande]);
// $commande = $sqlstate->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <!-- <title>Commande |<?= $commande['id']?> </title> -->
</head>
<body>
  <?php
  include
  'include/nav.php';
  ?>
<div class="container py-4">
  <h2><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #f4c10b;"></i> Détails Commandes</h2><br>
  <table class="table table-striped table-hover" id= p-3>
    <tr>
      <th>ID </th>
      <th>id_cour</th>
      <th>id-commande</th>
      <th>prix</th>
      <th>quantite</th>
      <th>totale</th>
    </tr>
    <?php
    require_once 'conx.php';
    $commands = $pdo->prepare('SELECT * From ligne_commande WHERE id =?')->fetch(PDO::FETCH_ASSOC);
    foreach($commands as $commande){
      ?>
      <tr>
        <td><?php echo $Commande['id'] ?></td>
        <td><?php echo $commande['id_cours'] ?></td>
        <td> <?php echo $commande['id_commande'] ?></td>
        <td><?php echo $commande['prix'] ?></td>
        <td><?php echo $commande['quantite'] ?></td>
        <td><?php echo $commande['total'] ?></td>  
        <?php
    }
?>  
</table>
</div>
</body>
</html>