<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/back.css">
  <title>Document</title>
</head>
<body>
  <div class="container py-4">
  <div class="float">
<a href="bloc.php" class=" btn btn-dark " > <i class="fa-solid fa-pen-to-square fa-sm" style="color: #f7f7f8;"></i> Dashboard </a>
  <h2>Ajouter des catégories</h2><br>
  </div>
  
  <?php
  if(isset($_POST['ajouter'])){
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $icone = $_POST['icone'];
    if(!empty($libelle) && !empty($description) && !empty($icone)){
       require_once 'conx.php';
       $sqlstate = $pdo->prepare( query:'INSERT INTO categories(libelle,description,image) VALUES(?,?,?) ');
       $sqlstate->execute([$libelle,$description,$icone]);
  if($sqlstate){
    ?>
    <div class="alert alert-info" role="alert">
      Les donnees est bien ajouter !
  
    </div>
    <?php
  }

    }else{
      ?>
      <div class="alert alert-danger" role="alert">
      Les donnees sont obligatoire!
      </div>
      
      <?php
  
    }
    
  }
  ?>
  <center>
  <form method="POST">
    
    <input type="text" class="form-control" name="libelle" placeholder="Libelle" ><br><br>
  
    <textarea class="form-control" name="description" placeholder="Description" ></textarea><br>

    <input type="text" class="form-control" name="icone" placeholder="Icone"><br><br>
    <input type="submit" value="Ajouter" class="btn btn-dark my-2" name="ajouter">
  </form>
  </center>
  </div>
</body>
</html>