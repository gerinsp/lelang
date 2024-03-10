<footer class="main-footer">
   <strong>Copyright &copy; 2024 <a href="<?= base_url('dashboard') ?>">Lelang</a>.</strong>
   All rights reserved.
   <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
   </div>
</footer>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('confirmlogout'); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body"><?php echo $this->lang->line('messagelogout'); ?></div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
            <a class="btn btn-info" href="<?= base_url('auth/logout') ?>"><?php echo $this->lang->line('logout'); ?></a>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modaldetailcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Customer</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <label for="">NIK</label>
                  <input class="form-control" type="text" name="nik" id="nikcustomer" readonly>
               </div>
               <div class="col-md-6">
                  <label for="">Nama</label>
                  <input class="form-control" type="text" name="nama" id="namacustomer" readonly>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <label for="">Jenis Kelamin</label>
                  <input class="form-control" type="text" name="jeniskelamin" id="jeniskelamincustomer" readonly>
               </div>
               <div class="col-md-6">
                  <label for="">No HP</label>
                  <input class="form-control" type="text" name="nohp" id="nohpcustomer" readonly>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <label for="">Alamat</label>
                  <textarea class="form-control" readonly name="alamatcustomer" id="alamatcustomer" cols="30" rows="5"></textarea>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modalakunadmin" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form action="<?= base_url('admin/buat_akunadmin') ?>" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="logoutLabel">Tambah Akun Admin</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <label for="">Nama</label>
                     <input type="text" name="namaakunadmin" class="form-control">
                  </div>
                  <div class="col-md-6">
                     <label for="">Username</label>
                     <input type="text" name="username" class="form-control">
                  </div>
               </div>
            </div>
            <div class="modal-footer">

               <button type="submit" class="btn btn-primary"> Simpan </button> <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="modal fade" id="modaleditakunadmin" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form action="<?= base_url('admin/update_akunadmin') ?>" method="post">
            <div class="modal-header">
               <h5 class="modal-title" id="logoutLabel">Ubah Akun Admin</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <label for="">Nama</label>
                     <input type="text" name="namaakunadminedit" id="namaakunadminedit" class="form-control">
                     <input type="hidden" name="iduseredit" id="iduseredit" class="form-control">
                  </div>
                  <div class="col-md-6">
                     <label for="">Username</label>
                     <input type="text" name="usernameadminedit" id="usernameadminedit" class="form-control">
                  </div>
               </div>
            </div>
            <div class="modal-footer">

               <button type="submit" class="btn btn-primary"> Simpan </button> <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="logoutLabel"><?php echo $this->lang->line('headconfirmdelete'); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body"><?php echo $this->lang->line('confirmdelete'); ?></div>
         <div class="modal-footer">
            <?= form_open('', 'class="d-inline" id="formLinkDelete"') ?>
            <input type="hidden" name="id" id="valueId">
            <button type="submit" class="btn btn-danger"> <?php echo $this->lang->line('yes'); ?> </button> <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $this->lang->line('no'); ?></button>
            <?= form_close(); ?>
         </div>
      </div>
   </div>
</div>
</div>
<!-- ./wrapper -->