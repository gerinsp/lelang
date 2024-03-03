<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Data Pengajuan Harga</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Pengajuan Harga</li>
               </ol>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right;">
               <?php if ($user->role_id == 3) { ?>
                  <a class="btn btn-sm" style="background: transparent; border-color: #858796;color:black;text-decoration: none;border:3px solid;font-weight: bold;" class="collapse-item" href="<?php echo base_url() ?>tambahdatapengajuanharga"> <i class="fas fa-fw fa-plus"></i> <?php echo $this->lang->line('add'); ?> Data </a>
               <?php } ?>
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
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Produk</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal Pengajuan</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Sales</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Customer</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Harga</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              foreach ($pengajuan as $data) {
                              ?>
                                 <tr>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $no ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->nama_produk ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= date('j F Y', strtotime($data->tanggal_pengajuan)) ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->nama_sales ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->nama_customer ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= 'Rp ' . number_format($data->harga, 0, ',', '.') ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;">
                                       <?php if ($this->session->userdata('role_id') == 2) { ?>
                                          <?php if ($data->status_approve == 1) { ?>
                                             <a href="<?= base_url('status-pengajuan-tolak/' . $data->id_pengajuanharga); ?>" class="btn btn-sm btn-danger" role="button">
                                                <i class="fas fa-fw fa-ban"></i> Tolak
                                             </a>
                                             <a href="<?= base_url('status-pengajuan-terima/' . $data->id_pengajuanharga); ?>" class="btn btn-sm btn-success mr-1" role="button">
                                                <i class="fas fa-fw fa-check"></i> Terima
                                             </a>
                                          <?php } ?>
                                          <?php if ($data->status_approve == 2) { ?>
                                             <a href="#" class="btn btn-sm btn-success mr-1" role="button">
                                                <i class="fas fa-fw fa-check"></i> Diterima
                                             </a>
                                          <?php } ?>
                                          <?php if ($data->status_approve == 0) { ?>
                                             <a href="#" class="btn btn-sm btn-danger" role="button">
                                                <i class="fas fa-fw fa-ban"></i> Ditolak
                                             </a>
                                          <?php } ?>
                                       <?php } ?>
                                       <?php if ($this->session->userdata('role_id') == 3) { ?>
                                          <a href="<?= base_url('editdatapengajuanharga/' . $data->id_pengajuanharga); ?>" class="btn btn-sm btn-success" style="background: transparent; border-color: #858796;color:black;text-decoration: none;" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                       <?php } ?>
                                    </td>
                                 </tr>
                              <?php
                                 $no++;
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