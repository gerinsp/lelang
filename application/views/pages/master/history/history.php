<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Data History Website</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">History</li>
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
                      <div class="d-flex justify-content-between align-items-center">
                          <button onclick="printTable()" class="btn btn-primary">
                              <i class="fas fa-print"></i> Print
                          </button>

                          <form action="<?= base_url('history') ?>" method="get" class="mb-0">
                              <div class="d-flex align-items-center" style="gap: 20px;">
                                  <select name="id_menu" id="id_menu" class="form-control">
                                      <option value="">Semua</option>
                                      <?php foreach ($menu as $m) { ?>
                                          <?php if ($m->id == $id_menu) { ?>
                                              <option value="<?= $m->id ?>" selected><?= $m->nama_menu ?></option>
                                          <?php } else { ?>
                                              <option value="<?= $m->id ?>"><?= $m->nama_menu ?></option>
                                          <?php } ?>
                                      <?php } ?>
                                  </select>
                                  <button type="submit" class="btn btn-info">Filter</button>
                              </div>
                          </form>
                      </div>

                      <hr>
                     <div class="table-responsive">
                        <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;" class="table tablelist table-bordered table-striped" width="100%" height="1px" cellspacing="0">
                           <thead>
                              <tr height="20px">
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;" width="6%"><?php echo $this->lang->line('number'); ?></th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;" width="50%">Keterangan</th>
                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              foreach ($history as $data) {
                              ?>
                                 <tr>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $no ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->nama ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->keterangan ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->tanggal ?></td>
                                 </tr>
                              <?php
                                 $no++;
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>


                      <div class="table-responsive" id="printArea" style="display: none">
                          <div class="text-center">
                              <h5>Laporan History Website</h5>
                          </div>
                          <br>
                          <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;" class="table table-bordered table-striped" width="100%" height="1px" cellspacing="0">
                              <thead>
                              <tr height="20px">
                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;" width="6%"><?php echo $this->lang->line('number'); ?></th>
                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama</th>
                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;" width="50%">Keterangan</th>
                                  <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $no = 1;
                              foreach ($history as $data) {
                                  ?>
                                  <tr>
                                      <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $no ?></td>
                                      <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->nama ?></td>
                                      <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->keterangan ?></td>
                                      <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?= $data->tanggal ?></td>
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

         <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    function printTable() {
        var printContents = document.getElementById('printArea').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        window.location.reload();
    }
</script>
<!-- Function Javascript -->
<!-- End Function Javascript -->