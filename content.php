<?php
switch ($_GET['module']) {
   case 'beranda':
      include 'modules/beranda/view.php';
      break;
   case 'pelanggan':
      include 'modules/pelanggan/view.php';
      break;
   case 'pulsa':
      include 'modules/pulsa/view.php';
      break;
   case 'penjualan':
      include 'modules/penjualan/view.php';
      break;
   case 'pengguna':
      include 'modules/pengguna/view.php';
      break;
   case 'laporan':
      include 'modules/laporan/view.php';
      break;
   default:
      echo 'Halaman Tidak Ditemukan';
      break;
}
