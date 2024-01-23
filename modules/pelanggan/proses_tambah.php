<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $nama_pelanggan = htmlspecialchars($_POST['nama_pelanggan']);
   $no_hp =  htmlspecialchars($_POST['no_hp']);

   $query = $conn->query("INSERT INTO pelanggan (nama_pelanggan, no_hp) VALUES ('$nama_pelanggan', '$no_hp')");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Menambahkan data baru.';
   } else {
      session_start();
      $_SESSION['alert'] = 'Menambahkan data baru.';
   }
   header('location:../../index.php?module=pelanggan');
}
