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
                           <?php if ($this->session->userdata('role_id') == 1) { ?>
                              <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Status</th>
                           <?php } ?>
                           <?php if ($this->session->userdata('role_id') != 1) { ?>
                              <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
                           <?php } ?>

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
                              <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><a href="#" style="text-decoration: none;color:gray" data-toggle="modal" data-target="#modaldetailcustomer" onclick="tampildetailcustomer(this,event)" data-idcustomer="<?= $data->id_customer ?>" data-namacustomer="<?= $data->nama_customer ?>" data-jeniskelamincustomer="<?= $data->jeniskelamincustomer ?>" data-alamatcustomer="<?= $data->alamatcustomer ?>" data-nohpcustomer="<?= $data->nohpcustomer ?>" data-nikcustomer="<?= $data->nikcustomer ?>"><?= $data->nama_customer ?></a></td>
                              <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= 'Rp ' . number_format($data->harga, 0, ',', '.') ?></td>
                              <td style="vertical-align: top;border-top: 1px solid #e3e6f0;">
                                 <?php if ($this->session->userdata('role_id') == 1) { ?>
                                    <?php if ($data->status_approve == 1) { ?>
                                       <a class="btn btn-sm btn-warning">
                                          <i class="fas fa-fw fa-info"></i> Pending
                                       </a>
                                    <?php } ?>
                                    <?php if ($data->status_approve == 2) { ?>
                                       <a class="btn btn-sm btn-success mr-1">
                                          <i class="fas fa-fw fa-check"></i> Diterima
                                       </a>
                                    <?php } ?>
                                    <?php if ($data->status_approve == 0) { ?>
                                       <a class="btn btn-sm btn-danger">
                                          <i class="fas fa-fw fa-ban"></i> Ditolak
                                       </a>
                                    <?php } ?>
                                 <?php } ?>
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
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Lightbox -->
<script src="<?= base_url('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') ?>"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>

<script>
   $(document).ready(function() {
      $('.tablelist').DataTable({});
   });
</script>