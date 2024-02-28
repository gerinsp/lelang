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
                                 <th style="width:15%; padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              foreach ($produk as $data) {
                              ?>
                                 <tr>
                                    <td>
                                       <a target="_blank" href="<?= base_url('assets/file/masterproduk/foto/') . $data->gambar1 ?>" data-toggle="lightbox" data-title="<?php echo $data->gambar1 ?> " data-gallery="gallery">

                                          <img loading="lazy" src="<?= base_url('assets/file/masterproduk/foto') . $data->gambar1 ?>" class="img-fluid mb-2" alt="Tidak Ada File" style="width: 200px;height: 200px;">
                                       </a>
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

                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                       <a href="<?= base_url('editdataproduk/' . $data->id); ?>" class="btn btn-sm btn-success" style="background: transparent; border-color: #858796;color:black;text-decoration: none;" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                       <a href="#" data-toggle="modal" style="background: transparent; border-color: #858796;color:black;text-decoration: none;" data-target="#deleteModal" data-id="<?= $data->id; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'produk/deleteproduk')" class="btn btn-sm btn-danger" role="button" title="Hapus"> <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                    </td>
                                 </tr>
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