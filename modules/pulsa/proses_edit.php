<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $id_pulsa = htmlspecialchars($_POST['id_pulsa']);
   $operator = htmlspecialchars($_POST['operator']);
   $nominal = htmlspecialchars($_POST['nominal']);
   $harga = htmlspecialchars($_POST['harga']);

   $query = $conn->query("UPDATE pulsa SET operator = '$operator', nominal = '$nominal', harga = '$harga' WHERE id_pulsa = '$id_pulsa'");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Merubah data pulsa.';
   } else {
      session_start();
      $_SESSION['alert'] = 'Merubah data pulsa.';
   }
   header('location:../../index.php?module=pulsa');
}
