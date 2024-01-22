<div class="row my-3">
   <div class="col-md-12">
      <h5>
         <!-- judul halaman tampil data penjualan -->
         <i class="fas fa-tablet-alt title-icon"></i> Data Pulsa

         <!-- Button trigger modal -->
         <button type="button" class="btn btn-sm btn-info text-white float-end" data-bs-toggle="modal" data-bs-target="#addPulsa">
            <i class="fas fa-plus"></i> Tambah
         </button>
      </h5>
   </div>
</div>
<hr>
<div class="row">
   <div class="col-md-12">
      <!-- Pesan Suksess -->
      <?php
      if (isset($_SESSION['alert'])) {
      ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i><strong>Sukses!</strong> <?= $_SESSION['alert'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      <?php
      }
      unset($_SESSION['alert']);
      ?>
      <!-- Pesan Gagal -->
      <?php
      if (isset($_SESSION['alert'])) {
      ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i><strong>Gagal!</strong> <?= $_SESSION['alert'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      <?php
      }
      unset($_SESSION['alert']);
      ?>
      <div class="table-responsive">
         <table class="table table-striped table-bordered" id="dataTable" style="width:100%">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Operator</th>
                  <th>Nominal</th>
                  <th>Harga</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               $query = $conn->query("SELECT * FROM pulsa ORDER BY operator ASC");
               foreach ($query as $pls) :
               ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $pls['operator']; ?></td>
                     <td><?= $pls['nominal']; ?></td>
                     <td><?= $pls['harga'] ?></td>
                     <td>
                        <button type="button" class="btn btn-sm btn-info text-white" data-bs-target="#editPulsa<?= $pls['id_pulsa'] ?>" data-bs-toggle="modal">
                           <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-target="#hapusPulsa<?= $pls['id_pulsa'] ?>" data-bs-toggle="modal">
                           <i class="fas fa-trash"></i>
                        </button>
                     </td>
                  </tr>

                  <!-- Modal Edit-->
                  <div class="modal fade" id="editPulsa<?= $pls['id_pulsa'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                 <i class="fas fa-edit"></i><span> Update Data Pulsa</span>
                              </h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pulsa/proses_update.php" method="POST">
                              <input type="hidden" name="id_pulsa" value="<?= $pls['id_pulsa']; ?>">
                              <div class="modal-body px-4">
                                 <div class="mb-2">
                                    <label for="operator" class="form-label">Operator</label>
                                    <input type="text" class="form-control" id="operator" name="operator" value="<?= $pls['operator'] ?>" autocomplete="off">
                                 </div>
                                 <div class="mb-2">
                                    <label class="form-label" for="nominal">Nominal</label>
                                    <input type="number" class="form-control" id="nominal" name="nominal" value="<?= $pls['nominal'] ?>" autocomplete="off">
                                 </div>
                                 <div class="mb-2">
                                    <label class="form-label" for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $pls['harga'] ?>" autocomplete="off">
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" name="submit" class="btn btn-sm text-white btn-info">Simpan</button>
                                 <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

                  <!-- Modal Hapus-->
                  <div class="modal fade" id="hapusPulsa<?= $pls['id_pulsa'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                 <i class="fas fa-trash"></i><span> Hapus Data Pulsa</span>
                              </h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pulsa/proses_hapus.php" method="POST">
                              <div class="modal-body px-4">
                                 <input type="hidden" name="id_pulsa" value="<?= $pls['id_pulsa']; ?>">
                                 <div class="fs-6">Apakah data operator <strong><?= $pls['operator'] ?></strong> dengan nominal <strong><?= $pls['nominal'] ?></strong> akan dihapus?</div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" name="submit" class="btn btn-sm text-white btn-danger">Hapus</button>
                                 <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               <?php
               endforeach
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>


<!-- Modal Tambah-->
<div class="modal fade" id="addPulsa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title fs-5" id="staticBackdropLabel">
               <i class="fas fa-edit"></i><span> Entry Data Pulsa</span>
            </h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="modules/pulsa/proses_tambah.php" method="POST">
            <div class="modal-body px-4">
               <div class="mb-2">
                  <label for="operator" class="form-label">Operator</label>
                  <input type="text" class="form-control" id="operator" name="operator" placeholder="Masukkan operator" autocomplete="off">
               </div>
               <div class="mb-2">
                  <label class="form-label" for="nominal">Nominal</label>
                  <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan nominal pulsa" autocomplete="off">
               </div>
               <div class="mb-2">
                  <label class="form-label" for="harga">Harga</label>
                  <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga pulsa" autocomplete="off">
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" name="submit" class="btn btn-sm text-white btn-info">Simpan</button>
               <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
         </form>
      </div>
   </div>
</div>