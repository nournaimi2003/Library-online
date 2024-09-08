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
    <link rel="stylesheet" href="../css/login.css">
    
  <title>Panier </title>
</head>
<body>
<?php include
  '../include/nav_front.php';
  ?><br>
  <div class="container py-2">
  <?php
              if(isset($_POST['vide'])){
                $_SESSION['panier'][$email_etudiant] = [];
                header('location: panier.php');
              }
              $email_etudiant = $_SESSION['etudiant']['email'];
              $panier= $_SESSION['panier'][$email_etudiant];

              if(!empty($panier)){
              
                $id_cours = array_keys($panier);
                $id_cours = implode(',',$id_cours);
                $cours = $pdo->query("SELECT * FROM cours WHERE id IN ($id_cours)")->fetchAll(PDO::FETCH_ASSOC);
            
              }
              if (isset($_POST['valide'])){
                $sql = 'INSERT INTO ligne_commande(id_cours,id_commande,prix,quantite,total) VALUES' ;
                $total = 0 ;
                $prixcours = [];
                foreach ($cours  as $cour){
                  $id_cour = $cour['id'];
                  $qty = $panier[$id_cour];
                  $prix = $cour['prix'];
                  $total += $qty * $prix ;
                  $prixcours[$id_cour] = [
                    'id' => $id_cour,
                    'prix' => $prix,
                    'total' => $qty * $prix,
                    'qty' => $qty,
                  ];

                }

                 $sqlCommande = $pdo->prepare( 'INSERT INTO commande(id_etudiant , total) VALUES(?,?)');
                 $sqlCommande->execute([$email_etudiant,$total]);
                $idCommande =  $pdo->lastInsertId();
                $args =[];
                foreach ($prixcours as $cour) {
                  $id = $cour['id'];
                  $sql .= "(:id$id,'$idCommande',:prix$id,:qty$id,:total$id),";

                }
              
                $sql = substr($sql, 0, -1);
                 $sqlState = $pdo->prepare($sql);
                 foreach ($prixcours as $cour) {
                  $id = $cour['id'];
                  $sqlState->bindParam(':id' . $id, $cour['id']);
                  $sqlState->bindParam(':prix' . $id, $cour['prix']);
                  $sqlState->bindParam(':qty' . $id, $cour['qty']);
                  $sqlState->bindParam(':total' . $id, $cour['total']);
                 }
                 $inserted = $sqlState->execute();
                 if( $inserted ){
                  $_SESSION['panier'][$email_etudiant] = [];
                  ?>
                    <div class="alert alert-primary" role="alert">
                      Votre Commande avec le montant <strong><?= $total ?> D</strong> est bien ajoutée.
                    </div>
          
          
                
                  <?php
                 }

              }
              
              ?>
  
    
    <div class="countainer">
      <div class="row">
        <?php
      
        if(empty($panier)){
          ?>
          <div class="alert  alert-warning" role="alert">
            Votre panier est vide
          </div>
          <?php

        }else{
        
        
          ?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
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
            <td><img width ="80px"  src="/project-stage/Front/<?php echo $cour['image'] ?> "></td>
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
              <div class="td">
            <td  colspan="10" >
            
              <form method="post">
                <input type="submit" class="btn btn-dark" name="valide" value="Valider la commande " >
                <input onclick ="return confirm('Voulez vous vraiment vider le panier ?')"  type="submit" class="btn btn-dark" name="vide" value="Vide le panier">
              </form>
          </td> 
          </div> 
            </tr>
          </tfoot>
          </table>
          <?php
          
        }
        ?>      
      </div>
    </div>
  <script src="../js/cour/counter.js"></script>
  </div><br><br><br><br>
  
</body>
</html> 