<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">

         <?= $this->session->flashdata('message'); ?>
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1><?php echo $this->lang->line('add'); ?> Data Pengajuan Harga</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Pengajuan Harga</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="shadow card">
            <!-- /.card-header -->
            <div class="card-body">
               <form action="<?php echo base_url() . 'tambahdatapengajuanharga'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">

                  <div class="row">
                     <div class="col-md-6">
                        <label class="bmd-label-floating">NIK</label>
                        <input style="padding-bottom: 10px;text-align: left;" required type="number" name="nik" class="form-control" id="nik">

                     </div>
                     <div class="col-md-6">
                        <label class="bmd-label-floating">Nama Customer</label>
                        <input style="padding-bottom: 10px;text-align: left;" required type="text" name="namacustomer" id="namacustomer" class="form-control" readonly>
                        <input style="padding-bottom: 10px;text-align: left;" required type="hidden" name="idcustomer" id="idcustomer" class="form-control" readonly>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label class="bmd-label-floating">Produk</label>
                        <input style="padding-bottom: 10px;text-align: left;" required type="text" name="namaproduk" class="form-control" id="namaproduk">
                        <input style="padding-bottom: 10px;text-align: left;" required type="hidden" name="idproduk" class="form-control" id="idproduk">
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="bmd-label-floating">Harga</label>
                           <input style="padding-bottom: 10px;text-align: right;" type="text" name="harga" class="js-nilai form-control" required>
                        </div>
                     </div>
                  </div>
                  <button type="submit" id="btntambahpengajuanharga" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                  <a href="<?= base_url('listpengajuanharga'); ?>" class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>
               </form>
            </div>
         </div>
         <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>

<!--- Function JavaScript -->
<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<script>
   $("#nik").autocomplete({
      delay: 300, // milliseconds
      minLength: 3,
      source: function(request, response) {
         // Fetch data
         $.ajax({
            url: "<?= base_url() ?>Admin/get_customer",
            type: 'post',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function(data) {
               response(data);
            }
         });
      },
      select: function(event, ui) {
         // Set selection
         $('#namacustomer').val(ui.item.nama); // display the selected text
         $('#nik').val(ui.item.nik); // display the selected text
         $('#idcustomer').val(ui.item.value); // display the selected text 
         return false;
      },
      focus: function(event, ui) {
         $('#namacustomer').val(ui.item.nama); // display the selected text
         $('#nik').val(ui.item.nik); // display the selected text
         $('#idcustomer').val(ui.item.value); // display the selected text 
         return false;
      },
      response: function(event, ui) {
         // Mengubah tampilan hasil
         var results = ui.content;
         if (results.length === 0) {
            // Tidak ada hasil yang cocok
            results.push({
               label: 'Tidak ada hasil yang cocok',
               value: ''
            });
         }
         // Mengedit tampilan setiap hasil
      }
   });
   $("#namaproduk").autocomplete({
      delay: 300, // milliseconds
      minLength: 2,
      source: function(request, response) {
         // Fetch data
         $.ajax({
            url: "<?= base_url() ?>Admin/get_produk",
            type: 'post',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function(data) {
               response(data);
            }
         });
      },
      select: function(event, ui) {
         // Set selection
         $('#namaproduk').val(ui.item.label); // display the selected text 
         $('#idproduk').val(ui.item.value); // display the selected text 
         return false;
      },
      focus: function(event, ui) {
         $('#namaproduk').val(ui.item.nama); // display the selected text 
         $('#idproduk').val(ui.item.value); // display the selected text 
         return false;
      },
      response: function(event, ui) {
         // Mengubah tampilan hasil
         var results = ui.content;
         if (results.length === 0) {
            // Tidak ada hasil yang cocok
            results.push({
               label: 'Tidak ada hasil yang cocok',
               value: ''
            });
         }
         // Mengedit tampilan setiap hasil
      }
   });
</script>