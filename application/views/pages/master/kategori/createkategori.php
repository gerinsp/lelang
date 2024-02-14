<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">

         <?= $this->session->flashdata('message'); ?>
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1><?php echo $this->lang->line('add'); ?> Data Kategori</h1>
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
               <form action="<?php echo base_url() . 'tambahdatakategori'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">

                  <div class="row">
                     <div class="col-md-6">
                        <label class="bmd-label-floating">Nama Kategori</label>
                        <input style="padding-bottom: 10px;text-align: left;" type="text" name="namakategori" class="form-control" value="<?= set_value('namakategori') ?>">
                        <?= form_error('namakategori', '<small class="text-danger">', '</small>'); ?>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="bmd-label-floating">Status Aktif</label>
                           <select name="statusshow" class="form-control">
                              <option value="1">Aktif</option>
                              <option value="0">Tidak Aktif</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="bmd-label-floating">Icon Kategori</label>
                           <input type="file" name="image" id="image" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                        </div>
                     </div>
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