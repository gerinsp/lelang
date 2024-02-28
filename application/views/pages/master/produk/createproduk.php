<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">

         <?= $this->session->flashdata('message'); ?>
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1><?php echo $this->lang->line('add'); ?> Data Produk</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Produk</li>
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
               <form action="<?php echo base_url() . 'tambahdataproduk'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">

                  <div class="row">
                     <div class="col-md-6">
                        <label class="bmd-label-floating">Nama Produk</label>
                        <input style="padding-bottom: 10px;text-align: left;" type="text" name="namaproduk" class="form-control" value="<?= set_value('namaproduk') ?>">
                        <?= form_error('namaproduk', '<small class="text-danger">', '</small>'); ?>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="bmd-label-floating">Kategori</label>
                           <select name="kategori" required class="form-control select2">
                              <option value="">Pilih Kategori</option>
                              <?php foreach ($kategori as $datakategori) { ?>
                                 <option value="<?= $datakategori->id_kategori ?>"><?= $datakategori->nama_kategori ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>

                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="bmd-label-floating">Durasi Iklan (Hari)</label>
                           <input name="durasiiklan" type="number" required class="form-control">
                        </div>
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
                  <div class="row" style="margin-bottom: 20px;">
                     <div class="col-md-12">
                        <label>Deskripsi Produk </label>
                        <div class="form-group">
                           <textarea style="padding-bottom: 10px;max-width: 845px;" rows="8" id="summernote" name="deskripsiproduk" class="form-control"></textarea>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="bmd-label-floating">Gambar</label>
                           <input type="file" name="image" id="image" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                        </div>
                     </div>
                  </div> -->
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