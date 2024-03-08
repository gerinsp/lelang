<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">

         <?= $this->session->flashdata('message'); ?>
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1><?php echo $this->lang->line('change'); ?> Data Customer</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Customer</li>
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
               <?php foreach ($customer as $data) ?>
               <form action="<?php echo base_url() . 'customer/updatecustomer'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">

                  <div class="row">
                     <div class="col-md-6">
                        <label class="bmd-label-floating">NIK</label>
                        <input style="padding-bottom: 10px;text-align: left;" type="number" name="nik" class="form-control" value="<?= $data->nik ?>">
                        <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                     </div>
                     <div class="col-md-6">
                        <label class="bmd-label-floating">Nama Customer</label>
                        <input style="padding-bottom: 10px;text-align: left;" type="text" name="namacustomer" class="form-control" value="<?= $data->nama_customer ?>">
                        <input style="padding-bottom: 10px;text-align: left;" type="hidden" name="idcustomer" class="form-control" value="<?= $data->id_customer ?>">
                        <?= form_error('namacustomer', '<small class="text-danger">', '</small>'); ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="bmd-label-floating">Jenis Kelamin</label>
                           <select name="jeniskelamin" class="form-control">
                              <?php if ($data->jenis_kelamin == "Laki-Laki") { ?>
                                 <option value="<?= $data->jenis_kelamin ?>"><?= $data->jenis_kelamin ?></option>
                                 <option value="Perempuan">Perempuan</option>
                              <?php } else if ($data->jenis_kelamin == "Perempuan") { ?>
                                 <option value="<?= $data->jenis_kelamin ?>"><?= $data->jenis_kelamin ?></option>
                                 <option value="Laki-Laki">Laki-Laki</option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="bmd-label-floating">No HP</label>
                           <input style="padding-bottom: 10px;text-align: left;" type="number" name="nohp" class="form-control" value="<?= $data->no_hp ?>">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="bmd-label-floating">Foto KTP</label>
                                 <img id="preview1" src="<?= base_url('assets/file/customer/' . $data->foto_ktp) ?>" style="display: block; max-width: 200px;" />
                                 <input onchange="previewImage(this, '1')" required accept="image/jpeg, image/jpg, image/png" type="file" name="gambar1" id="gambar1" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="bmd-label-floating">Foto KK</label>
                                 <img id="preview2" src="<?= base_url('assets/file/customer/' . $data->foto_kk) ?>" style="display: block; max-width: 200px;" />
                                 <input onchange="previewImage(this, '2')" required accept="image/jpeg, image/jpg, image/png" type="file" name="gambar2" id="gambar2" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="bmd-label-floating">Foto Diri</label>
                                 <img id="preview3" src="<?= base_url('assets/file/customer/' . $data->foto_diri) ?>" style="display: block; max-width: 200px;" />
                                 <input onchange="previewImage(this, '3')" required accept="image/jpeg, image/jpg, image/png" type="file" name="gambar3" id="gambar3" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">

                        <label>Alamat </label>
                        <div class="form-group">
                           <textarea style="padding-bottom: 10px;max-width: 845px;" rows="8" name="alamat" class="form-control"><?= $data->alamat ?></textarea>
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                  <a href="<?= base_url('listcustomer'); ?>" class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>
               </form>
            </div>
         </div>
         <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<script>
   function previewImage(input, id) {
      var preview = document.getElementById('preview' + id);
      var file = input.files[0];

      if (file) {
         var reader = new FileReader();

         reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
         };

         reader.readAsDataURL(file);
      } else {
         preview.src = '';
         preview.style.display = 'none';
      }
   }
</script>