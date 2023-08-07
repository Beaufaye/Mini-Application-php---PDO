<?php
require_once 'connexion.php';

$name_a=$_POST['nom'];
$pren_a=$_POST['prenom'];
$date_a=$_POST['date_naiss'];
$genre_a=$_POST['genre'];
$contact_a=$_POST['ville'];

$requette2 = bd()->prepare('SELECT * FROM etudiant WHERE contact=?');
$requette2->execute (array($contact_a));
$donnees_exist = $requette2->fetchAll();
if(count ($donnees_exist) == 1) {

   echo "<script>
   alert('Le contact exist deja!')
   </script>";
}
else {
   $requette=bd()->prepare ('INSERT INTO etudiant(nom, prenom, date_naiss, genre,contact) value(?,?,?,?,?)');
   $requette->execute (array($name_a,$pren_a,$date_a,$genre_a,$contact_a));
   header('location:liste.php');
}

?>