<?php
if (isset($_POST['cari'])) {
   require_once '../../config/config.php';
   $tgl_awal = date('Y-m-d', strtotime($_POST['tgl_awal']));
   $tgl_akhir = date('Y-m-d', strtotime($_POST['tgl_akhir']));

   $query = $conn->query("SELECT tanggal FROM penjualan WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'");
   $data = mysqli_num_rows($query);

   if ($data > 0) {
      session_start();
      $_SESSION['alert'] = 'Data transaksi dari <strong>' . date('d F Y', strtotime($tgl_awal)) . '</strong> sampai <strong>' . date('d F Y', strtotime($tgl_akhir)) . '</strong>!';
      $_SESSION['tgl_awal'] = $tgl_awal;
      $_SESSION['tgl_akhir'] = $tgl_akhir;
   } else {
      session_start();
      $_SESSION['alert_fail'] = 'Tidak ditemukan transaksi dari <strong>' . date('d F Y', strtotime($tgl_awal)) . '</strong> sampai <strong>' . date('d F Y', strtotime($tgl_akhir)) . '</strong>!';
   }
   header('location:../../index.php?module=laporan');
} else {
   header('location:../../index.php?module=laporan');
}
