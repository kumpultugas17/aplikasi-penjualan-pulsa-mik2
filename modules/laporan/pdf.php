<?php
require_once '../../config/config.php';
$tgl_awal = $_GET['tgl_awal'];
$tgl_akhir = $_GET['tgl_akhir'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laporan Bulanan Periode <?= tgl_indo($tgl_awal) ?> sampai dengan <?= tgl_indo($tgl_akhir) ?></title>
   <link rel="stylesheet" href="../../assets/plugins/bootstrap-5.2.3/css/bootstrap.min.css">
</head>

<body onload="window.print()">
   <h5 class="text-center">Leporan Penjualan Pulsa ELTIPonsel</h5>
   <h6 class="text-center">Periode <?= tgl_indo($tgl_awal) ?> sampai dengan <?= tgl_indo($tgl_akhir) ?></h6>

   <table class="table table-striped table-bordered mt-3">
      <thead>
         <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Nomor Handphone</th>
            <th>Operator</th>
            <th>Nominal</th>
            <th>Harga</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $no = 1;
         $query = $conn->query("SELECT * FROM penjualan a INNER JOIN pelanggan b ON a.pelanggan = b.id_pelanggan INNER JOIN pulsa c ON a.pulsa = c.id_pulsa WHERE a.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY a.id_penjualan DESC");
         foreach ($query as $plg) :
            $total[] = $plg['harga'];
         ?>
            <tr>
               <td><?= $no++ ?></td>
               <td><?= $plg['tanggal'] ?></td>
               <td><?= $plg['nama_pelanggan'] ?></td>
               <td><?= $plg['no_hp'] ?></td>
               <td><?= $plg['operator'] ?></td>
               <td><?= $plg['nominal'] ?></td>
               <td><?= $plg['harga'] ?></td>
            </tr>
         <?php
         endforeach
         ?>
         <tr>
            <td colspan="6" class="text-end me-1">Total Pendapatan</td>
            <td>Rp. <?= number_format(array_sum($total), 0, '.', ','); ?></td>
         </tr>
      </tbody>
   </table>
</body>

</html>