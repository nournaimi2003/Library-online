
    <div >
      <?php 
      $email_etudiant = $_SESSION['etudiant']['email'];
      $qty = $_SESSION['panier'][$email_etudiant][$id_cours] ?? 0;
      $button = $qty == 0 ? 'Ajouter' : 'Modifier';
      
      ?>
      <form method="post" class="counter d-flex"  action="ajouter_panier.php">
      <button onclick="return false;"  class="btn btn-secondary mx-3 btn-sm counter-moins">-</button>
      <input type="hidden" name="id" value="<?php echo $id_cours ?>">
      <input  class="form-control"  value="<?php echo $qty ?>" type="number" name="qty" id="qty" max="99">
      <button  onclick="return false;" class="btn btn-secondary mx-3 btn-sm counter-plus">+</button>
      <div class="input">
      <input class="btn btn-warning " type="submit" value="<?php echo $button;?>" name="ajouter">
      <?php
      if ($qty != 0){
        ?>
          <input formaction="supprimer_panier.php" class="btn btn-danger" type="submit" value="Supprimer" name="supprimer">
        <?php
      }
      ?>
      </div>
      </form>
    </div>
      