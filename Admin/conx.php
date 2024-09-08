<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=lms_db', 'root', '');

} catch (PDOException $e) {
  echo "<p>Erreur:" . $e->getMessage();
  die();

}

?>