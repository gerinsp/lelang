<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Tentang Kami</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tantang Kami</li>
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
                            <form action="<?php echo base_url() . 'tambahtentangkami'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Visi Misi Perusahaan</label>
                                            <input style="padding-bottom: 10px;text-align: left;" type="text" name="visi_misi" class="form-control" value="<?= isset($tentangkami->visi_misi) ? $tentangkami->visi_misi : '' ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Sejarah Perusahaan</label>
                                        <div class="form-group">
                                            <textarea style="padding-bottom: 10px;max-width: 845px;" rows="8" id="summernote" name="sejarah" class="form-control"><?= isset($tentangkami->sejarah) ? $tentangkami->sejarah : '' ?></textarea>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Preview Halaman Tentang Kami</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="height: 450px">
                                        <iframe src="<?= base_url('/tentang-kami') ?>" class="card-iframe" style="height: 100%; width: 100%" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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