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
<a  href="bloc.php"class=" btn btn-dark " > <i class="fa-solid fa-pen-to-square fa-sm" style="color: #f7f7f8;"></i> Dashboard </a>
  <h2>Ajouter des Livres</h2><br>
</div>
  <?php
   require_once 'conx.php';
   if(isset($_POST['ajouter'])){
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $niveau = $_POST['niveau'];
    $categorie = $_POST['categorie'];
    $description=$_POST['description'];
    $date = date('y-m-d');
    $filename ='';

    if(!empty($_FILES['image']['name'])){
      $image = $_FILES['image']['name'];
      $filename = uniqid().$image;
      move_uploaded_file($_FILES['image']['tmp_name'],'Front/' .$filename);
    }
  
    if(!empty($libelle) && !empty($prix) && !empty($niveau) && !empty($categorie) && !empty($description)){
      $sqlstate = $pdo->prepare(query:'INSERT INTO cours VALUES (null,?,?,?,?,?,?,?)');
      $succes = $sqlstate->execute([$libelle,$prix,$niveau,$categorie,$date,$description,$filename]);
      if($succes){
        ?>
      <div class="alert alert-info" role="alert">
        Les donnees est bien ajouter !
    
      </div>
      <?php

      }
      
    }else{
      ?>
        <div class="alert alert-danger" role="alert">
        Les donnees sont obligatoires!
    
      </div>
      <?php
    }
   }
  ?>
<center>
<form method="POST" enctype="multipart/form-data">
  
    <input type="text" class="form-control" name="libelle" placeholder="Libelle"><br><br>

    <input type="number" class="form-control" name="prix" min="0" placeholder="Prix"><br><br>

     <select name="niveau" class="from-control" aria-placeholder="Niveau"> 
     <option value=""> Choisissez le niveau </option>
    <option  > Debutant </option>
    <option > Intermediare </option>
    <option > Avancé</option>  
     </select><br><br> 
  
    <textarea  class ="form-control" name="description" placeholder="Description"></textarea><br>
    <input type="file" class="form-control" name="image"placeholder="Image" ><br><br>
    <?php
    $categories = $pdo->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_ASSOC);
  
    ?>
    <select name="categorie" class="from-control" aria-placeholder="Catégorie" >
      <option value="">Choisissez une catégorie</option>
      <?php
      foreach($categories as $categorie){
        echo "<option value='".$categorie['id']."'>".$categorie['libelle']."</option>";
      }
      ?>
    </select><br><br>
    <input type="submit" value="Ajouter" class="btn btn-dark my-2" name="ajouter">
  </form>
  </center>
</div>

</body>
</html>