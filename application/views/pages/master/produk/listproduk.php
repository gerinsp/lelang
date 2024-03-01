<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Data Produk</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Produk</li>
               </ol>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right;">
               <a class="btn btn-sm" style="background: transparent; border-color: #858796;color:black;text-decoration: none;border:3px solid;font-weight: bold;" class="collapse-item" href="<?php echo base_url() ?>tambahdataproduk"> <i class="fas fa-fw fa-plus"></i> <?php echo $this->lang->line('add'); ?> Data </a>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">

               <!-- /.card -->
               <div class="shadow card">

                  <!-- /.card-header -->
                  <div class="card-body">

                     <div class="table-responsive">
                        <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;" class="table tablelist table-bordered table-striped" width="100%" height="1px" cellspacing="0">
                           <thead>
                              <tr height="20px">
                                 <th style="width:15%; padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Gambar</th>
                                 </th>
                                 <th style="width:20%; padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Produk</th>
                                 <th style="width:15%; padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Kategori</th>
                                 <th style="width:10%; padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Durasi Iklan</th>
                                 <th style="width:10%; padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"> Status Aktif</th>
                                  <?php if ($this->session->userdata('role_id') == 1) { ?>
                                    <th style="width:15%; padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
                                  <?php } ?>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              foreach ($produk as $data) {
                              ?>
                                 <tr>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-<?= $data->id ?>">
                                            Lihat Gambar
                                        </button>
                                    </td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->nama_produk ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->nama_kategori ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->durasi_iklan ?> Hari</td>
                                    <?php if ($data->statustampil == 1) { ?>
                                       <td style="vertical-align: top;border-top: 1px solid #e3e6f0;color:green">Aktif</td>
                                    <?php } ?>
                                    <?php if ($data->statustampil == 0) { ?>
                                       <td style="vertical-align: top;border-top: 1px solid #e3e6f0;color:red">Tidak Aktif</td>
                                    <?php } ?>

                                    <?php if ($this->session->userdata('role_id') == 1) { ?>
                                        <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                            <a href="<?= base_url('editdataproduk/' . $data->id); ?>" class="btn btn-sm btn-success" style="background: transparent; border-color: #858796;color:black;text-decoration: none;" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                            <a href="#" data-toggle="modal" style="background: transparent; border-color: #858796;color:black;text-decoration: none;" data-target="#deleteModal" data-id="<?= $data->id; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'produk/deleteproduk')" class="btn btn-sm btn-danger" role="button" title="Hapus"> <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                        </td>
                                    <?php } ?>
                                 </tr>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal-<?= $data->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-xl">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">List Gambar Produk</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="row">
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar1) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar2) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar3) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar4) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar5) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar6) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar7) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar8) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar9) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar10) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar11) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                          <div class="mb-2">
                                                              <img src="<?= base_url('assets/file/iconproduk/'.$data->gambar12) ?>" width="200px" alt="gambar">
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              <?php
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- /.card -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>

         <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Function Javascript -->
<!-- End Function Javascript -->