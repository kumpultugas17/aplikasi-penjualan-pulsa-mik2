<?php
if (isset($_GET['id_pelanggan'])) {
   require_once '../../config/koneksi.php';
   $id_pelanggan = $_GET['id_pelanggan'];
   $query = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
   $pelanggan = mysqli_fetch_assoc($query);
   $data = array(
      'nama_pelanggan' => $pelanggan['nama_pelanggan']
   );
   echo json_encode($data);
}
