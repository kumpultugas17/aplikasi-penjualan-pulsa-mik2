<?php
session_start();
if (isset($_POST['submit'])) {
   require_once 'config/config.php';

   $email = $_POST['email'];
   $password = md5($_POST['password']);

   $query = $conn->query("SELECT * FROM pengguna WHERE email = '$email' AND password = '$password'");
   $result = mysqli_num_rows($query);

   if ($result > 0) {
      $data = mysqli_fetch_assoc($query);
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
      header('location:index.php?module=beranda');
   } else {
      session_start();
      header('location:login.php');
      $_SESSION['login-error'] = 'Silahkan masukkan email & password yang benar!!';
   }
} else {
   header('location:login.php');
}
