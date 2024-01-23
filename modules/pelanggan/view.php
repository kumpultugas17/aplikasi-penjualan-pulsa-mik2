<div class="row my-3">
   <div class="col-md-12">
      <h5>
         <!-- judul halaman tampil data penjualan -->
         <i class="fas fa-user-friends me-1 title-icon"></i> Data Penjualan

         <!-- Button trigger modal -->
         <button type="button" class="btn btn-sm btn-info text-white float-end" data-bs-toggle="modal" data-bs-target="#modalPelanggan">
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
         <table class="table table-striped border" id="data">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Nama Pelanggan</th>
                  <th>Nomo HP</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               $query = $conn->query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
               foreach ($query as $plg) :
               ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $plg['nama_pelanggan']; ?></td>
                     <td><?= $plg['no_hp']; ?></td>
                     <td>
                        <button type="button" class="btn btn-sm btn-info text-white" data-bs-target="#editPelanggan<?= $plg['id_pelanggan'] ?>" data-bs-toggle="modal">
                           <i class="fas fa-user-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-target="#hapusPelanggan<?= $plg['id_pelanggan'] ?>" data-bs-toggle="modal">
                           <i class="fas fa-trash"></i>
                        </button>
                     </td>
                  </tr>

                  <!-- Modal Edit-->
                  <div class="modal fade" id="editPelanggan<?= $plg['id_pelanggan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                 <i class="fas fa-user-edit"></i><span> Edit Data Pelanggan</span>
                              </h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pelanggan/proses_edit.php" method="POST">
                              <input type="hidden" name="id_pelanggan" value="<?= $plg['id_pelanggan']; ?>">
                              <div class="modal-body px-4">
                                 <div class="mb-2">
                                    <label class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= $plg['nama_pelanggan']; ?>" autocomplete="off">
                                 </div>
                                 <div class="mb-2">
                                    <label class="form-label" for="no_hp">No. HP</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $plg['no_hp']; ?>" autocomplete="off">
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
                  <div class="modal fade" id="hapusPelanggan<?= $plg['id_pelanggan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                 <i class="fas fa-trash"></i><span> Hapus Data Pelanggan</span>
                              </h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pelanggan/proses_hapus.php" method="POST">
                              <div class="modal-body px-4">
                                 <input type="hidden" name="id_pelanggan" value="<?= $plg['id_pelanggan']; ?>">
                                 <div class="fs-6">Apakah Pelanggan <strong><?= $plg['nama_pelanggan'] ?></strong> dengan nomor handphone <strong><?= $plg['no_hp'] ?></strong> akan dihapus?</div>
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
<div class="modal fade" id="modalPelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title fs-5" id="staticBackdropLabel">
               <i class="fas fa-user-plus"></i><span> Entry Data Pelanggan</span>
            </h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="modules/pelanggan/proses_tambah.php" method="POST">
            <div class="modal-body px-4">
               <div class="mb-2">
                  <label class="form-label">Nama Pelanggan</label>
                  <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan nama" autocomplete="off">
               </div>
               <div class="mb-2">
                  <label class="form-label" for="no_hp">No. HP</label>
                  <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor hp" autocomplete="off">
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