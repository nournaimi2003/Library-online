<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
  
  <title>Liste des Cours</title>
</head>
<body>

<div class="container py-4">
  <div class="float">
<a  href="bloc.php"class=" btn btn-dark" > <i class="fa-solid fa-pen-to-square fa-sm" style="color: #f7f7f8;"></i> Dashboard </a>
  <h2> <i class="fa-solid fa-list" style="color: #FFD43B;"></i> Liste des Livres</h2><br>
  </div>
  <a href="ajouter-cour.php" class="btn btn-warning"> <i class="fa-solid fa-plus" style="color: #f5f7fa;"></i></a><br> <br>
  <table class="table table-striped table-hover">
    <tr>
      <th>ID </th>
      <th>Libelle</th>
      <th>Prix</th>
      <th>Categories</th>
      <th>Date</th>
      <th>Description</th>
      <th>Image</th>
      <th>Opérations</th>
    </tr>
    <?php
  require_once 'conx.php';
  $cours = $pdo->query("SELECT cours.*,categories.libelle as 'Categoriee' FROM cours INNER JOIN categories ON cours.id_categories = categories.id ")->fetchAll(PDO::FETCH_OBJ);
  foreach ($cours as $cour){
    $prix =   $cour->prix; 
    ?>
    <tr>
      <td><?= $cour->id?></td>
      <td><?= $cour->libelle ?></td>
      <td> <?= $prix ?> Dinard</td>
      <td><?=$cour->Categoriee ?></td>
      <td><?= $cour->date_creation ?></td>
      <td><?= $cour->description ?></td>
      <td><img  class="img-fluid" height ="5%" width="35%"src="/project-stage/Front/<?= $cour->image ?>"></td>
      <td>
      <a  href="modifier-cour.php?id=<?= $cour->id ?>"class=" btn btn-primary " > <i class="fa-solid fa-pen-to-square fa-sm" style="color: #f7f7f8;"></i> Modifier </a>
      <a href="supprimer-cour.php?id=<?= $cour->id ?>" onclick="return confirm('voulez vous vraiment supprimer le livre <?= $cour->libelle ?>')" class="btn btn-danger  "><i class="fa-solid fa-trash-arrow-up" style="color: #f1f2f4;"></i> Supprimer</a>

      </td>
    </tr>
    <?php
  
  }
  ?>
</table>
</div>

</body>
</html>