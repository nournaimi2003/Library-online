
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <title></title>
</head>
<body>

<div class="container py-4">
  
  <h2><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #f7ab08;"></i> </h2><br>
  
  <table class="table table-striped table-hover" id= p-3>
    <tr>
      <th>ID </th>
      <th>id_livre</th>
      <th>id_commande</th>
      <th>prix</th>
      <th>quantite</th>
      <th>total</th>
      <th>opération</th>
      
    </tr>
    <?php

  require_once 'conx.php';
  $categories = $pdo->query('SELECT * From ligne_commande ')->fetchAll(PDO::FETCH_ASSOC);
  foreach ($categories as $categorie){
    ?>
    <tr>
      <td><?php echo $categorie['id'] ?></td>
      <td><?php echo $categorie['id_cours'] ?></td>
      <td> <?php echo $categorie['id_commande'] ?></td>
      <td><?php echo $categorie['prix'] ?>
    </td>
    <td> <?php echo $categorie['quantite'] ?></td>
    <td> <?php echo $categorie['total'] ?></td>
    <td>
      <a href="suppliste.php?id=<?php echo $categorie['id']?>" onclick="return confirm('voulez vous vraiment supprimer commande ID <?php echo $categorie['id']?> ') " class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-arrow-up" style="color: #f1f2f4;"></i> Supprimer </a>
      </td>
    </tr>
    <?php
  }
  
  ?>
  
</table>
</div>
</body>
</html>