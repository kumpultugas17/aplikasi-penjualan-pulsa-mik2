<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $nama_pengguna = htmlspecialchars($_POST['nama_pengguna']);
   $email =  htmlspecialchars($_POST['email']);
   $password =  md5(htmlspecialchars($_POST['password']));
   $konfirmasi =  md5(htmlspecialchars($_POST['konfirmasi']));

   // cek email
   $cek_email = $conn->query("SELECT email FROM pengguna WHERE email = '$email'");
   $email = mysqli_num_rows($cek_email);
   if ($email > 0) {
      session_start();
      $_SESSION['alert_konfirmasi'] = 'E-mail sudah digunakan, silahkan gunakan e-mail yang lain!';
      header('location:../../index.php?module=pengguna');
      exit();
   }

   // cek konfirmasi password
   if ($password != $konfirmasi) {
      session_start();
      $_SESSION['alert_konfirmasi'] = 'Password dan Konfimasi Password berbeda, silahkan masukkan ulang!';
      header('location:../../index.php?module=pengguna');
      exit();
   }

   $query = $conn->query("INSERT INTO pengguna (nama_pengguna, email, password) VALUES ('$nama_pengguna', '$email', '$password')");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Menambahkan data baru.';
   } else {
      session_start();
      $_SESSION['alert'] = 'Menambahkan data baru.';
   }
   header('location:../../index.php?module=pengguna');
}
