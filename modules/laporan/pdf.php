<?php
require_once '../../config/koneksi.php';
$tgl_awal = $_GET['tgl_awal'];
$tgl_akhir = $_GET['tgl_akhir'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body onload="window.print()">
   <table class="table table-striped table-bordered">
      <thead>
         <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>No. HP</th>
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
      </tbody>
   </table>
</body>

</html>