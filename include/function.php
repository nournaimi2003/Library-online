<!-- count number pour les categorie function -->
<?php
function countCategorie($ids, $categorie) {
   global $pdo;
  $stmt = $pdo->prepare("SELECT COUNT($ids) FROM $categorie");
  $stmt->execute();
  return $stmt->fetchColumn();
}
function countlivre($id, $livre) {
  global $pdo;
 $stmt = $pdo->prepare("SELECT COUNT($id) FROM $livre");
 $stmt->execute();
 return $stmt->fetchColumn();
}
function countvisit($id, $visit) {
  global $pdo;
 $stmt = $pdo->prepare("SELECT COUNT($id) FROM $visit");
 $stmt->execute();
 return $stmt->fetchColumn();
}
function countcommande($id, $commande) {
  global $pdo;
 $stmt = $pdo->prepare("SELECT COUNT($id) FROM $commande");
 $stmt->execute();
 return $stmt->fetchColumn();
}


?>