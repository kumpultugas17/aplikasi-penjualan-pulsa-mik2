<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $id_pengguna = $_POST['id_pengguna'];

   $query = $conn->query("DELETE FROM pengguna WHERE id_pengguna = '$id_pengguna'");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Menghapus data pengguna.';
   } else {
      session_start();
      $_SESSION['alert'] = 'Menghapus data pengguna.';
   }
   header('location:../../index.php?module=pengguna');
}
