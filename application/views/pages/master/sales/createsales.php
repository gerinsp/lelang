<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">

         <?= $this->session->flashdata('message'); ?>
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1><?php echo $this->lang->line('add'); ?> Data Sales</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Sales</li>
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
               <form action="<?php echo base_url() . 'tambahdatasales'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">

                  <div class="row">
                     <div class="col-md-4">
                        <label class="bmd-label-floating">Nama Sales</label>
                        <input style="padding-bottom: 10px;text-align: left;" type="text" name="namasales" class="form-control" value="<?= set_value('namasales') ?>">
                        <?= form_error('namasales', '<small class="text-danger">', '</small>'); ?>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="bmd-label-floating">Jenis Kelamin</label>
                           <select name="jeniskelamin" class="form-control">
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="bmd-label-floating">No HP</label>
                           <input style="padding-bottom: 10px;text-align: left;" type="number" name="nohp" class="form-control" value="<?= set_value('nohp') ?>">
                           <?= form_error('nohp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">

                        <label>Alamat </label>
                        <div class="form-group">
                           <textarea style="padding-bottom: 10px;max-width: 845px;" rows="8" name="alamat" class="form-control"></textarea>
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                  <a href="<?= base_url('listsales'); ?>" class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>
               </form>
            </div>
         </div>
         <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>