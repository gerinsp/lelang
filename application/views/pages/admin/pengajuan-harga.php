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
         <div class="row" style="margin-bottom: 20px;margin-top:20px">
            <?php if ($this->session->userdata('role_id') != 3) { ?>
               <div class="col-md-2">
                  <label class="bmd-label-floating">Sales</label>
                  <select id="sales" class="form-control select2" onchange="filterdatapengajuanharga()" name="sales" style="max-width: 250px;">
                     <option value="0">Pilih Sales</option>
                     <?php foreach ($sales as $datasales) { ?>
                        <option value="<?= $datasales->id_sales ?>"> <?= $datasales->nama_sales ?></option>
                     <?php } ?>
                  </select>
               </div>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 3) { ?>
               <div class="col-md-2" style="display: none;">
                  <select id="sales" class="form-control select2" onchange="filterdatapengajuanharga()" name="sales" style="max-width: 250px;">
                     <option value="0">Pilih Sales</option>
                  </select>
               </div>
            <?php } ?>

            <div class="col-md-2">
               <label class="bmd-label-floating">Customer</label>
               <select id="customer" class="form-control select2" onchange="filterdatapengajuanharga()" name="customer" style="max-width: 250px;">
                  <option value="0">Pilih Customer</option>
                  <?php foreach ($customer as $datacustomer) { ?>
                     <option value="<?= $datacustomer->id_customer ?>"> <?= $datacustomer->nama_customer ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="col-md-2">
               <label class="bmd-label-floating">Dari Tanggal</label>

               <input style="padding-bottom: 10px;max-width: 250px;" placeholder="<?php echo date('d-m-y'); ?>" type="date" name="from" id="from" class="form-control">

            </div>
            <div class="col-md-2">
               <label class="bmd-label-floating">Sampai Tanggal</label>
               <input style="padding-bottom: 10px;max-width: 250px;" placeholder="<?php echo date('Y-m-d'); ?>" type="date" name="to" id="to" class="form-control" onblur="filterdatapengajuanharga()">
            </div>
            <div class="col-md-1">
               <label class="bmd-label-floating" style="margin-bottom: 13px;">&nbsp;</label><br>
               <a class="text-info" id="btnresetpengajuanharga" onclick="resetfilterpengajuanharga()" style="text-decoration: none; max-width: 100px;margin-left: 5px; font-size: 18px;display: none;font-weight: bold;" class="collapse-item" href="#"> Reset Filter</a>
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
   <section class="content" style="padding-bottom: 70px;">
      <div id="tampil"></div>
      <div class="container-fluid" id="pengajuanharga">
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
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<script>
   function filterdatapengajuanharga() {
      // let k = $(this).val();
      // console.log(k);
      var sales = $("#sales").val();
      var customer = $("#customer").val();
      var from = $("#from").val();
      var to = $("#to").val();
      //console.log(brandproduk) 

      if (sales == "" && customer == "" && from == "" && to == "") {

         $('#btnresetpengajuanharga').hide();
      } else {

         $('#btnresetpengajuanharga').show();
      }
      $.ajax({
         url: "<?php echo base_url() . 'admin/filterpengajuanharga'; ?>",
         type: "post",
         data: {
            sales: sales,
            customer: customer,
            from: from,
            to: to,
         },
         success: function(data) {

            $('#tampil').html(data);
            $('#pengajuanharga').html("");
         }
      });
   }

   function resetfilterpengajuanharga() {
      $(document).on('click', '#btnresetpengajuanharga', function(e) {
         e.preventDefault();

         document.getElementById('select2-sales-container').innerHTML = "Pilih Sales"
         document.getElementById('select2-customer-container').innerHTML = "Pilih Customer"
         $("#sales").val("");
         $("#customer").val("");
         $("#from").val("");
         $("#to").val("");
         filterdatapengajuanharga();
         $('#btnresetpengajuanharga').hide();
      });
   }
</script>
<!-- /.content-wrapper -->

<!-- Function Javascript -->
<!-- End Function Javascript -->