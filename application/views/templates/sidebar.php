<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <a href="<?= base_url('profile') ?>" class="d-block">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
               <img src="<?= base_url('assets/img/profile/') . $user->image ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
               <p style="margin-bottom: 0px;"><?= $user->nama ?></p>
            </div>
         </div>
      </a>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
         <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
               <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
               </button>
            </div>
         </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
               <a href="<?= base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == "dashboard") {
                                                                           echo "active";
                                                                        } ?>"">
                  <i class=" nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <?php if ($this->session->userdata('role_id') == 1) { ?>
             <li class="nav-header">Master</li>
             <li class="nav-item">
                 <a href="<?= base_url('listproduk') ?>" class="nav-link <?php if ($this->uri->segment(1) == "listproduk") {
                     echo "active";
                 } ?><?php if ($this->uri->segment(1) == "tambahdataproduk") {
                     echo "active";
                 } ?><?php if ($this->uri->segment(1) == "editdataproduk") {
                     echo "active";
                 } ?>">
                     <i class=" nav-icon fas fa-fw fa-box"></i>
                     <p>Produk</p>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="<?= base_url('listkategori') ?>" class="nav-link <?php if ($this->uri->segment(1) == "listkategori") {
                     echo "active";
                 } ?><?php if ($this->uri->segment(1) == "tambahdatakategori") {
                     echo "active";
                 } ?><?php if ($this->uri->segment(1) == "editdatakategori") {
                     echo "active";
                 } ?>">
                     <i class=" nav-icon fas fa-fw fa-list"></i>
                     <p>Kategori Produk</p>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="<?= base_url('listsales') ?>" class="nav-link <?php if ($this->uri->segment(1) == "listsales") {
                     echo "active";
                 } ?><?php if ($this->uri->segment(1) == "tambahdatasales") {
                     echo "active";
                 } ?><?php if ($this->uri->segment(1) == "editdatasales") {
                     echo "active";
                 } ?><?php if ($this->uri->segment(1) == "detaildatasales") {
                     echo "active";
                 } ?>">
                     <i class=" nav-icon fas fa-fw fa-users"></i>
                     <p>Sales</p>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="<?= base_url('listcustomer') ?>" class="nav-link <?php if ($this->uri->segment(1) == "listcustomer") {
                     echo "active";
                 } ?>">
                     <i class=" nav-icon fas fa-fw fa-users"></i>
                     <p>Customer</p>
                 </a>
             </li>
            <?php } ?>
             <?php if ($this->session->userdata('role_id') == 2) { ?>
             <li class="nav-item">
                 <li class="nav-item">
                     <a href="<?= base_url('akunsales') ?>" class="nav-link <?php if ($this->uri->segment(1) == "akunsales") {
                         echo "active";
                     } ?>">
                         <i class=" nav-icon fas fa-fw fa-users"></i>
                         <p>Akun Sales</p>
                     </a>
                 </li>
                 <a href="<?= base_url('pengajuan') ?>" class="nav-link <?php if ($this->uri->segment(1) == "pengajuan") {
                     echo "active";
                 } ?>">
                     <i class="fas fa-fw fa-wallet"></i>
                     <p>Pengajuan Harga</p>
                 </a>
             </li>
             <?php } ?>
            <li class="nav-header">Profil</li>
            <li class="nav-item">
               <a href="<?= base_url('profile') ?>" class="nav-link <?php if ($this->uri->segment(1) == "profile") {
                                                                        echo "active";
                                                                     } ?>">
                  <i class=" nav-icon fas fa-user"></i>
                  <p>Profil</p>
               </a>
            </li>
            <li class="nav-header">Keluar</li>
            <li class="nav-item">
               <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>