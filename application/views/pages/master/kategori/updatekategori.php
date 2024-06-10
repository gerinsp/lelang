<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">

         <?= $this->session->flashdata('message'); ?>
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Ubah Data Kategori</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Kategori</li>
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
               <?php foreach ($kategori as $data) ?>
               <form action="<?php echo base_url() . 'kategori/updatekategori'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">

                  <div class="row">
                     <div class="col-md-6">
                        <label class="bmd-label-floating">Nama Kategori</label>
                        <input style="padding-bottom: 10px;text-align: left;" type="text" name="namakategori" class="form-control" value="<?= $data->nama_kategori ?>">
                        <input style="padding-bottom: 10px;text-align: left;" type="hidden" name="idkategori" class="form-control" value="<?= $data->id_kategori ?>">
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="bmd-label-floating">Status Aktif</label>
                           <select name="statusshow" class="form-control">
                              <?php if ($data->status_show == 1) {  ?>
                                 <option value="<?= $data->status_show ?>">Aktif</option>
                                 <option value="0">Tidak Aktif</option>
                              <?php } ?>
                              <?php if ($data->status_show == 0) {  ?>
                                 <option value="<?= $data->status_show ?>">Tidak Aktif</option>
                                 <option value="1">Aktif</option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="bmd-label-floating">Icon Kategori</label>
                           <input style="padding-bottom: 10px;text-align: left;" type="hidden" name="iconkategoriold" class="form-control" value="<?= $data->icon_kategori ?>">
                           <input type="file" name="image" id="image" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                        </div>
                     </div>
                  </div>
                   <div id="dynamic-form">
                       <?php foreach ($input_produk as $index => $input) { ?>
                           <div class="row mb-3">
                               <div class="col-md-5">
                                   <div class="form-group">
                                       <label class="bmd-label-floating">Nama Input</label>
                                       <input type="text" class="form-control" name="nama_input[]" value="<?= $input['nama_input'] ?>">
                                   </div>
                               </div>
                               <div class="col-md-5">
                                   <div class="form-group">
                                       <label class="bmd-label-floating">Tipe Data</label>
                                       <select name="tipe_data[]" class="form-control">
                                           <option value="text" <?= $input['tipe_data'] == 'text' ? 'selected' : '' ?>>Text</option>
                                           <option value="date" <?= $input['tipe_data'] == 'date' ? 'selected' : '' ?>>Date</option>
                                           <option value="number" <?= $input['tipe_data'] == 'number' ? 'selected' : '' ?>>Number</option>
                                       </select>
                                   </div>
                               </div>
                               <div class="col-md-2" style="margin-top: 35px;">
                                   <?php if ($index == 0) { ?>
                                       <a class="btn btn-primary" onclick="addInputField(event)">
                                           <i class="fas fa-plus"></i>
                                       </a>
                                   <?php } else { ?>
                                       <a class="btn btn-danger" onclick="removeInputField(event)">
                                           <i class="fas fa-minus"></i>
                                       </a>
                                   <?php } ?>
                               </div>
                           </div>
                       <?php } ?>
                   </div>
                  <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                  <a href="<?= base_url('listkategori'); ?>" class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>

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
    function addInputField(event) {
        event.preventDefault();
        const form = document.getElementById('dynamic-form');
        const newField = document.createElement('div');
        newField.classList.add('row');
        newField.innerHTML = `
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Input</label>
                        <input type="text" class="form-control" name="nama_input[]">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="bmd-label-floating">Tipe Data</label>
                        <select name="tipe_data[]" class="form-control">
                            <option value="text">Text</option>
                            <option value="date">Date</option>
                            <option value="number">Number</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2" style="margin-top: 35px;">
                    <a class="btn btn-danger" onclick="removeInputField(event)">
                        <i class="fas fa-minus"></i>
                    </a>
                </div>
            `;
        form.appendChild(newField);
    }

    function removeInputField(event) {
        event.preventDefault();
        const button = event.currentTarget;
        const row = button.closest('.row');
        row.remove();
    }
</script>