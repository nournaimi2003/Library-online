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
    <center>
  <h2>Modifier catégories </h2>
  </center>
  
  <?php
     require_once 'conx.php';
     $sqlstate = $pdo->prepare(query: 'SELECT * FROM categories WHERE id=?');
     $id= $_GET['id'];
     $sqlstate->execute([$id]);
     $categorie=($sqlstate->fetch(PDO::FETCH_ASSOC));
     if(isset($_POST['modifier'])){
      $libelle = $_POST['libelle'];
      $description = $_POST['description'];
      $icone = $_POST['icone'];
      if(!empty($libelle) && !empty($description) && !empty($icone)){
        
         $sqlstate = $pdo->prepare( "UPDATE categories SET libelle = :libelle , description = :description, image = :image  WHERE id = :id ")
         ->execute(array("libelle"=>$libelle,"description" =>$description, "image" =>$icone,"id"=>$id));
         
         header('location:categorie.php');
  
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
  <input type="hidden" class="form-control" name="id" value="<?php echo $categorie['id']?>"><br><br>
    
    <input type="text" class="form-control" name="libelle" value="<?php echo $categorie['libelle']?>" placeholder="Libelle"><br><br>
  
    <textarea class="form-control" name="description" placeholder="Description"><?php echo $categorie['description']?></textarea><br>
  
    <input type="text" class="form-control" name="icone" value="<?php echo $categorie['image']?>" placeholder="Icone"><br><br>
    <input type="submit" value="modifier" class="btn btn-dark my-2" name="modifier">
  
    
  </form>
  </center>
  </div>
  
</body>
</html>
