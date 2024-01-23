<?php
// set default timezone
date_default_timezone_set("ASIA/JAKARTA");
// koneksi database
require_once "koneksi.php";

// pelannggan
$pelanggan = $conn->query("SELECT COUNT(id_pelanggan) as jumlah_data FROM pelanggan");
$plg = mysqli_fetch_assoc($pelanggan);
$get_pelanggan = $plg['jumlah_data'];

// pulsa
$pulsa = $conn->query("SELECT COUNT(id_pulsa) as jumlah_data FROM pulsa");
$pls = mysqli_fetch_assoc($pulsa);
$get_pulsa = $pls['jumlah_data'];

// penjualan
// $penjualan = $conn->query("SELECT COUNT(id_penjualan) as jumlah_data FROM penjualan");
// $pjl = mysqli_fetch_assoc($penjualan);
// $get_penjualan = $pjl['jumlah_data'];
