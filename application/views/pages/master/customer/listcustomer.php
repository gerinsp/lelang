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
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Customer</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Jenis Kelamin</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Alamat</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">No Handphone</th>
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
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $no ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->nama_customer ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->jenis_kelamin ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->alamat ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->no_hp ?></td>
                                    <!-- <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data->nama_customer ?></td> -->
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                       <a href="<?= base_url('editdatacustomer/' . $data->id_customer); ?>" class="btn btn-sm btn-success" style="background: transparent; border-color: #858796;color:black;text-decoration: none;" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
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