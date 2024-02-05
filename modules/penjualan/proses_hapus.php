<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $id_penjualan = $_POST['id_penjualan'];

   $query = $conn->query("DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Menghapus data penjualan.';
   } else {
      session_start();
      $_SESSION['alert'] = 'Menghapus data penjualan.';
   }
   header('location:../../index.php?module=penjualan');
}
