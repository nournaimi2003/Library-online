<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
  <title>Liste des Commandes</title>
</head>
<body>

<div class="container py-4">
<div class="float">
<a  href="bloc.php"class=" btn btn-dark " > <i class="fa-solid fa-pen-to-square fa-sm" style="color: #f7f7f8;"></i> Dashboard </a>
  <h2> <i class="fa-solid fa-list" style="color: #FFD43B;"></i>  Liste des Commandes</h2><br> 
</div>
  <a  href="listecommande.php" class=" btn btn-success " ><i class="fa-solid fa-arrow-right " style="color: #ffffff;"></i> Voir le Détail </a><br> <br>
  <table class="table table-striped table-hover" id= p-3>
    <tr>
      <th>ID </th>
      <th>Client</th>
      <th>Total</th>
      <th>Date</th>
      <th>Opérations</th>
    </tr>
    <?php

  require_once 'conx.php';
  $commandes = $pdo->query('SELECT * From commande')->fetchAll(PDO::FETCH_ASSOC);
  foreach ($commandes as $commande){
    ?>
    <tr>
      <td><?php echo $commande['id'] ?></td>
      <td><?php echo $commande['id_etudiant'] ?></td>
      <td> <?php echo $commande['total'] ?> D</td>
      <td><?php echo $commande['date_creation'] ?></td>
      <td>
      <a href="supprimercommande.php?id=<?php echo $commande['id']?>" onclick="return confirm('voulez vous vraiment supprimer commande ID <?php echo $commande['id']?> ') " class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-arrow-up" style="color: #f1f2f4;"></i> Supprimer </a>
      </td>
    </tr>
    <?php
  }
  ?>
</table>
</div>
</body>
</html>