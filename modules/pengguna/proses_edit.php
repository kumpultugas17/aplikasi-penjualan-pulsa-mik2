<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $id_pengguna = htmlspecialchars($_POST['id_pengguna']);
   $nama_pengguna = htmlspecialchars($_POST['nama_pengguna']);
   $email =  htmlspecialchars($_POST['email']);
   $password =  $_POST['password'];
   $konfirmasi =  $_POST['konfirmasi'];

   // konfirmasi password
   if ($password != $konfirmasi) {
      session_start();
      $_SESSION['alert_konfirmasi'] = 'Password dan Konfimasi Password berbeda, silahkan masukkan ulang!';
      header('location:../../index.php?module=pengguna');
      exit();
   }

   // cek password baru
   if (empty($password)) {
      $query = $conn->query("UPDATE pengguna SET nama_pengguna = '$nama_pengguna', email = '$email' WHERE id_pengguna = '$id_pengguna'");
   } else {
      $pwd = md5($konfirmasi);
      $query = $conn->query("UPDATE pengguna SET nama_pengguna = '$nama_pengguna', email = '$email', password = '$pwd' WHERE id_pengguna = '$id_pengguna'");
   }

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Merubah data pengguna.';
   } else {
      session_start();
      $_SESSION['alert'] = 'Merubah data pengguna.';
   }
   header('location:../../index.php?module=pengguna');
}
