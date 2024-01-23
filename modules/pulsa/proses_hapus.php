<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $id_pulsa = $_POST['id_pulsa'];

   $query = $conn->query("DELETE FROM pulsa WHERE id_pulsa = '$id_pulsa'");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Menghapus data pulsa.';
   } else {
      session_start();
      $_SESSION['alert'] = 'Menghapus data pulsa.';
   }
   header('location:../../index.php?module=pulsa');
}
