<div class="row my-3">
   <div class="col-md-12">
      <h5>
         <!-- judul halaman tampil data penjualan -->
         <i class="fas fa-user-alt me-1 title-icon"></i> Data Pengguna

         <!-- Button trigger modal -->
         <button type="button" class="btn btn-sm btn-info text-white float-end" data-bs-toggle="modal" data-bs-target="#modalTambah">
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
      if (isset($_SESSION['alert_konfirmasi'])) {
      ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i><strong>Gagal!</strong> <?= $_SESSION['alert_konfirmasi'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      <?php
      }
      unset($_SESSION['alert_konfirmasi']);
      ?>
      <div class="table-responsive">
         <table class="table table-striped border" id="data">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Nama Pengguna</th>
                  <th>E-Mail</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               $query = $conn->query("SELECT * FROM pengguna ORDER BY id_pengguna DESC");
               foreach ($query as $pgn) :
               ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $pgn['nama_pengguna']; ?></td>
                     <td><?= $pgn['email']; ?></td>
                     <td>
                        <button type="button" class="btn btn-sm btn-info text-white" data-bs-target="#editPengguna<?= $pgn['id_pengguna'] ?>" data-bs-toggle="modal">
                           <i class="fas fa-user-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-target="#hapusPengguna<?= $pgn['id_pengguna'] ?>" data-bs-toggle="modal">
                           <i class="fas fa-trash"></i>
                        </button>
                     </td>
                  </tr>

                  <!-- Modal Edit-->
                  <div class="modal fade" id="editPengguna<?= $pgn['id_pengguna'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                 <i class="fas fa-user-edit"></i><span> Edit Data pengguna</span>
                              </h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pengguna/proses_edit.php" method="POST">
                              <input type="hidden" name="id_pengguna" value="<?= $pgn['id_pengguna']; ?>">
                              <div class="modal-body px-4">
                                 <div class="mb-2">
                                    <label class="form-label">Nama pengguna</label>
                                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?= $pgn['nama_pengguna']; ?>" autocomplete="off">
                                 </div>
                                 <div class="mb-2">
                                    <label class="form-label" for="no_hp">No. HP</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $pgn['no_hp']; ?>" autocomplete="off">
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
                  <div class="modal fade" id="hapuspengguna<?= $pgn['id_pengguna'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                 <i class="fas fa-trash"></i><span> Hapus Data pengguna</span>
                              </h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form action="modules/pengguna/proses_hapus.php" method="POST">
                              <div class="modal-body px-4">
                                 <input type="hidden" name="id_pengguna" value="<?= $pgn['id_pengguna']; ?>">
                                 <div class="fs-6">Apakah pengguna <strong><?= $pgn['nama_pengguna'] ?></strong> dengan nomor handphone <strong><?= $pgn['no_hp'] ?></strong> akan dihapus?</div>
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
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title fs-5" id="staticBackdropLabel">
               <i class="fas fa-user-lock"></i><span> Entry Data Pengguna</span>
            </h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="modules/pengguna/proses_tambah.php" method="POST">
            <div class="modal-body px-4">
               <div class="mb-2">
                  <label class="form-label">Nama Pengguna</label>
                  <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan nama pengguna" autocomplete="off">
               </div>
               <div class="mb-2">
                  <label class="form-label" for="email">E-Mail</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan E-Mail" autocomplete="off">
               </div>
               <div class="mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" autocomplete="off">
               </div>
               <div class="mb-2">
                  <label class="form-label" for="konfirmasi">Konfirmasi</label>
                  <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" placeholder="Masukkan Ulang Password" autocomplete="off">
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