<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Info</li>
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
                            <form action="<?php echo base_url() . 'tambahinfo'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">No. Telp</label>
                                            <input style="padding-bottom: 10px;text-align: left;" type="text" name="telepon" class="form-control" value="<?= isset($info->telepon) ? $info->telepon : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input style="padding-bottom: 10px;text-align: left;" type="email" name="email" class="form-control" value="<?= isset($info->email) ? $info->email : '' ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Alamat</label>
                                            <input style="padding-bottom: 10px;text-align: left;" type="text" name="alamat" class="form-control" value="<?= isset($info->alamat) ? $info->alamat : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Maps</label>
                                            <input style="padding-bottom: 10px;text-align: left;" type="text" name="maps" class="form-control" value="<?= isset($info->maps) ? htmlspecialchars($info->maps) : '' ?>" placeholder="Masukan link embed google maps">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                    Preview
                                </a>

                            </form>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Preview Halaman Info</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="height: 450px">
                                        <iframe src="<?= base_url('/info') ?>" class="card-iframe" style="height: 100%; width: 100%" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
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

<!-- Function Javascript -->
<!-- End Function Javascript -->