<div class="row my-3">
   <div class="col-md-12">
      <div class="alert alert-info py-2" role="alert">
         <i class="fas fa-info-circle title-icon"></i> Selamat Datang <strong><?= $_SESSION['nama_pengguna'] ?></strong> di ELTIPonsel.
         <p class="float-end"><?= date('l, d F Y') ?> <span>| Pukul <span id="jam"></span> WIB</span></p>
      </div>
   </div>
</div>
<div class="row g-3">
   <!-- menampilkan informasi jumlah data pelanggan -->
   <div class="col-lg-3 col-md-6">
      <div class="card text-center">
         <div class="text-center mt-4">
            <i class="fas fa-user text-warning fa-7x"></i>
         </div>
         <div class="card-body">
            <h4 class="card-title" id="loadPelanggan"><?= $get_pelanggan; ?></h4>
            <p class="card-text">Data Pelanggan</p>
         </div>
      </div>
   </div>
   <!-- menampilkan informasi jumlah data pulsa -->
   <div class="col-lg-3 col-md-6">
      <div class="card text-center">
         <div class="text-center mt-4">
            <i class="fas fa-tablet-alt text-info fa-7x"></i>
         </div>
         <div class="card-body">
            <h4 class="card-title" id="loadPulsa"><?= $get_pulsa; ?></h4>
            <p class="card-text">Data Pulsa</p>
         </div>
      </div>
   </div>
   <!-- menampilkan informasi jumlah data penjualan -->
   <div class="col-lg-3 col-md-6">
      <div class="card text-center">
         <div class="text-center mt-4">
            <i class="fas fa-shopping-cart text-danger fa-7x"></i>
         </div>
         <div class="card-body">
            <h4 class="card-title" id="loadPenjualan"><?= $get_penjualan; ?></h4>
            <p class="card-text">Data Penjualan</p>
         </div>
      </div>
   </div>
   <!-- menampilkan informasi jumlah total penjualan -->
   <div class="col-lg-3 col-md-6">
      <div class="card text-center">
         <div class="text-center mt-4">
            <i class="fas fa-dollar-sign text-success fa-7x"></i>
         </div>
         <div class="card-body">
            <h4 class="card-title" id="loadTotal">Rp <?= number_format($get_pendapatan, 2, ',', '.'); ?></h4>
            <p class="card-text">Total Pendapatan</p>
         </div>
      </div>
   </div>
</div>