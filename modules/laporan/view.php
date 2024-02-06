<div class="row my-3">
   <div class="col-md-12">
      <h5><i class="fas fa-file-alt title-icon"></i> Laporan Penjualan</h5>
   </div>
</div>
<hr>
<div class="row">
   <div class="col-md-12">
      <!-- Pesan jika data ditemukan -->
      <?php
      if (isset($_SESSION['alert'])) {
      ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i><strong>Sukses!</strong>
            <?= $_SESSION['alert'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      <?php
      }
      unset($_SESSION['alert']);
      ?>
      <!-- Pesan jika data tidak ditemukan -->
      <?php
      if (isset($_SESSION['alert_fail'])) {
      ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i><strong>Sukses!</strong>
            <?= $_SESSION['alert_fail'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      <?php
      }
      unset($_SESSION['alert_fail']);
      ?>

      <div class="mb-2">Filter</div>
      <form action="modules/laporan/get_data.php" class="row gx-2 gy-3 align-items-center" method="post">
         <div class="col-sm-6">
            <div class="input-group">
               <input type="date" name="tgl_awal" class="form-control" placeholder="Pilih tanggal awal" autocomplete="off" required>
               <div class="input-group-text">
                  to
               </div>
               <input type="date" name="tgl_akhir" class="form-control" placeholder="Pilih tanggal akhir" autocomplete="">
            </div>
         </div>
         <div class="col-sm-6">
            <button type="submit" name="cari" class="btn btn-info text-light">
               <i class="fas fa-search"></i> Cari
            </button>

            <!-- tombol export -->
            <?php
            if (isset($_SESSION['tgl_awal'])) {
               $tgl_awal = $_SESSION['tgl_awal'];
               $tgl_akhir = $_SESSION['tgl_akhir'];
            ?>

               <a target="_blank" href="modules/laporan/pdf.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>" class="btn btn-danger bg-gradient float-end me-2">Pdf</a>

               <a target="_blank" href="modules/laporan/excel.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>" class="btn btn-success bg-gradient float-end me-2">Excel</a>

            <?php } ?>
         </div>
      </form>



      <?php
      if (isset($_SESSION['tgl_awal'])) {
      ?>
         <hr class="my-4">
         <div class="table-responsive">
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
         </div>
      <?php
      }
      unset($_SESSION['tgl_awal']);
      unset($_SESSION['tgl_akhir']);
      ?>

   </div>
</div>