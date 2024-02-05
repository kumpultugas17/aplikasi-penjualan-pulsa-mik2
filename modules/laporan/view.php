<div class="row my-3">
   <div class="col-md-12">
      <h5><i class="fas fa-file-alt title-icon"></i> Laporan Penjualan</h5>
   </div>
</div>
<hr>
<div class="row">
   <div class="col-md-12">
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
         </div>
      </form>

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
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>