<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Liste des Catégories</title>
</head>
<body>
  
<div class="container py-4">
<div class="float">
<a  href="bloc.php"class=" btn btn-dark " > <i class="fa-solid fa-pen-to-square fa-sm" style="color: #f7f7f8;"></i> Dashboard </a>
  <h2> <i class="fa-solid fa-list" style="color: #FFD43B;"></i>   Liste des Catégories</h2><br>
</div>
  <a href="ajouter-categorie.php" class="btn btn-warning"> <i class="fa-solid fa-plus" style="color: #f5f7fa;"></i></a><br> <br>
  <table class="table table-striped table-hover" id= p-3>
    <tr>
      <th>ID </th>
      <th>Libelle</th>
      <th> Description</th>
      <th>Icone</th>
      <th>Date</th>
      <th>Opérations</th>
    </tr>
    <?php

  require_once 'conx.php';
  $categories = $pdo->query('SELECT * From categories')->fetchAll(PDO::FETCH_ASSOC);
  foreach ($categories as $categorie){
    ?>
    <tr>
      <td><?php echo $categorie['id'] ?></td>
      <td><?php echo $categorie['libelle'] ?></td>
      <td> <?php echo $categorie['description'] ?></td>
      <td><i class=" fa <?php echo $categorie['image'] ?>"></i> 
    </td>
      <td><?php echo $categorie['date_creation'] ?></td>
      
      <td>
        <a href="modifier-categorie.php?id=<?php echo $categorie['id']?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square fa-sm" style="color: #f7f7f8;"></i> Modifier</a>
        <a href="supprimer-categorie.php?id=<?php echo $categorie['id']?>" onclick="return confirm('voulez vous vraiment supprimer la catégorie <?php echo $categorie['libelle'] ?> ')" class="btn btn-danger"> <i class="fa-solid fa-trash-arrow-up" style="color: #f1f2f4;"></i> Supprimer</a>
      </td>
    </tr>
    <?php
  }
  ?>
</table>
</div>
</body>
</html>