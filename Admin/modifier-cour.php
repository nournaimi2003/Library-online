<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/back.css">
  <title>Document</title>
</head>
<body>
<div class="container py-4">
  <center>
  <h2>Modifier Livre</h2>
  </center>
  <?php
   require_once 'conx.php';
   $sqlstate = $pdo->prepare(query: 'SELECT * FROM cours where id=?');
   $id= $_GET['id'];
   $sqlstate->execute([$id]);
   $cour = $sqlstate->fetch(PDO::FETCH_OBJ);
   if(isset($_POST['Modifier'])){
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $niveau = $_POST['niveau'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
    $filename ='';
    if(!empty($_FILES['image']['name'])){
      $image = $_FILES['image']['name'];
      $filename = uniqid().$image;
      move_uploaded_file($_FILES['image']['tmp_name'],'Front/'.$filename);
    }
    
  $sql= "UPDATE cours SET libelle =? ,prix =? ,niveau=? ,id_categories=? ,description=?, image=? WHERE id=? ";
  $sqlstate = $pdo->prepare($sql);
  $sqlstate->bindParam(1,$libelle);
  $sqlstate->bindParam(2,$prix);
  $sqlstate->bindParam(3,$niveau);
  $sqlstate->bindParam(4,$categorie);
  $sqlstate->bindParam(5,$description);
  $sqlstate->bindParam(6,$filename);
  $sqlstate->bindParam(7,$id);
  $sqlstate->execute();
  header("location:cour.php");
   }
  ?>
  
<center>
<form method="POST" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="id" value="<?= $cour->id ?>" ><br><br>
  
    <input type="text" class="form-control" name="libelle" value="<?= $cour->libelle ?>" placeholder="Libelle"><br><br>
  
    <input type="number" class="form-control" name="prix" min="0" value="<?= $cour->prix ?>" placeholder="Prix"><br><br>
    
    <input type="text" class="form-control" name="niveau" min="0" value="<?= $cour->niveau ?>"placeholder="Niveau"><br><br>

    <textarea  class ="form-control" name="description" placeholder="Description"><?= $cour->description ?></textarea>
  
    <input type="file" class="form-control" name="image" placeholder="Image"><br>
    <img  class="img img-fluid"  height ="1%" width="10%" src="Front/<?= $cour->image ?>"><br><br>
     
    <?php
    $categories = $pdo->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_ASSOC);
  
    ?>
  
    <select name="categorie" class="from-control"placeholder="Catégorie" >
      <option value="">Choisissez une catégorie</option>
      <?php
      foreach($categories as $categorie){
        $selected = $cour->id_categories == $categorie['id']?' selected ':'';
        echo "<option $selected value='".$categorie['id']."'>".$categorie['libelle']."</option>";
      }
      ?>
    </select><br><br>
    <input type="submit" value="Modifier " class="btn btn-dark my-2" name="Modifier">
  </form>
  </center>
</div>

</body>
</html>