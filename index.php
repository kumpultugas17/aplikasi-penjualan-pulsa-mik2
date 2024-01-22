<?php
session_start();
include 'config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Aplikasi Penjualan Pulsa Sederhana">
   <meta name="author" content="Muhammad Iqbal Adenan">
   <!-- favicon -->
   <link rel="shortcut icon" href="assets/img/favicon.png">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="assets/plugins/bootstrap-5.2.3/css/bootstrap.min.css">
   <!-- fontawesome css -->
   <link rel="stylesheet" href="assets/plugins/fontawesome-free-5.5.0-web/css/all.min.css">
   <!-- datatable css -->
   <link rel="stylesheet" href="assets/plugins/DataTables/datatables.min.css">
   <!-- myStyle -->
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- jquery -->
   <script src="assets/js/jquery-3.7.0.js"></script>
   <!-- title -->
   <title>Beranda - ELTIPONSEL</title>
</head>

<body class="d-flex flex-column vh-100">
   <!-- navbar -->
   <nav class="navbar navbar-expand-lg bg-body-teriary border-bottom shadow-sm p-3 mb-3">
      <div class="container">
         <a class="navbar-brand" href="#">
            <img src="assets/img/logo.png" alt="logo" width="30" class="d-inline-block align-text-top">
            <span class="title">ELTIPONSEL</span>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
               <li class="nav-item me-1">
                  <a class="nav-link <?= $_GET['module'] == 'beranda' ? 'active' : '' ?>" aria-current="page" href="index.php?module=beranda">
                     <i class="fas fa-home"></i> Beranda
                  </a>
               </li>
               <li class="nav-item me-1">
                  <a class="nav-link <?= $_GET['module'] == 'pelanggan' ? 'active' : '' ?>" aria-current="page" href="index.php?module=pelanggan">
                     <i class="fas fa-user-friends"></i> Pelanggan
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?= $_GET['module'] == 'pulsa' ? 'active' : '' ?>" aria-current="page" href="index.php?module=pulsa">
                     <i class="fas fa-mobile-alt"></i> Pulsa
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?= $_GET['module'] == 'penjualan' ? 'active' : '' ?>" aria-current="page" href="index.php?module=penjualan">
                     <i class="fas fa-cart-plus"></i> Penjualan
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?= $_GET['module'] == 'pengguna' ? 'active' : '' ?>" aria-current="page" href="index.php?module=pengguna">
                     <i class="fas fa-user"></i> Pengguna
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?= $_GET['module'] == 'laporan' ? 'active' : '' ?>" aria-current="page" href="index.php?module=laporan">
                     <i class="fas fa-book"></i> Laporan
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="logout.php">
                     <i class="fas fa-sign-out-alt"></i> Logout
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- main -->
   <main role="main" class="container">
      <?php include 'content.php'; ?>
   </main>

   <!-- footer -->
   <footer class="d-flex flex-wrap justify-content-center align-item-center py-3 my-0 border-top mt-auto">
      <p class="col-md-6 mb-0 text-muted text-center">&#169; 2024 ELTIPONSEL, MIK2</p>
   </footer>

   <!-- bootstrap js -->
   <script src="assets/plugins/bootstrap-5.2.3/js/bootstrap.bundle.min.js"></script>
   <!-- fontawesome js -->
   <script src="assets/plugins/fontawesome-free-5.5.0-web/js/all.min.js"></script>
   <!-- datatable js -->
   <script src="assets/plugins/DataTables/datatables.min.js"></script>
   <!-- my script -->
   <script>
      $(document).ready(function() {
         let table = $('#data').DataTable({
            pageLength: 5,
            lengthMenu: [
               [5, 10, 20, -1],
               [5, 10, 20, 'todos']
            ]
         });
      });
   </script>
</body>

</html>