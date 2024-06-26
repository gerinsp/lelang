<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Data Customer</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Customer</li>
               </ol>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right;">
               <?php if ($user->role_id != 1) { ?>
                  <a class="btn btn-sm" style="background: transparent; border-color: #858796;color:black;text-decoration: none;border:3px solid;font-weight: bold;" class="collapse-item" href="<?php echo base_url() ?>tambahdatacustomer"> <i class="fas fa-fw fa-plus"></i> <?php echo $this->lang->line('add'); ?> Data </a>
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
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Gambar</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Customer</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Jenis Kelamin</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Alamat</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">No Handphone</th>

                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Create Date</th>
                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Update Date</th>
                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Create By</th>
                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Update By</th>
                                 <!-- <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">No Nama Sales</th> -->
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              foreach ($customer as $data) {
                              ?>
                                 <tr>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-<?= $data->id_customer ?>">
                                          Lihat Gambar
                                       </button></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $no ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->nama_customer ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->jenis_kelamin ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->alamat ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->no_hp ?></td>

                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->create_date ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->update_date ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->create_by ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->update_by ?></td>
                                    <!-- <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->nama_customer ?></td> -->
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                       <a href="<?= base_url('editdatacustomer/' . $data->id_customer); ?>" class="btn btn-sm btn-success" style="background: transparent; border-color: #858796;color:black;text-decoration: none;" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                    </td>
                                 </tr>

                                 <!-- Modal -->
                                 <div class="modal fade" id="exampleModal-<?= $data->id_customer ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">List Foto</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <div class="row">
                                                <div class="col-md-3">
                                                   <label for="" style="text-align: center;margin-left: 70px;">Foto KTP</label>
                                                   <div class="mb-2">
                                                      <img src="<?= base_url('assets/file/customer/' . $data->foto_ktp) ?>" width="200px" alt="gambar">
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <label for="" style="text-align: center;margin-left: 70px;">Foto KK</label>
                                                   <div class="mb-2">
                                                      <img src="<?= base_url('assets/file/customer/' . $data->foto_kk) ?>" width="200px" alt="gambar">
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <label for="" style="text-align: center;margin-left: 70px;">Foto Diri</label>
                                                   <div class="mb-2">
                                                      <img src="<?= base_url('assets/file/customer/' . $data->foto_diri) ?>" width="200px" alt="gambar">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                              <a target="_blank" href="<?= base_url('download-images-cust') ?>/<?= $data->id_customer ?>" class="btn btn-primary">Download All</a>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
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