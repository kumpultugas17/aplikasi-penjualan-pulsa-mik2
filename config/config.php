<?php
// set default timezone
date_default_timezone_set("ASIA/JAKARTA");
// koneksi database
require_once "koneksi.php";

// pelannggan
$pelanggan = $conn->query("SELECT COUNT(id_pelanggan) as pelanggan FROM pelanggan");
$plg = mysqli_fetch_assoc($pelanggan);
$get_pelanggan = $plg['pelanggan'];

// pulsa
$pulsa = $conn->query("SELECT COUNT(id_pulsa) as pulsa FROM pulsa");
$pls = mysqli_fetch_assoc($pulsa);
$get_pulsa = $pls['pulsa'];

// penjualan
$penjualan = $conn->query("SELECT COUNT(id_penjualan) as penjualan FROM penjualan");
$pjl = mysqli_fetch_assoc($penjualan);
$get_penjualan = $pjl['penjualan'];

// pendapatan
$pendapatan = $conn->query("SELECT SUM(jumlah_bayar) as jumlah FROM penjualan");
$pdt = mysqli_fetch_assoc($pendapatan);
$get_pendapatan = $pdt['jumlah'];
