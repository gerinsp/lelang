<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href=""><b>Lelang System</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body" style="border-radius: 6px">
          <h3 style="margin-bottom: 30px;font-size: 2.3rem;margin-top: 0"><b>Form Login Admin</b></h3>
         <?= $this->session->flashdata('message'); ?>
         <form method="post" action="<?= base_url('login/admin') ?>">
            <div class="form-group has-feedback">
               <input style="border-radius: 6px" type="text" name="username" class="form-control" placeholder="Username" value="<?= isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>">
               <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
               <input style="border-radius: 6px" type="password" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" class="form-control form-control-user" id="password" name="password" placeholder="Password">
               <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="row">
               <div class="col-xs-8">
                  <div class="checkbox rounded icheck">
                     <label>
                        <input type="checkbox" value="" id="rememberMe" name="rememberMe" <?= (isset($_COOKIE['username']) && isset($_COOKIE['password'])) ? "checked" : '' ?>> Remember Me
                     </label>
                  </div>
               </div>
               <!-- /.col -->
               <div class="col-xs-4">
                  <button style="border-radius: 6px; background-color: rgb(23 162 184); border: rgb(23 162 184)" type="submit" class="btn btn-info btn-block btn-flat">Login</button>
               </div>
               <!-- /.col -->
            </div>
         </form>


      </div>
      <!-- /.login-box-body -->
   </div>
   <!-- /.login-box -->