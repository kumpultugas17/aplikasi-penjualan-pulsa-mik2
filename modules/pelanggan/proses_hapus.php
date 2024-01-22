<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $id_pelanggan = $_POST['id_pelanggan'];

   $query = $conn->query("DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Menghapus data pelanggan.';
   } else {
      session_start();
      $_SESSION['alert'] = 'Menghapus data pelanggan.';
   }
   header('location:../../index.php?module=pelanggan');
}
