<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Data Akun Sales</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Akun Sales</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">

               <!-- /.card -->
               <div class="shadow card">

                  <!-- /.card-header -->
                  <div class="card-body">

                     <div class="table-responsive">
                        <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;" class="table tablelist table-bordered table-striped" width="100%" height="1px" cellspacing="0">
                           <thead>
                              <tr height="20px">
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Sales</th>
                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">No HP</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Username</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              foreach ($sales as $data) {
                              ?>
                                 <tr>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $no ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->nama_sales ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->no_hp ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->username != null ? $data->username : '' ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;">
                                         <?php if ($data->id_user == null) { ?>
                                             <a href="#" data-toggle="modal" onclick="editModal('<?= $data->id_sales ?>', '<?= $data->nama_sales ?>')" data-target="#exampleModal" class="btn btn-sm btn-primary" role="button">
                                                 <i class="fas fa-fw fa-user-plus"></i> Buat Akun
                                             </a>
                                         <?php } else { ?>
                                             <a href="<?= base_url('reset-password/'.$data->id_user); ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-sm btn-warning mr-1" role="button">
                                                 <i class="fas fa-fw fa-key"></i> Reset Password
                                             </a>
                                         <?php } ?>
                                     </td>
                                 </tr>
                              <?php
                                  $no++;
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- /.card -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modal-title"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="exampleFormControlTextarea1">Username</label>
                              <input type="text" class="form-control" name="username" id="username" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlTextarea1">Password</label>
                              <input type="password" class="form-control" name="password" id="password" required>
                          </div>
                          <input type="hidden" id="id_sales" name="id_sales">
                          <input type="hidden" id="nama_sales" name="nama_sales">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button id="btn-save" type="button" class="btn btn-primary" onclick="buatAkun()">Submit</button>
                      </div>
                  </div>
              </div>
          </div>

         <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Function Javascript -->
<script>
    function editModal(id, name) {
        $('#modal-title').text('Buat Akun ' + name)
        $('#id_sales').val(id)
        $('#nama_sales').val(name)
    }
    function buatAkun() {
        if ($('#username').val() == '' && $('#password').val() == '') {
            alert('Username dan password tidak boleh kosong!')
            return
        }
        $.ajax({
            url: '<?= base_url('buat-akun') ?>',
            type: 'post',
            data: {
                id_sales: $('#id_sales').val(),
                nama_sales: $('#nama_sales').val(),
                username: $('#username').val(),
                password: $('#password').val()
            },
            success: function (res) {
                if(res.status == 'OK') {
                    Swal.fire({
                        icon: 'success',
                        title: 'sukses',
                        text: res.message
                    }).then(function () {
                        window.location.reload();
                    });
                }
            },
            error: function (err) {
                console.error(err)
            }
        })
    }
</script>
<!-- End Function Javascript -->