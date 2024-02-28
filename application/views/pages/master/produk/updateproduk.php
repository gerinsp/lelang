<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">

         <?= $this->session->flashdata('message'); ?>
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Edit Data Produk</h1>
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
               <form action="<?php echo base_url() . 'produk/updateproduk'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                  <?php foreach ($produk as $data)   ?>
                  <div class="row">
                     <div class="col-md-6">
                        <label class="bmd-label-floating">Nama Produk</label>
                        <input style="padding-bottom: 10px;text-align: left;" required type="text" name="namaproduk" class="form-control" value="<?= $data->nama_produk ?>">
                        <input style="padding-bottom: 10px;text-align: left;" required type="hidden" name="idproduk" class="form-control" value="<?= $data->id ?>">
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="bmd-label-floating">Kategori</label>
                           <select name="kategori" required class="form-control select2">
                              <option value="<?= $data->id_kategori ?>"><?= $data->nama_kategori ?></option>
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
                           <input name="durasiiklan" value="<?= $data->durasi_iklan ?>" type="number" required class="form-control">
                        </div>
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
                  <div class="row" style="margin-bottom: 20px;">
                     <div class="col-md-12">
                        <label>Deskripsi Produk </label>
                        <div class="form-group">
                           <textarea style="padding-bottom: 10px;max-width: 845px;" rows="8" id="summernote" name="deskripsiproduk" class="form-control"><?= $data->deskripsi_produk ?></textarea>
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