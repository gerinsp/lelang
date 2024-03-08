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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 1</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar1) ?>" id="preview1" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '1')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar1" id="gambar1" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 2</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar2) ?>" id="preview2" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '2')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar2" id="gambar2" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 3</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar3) ?>" id="preview3" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '3')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar3" id="gambar3" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 4</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar4) ?>" id="preview4" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '4')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar4" id="gambar4" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 5</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar5) ?>" id="preview5" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '5')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar5" id="gambar5" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 6</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar6) ?>" id="preview6" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '6')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar6" id="gambar6" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 7</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar7) ?>" id="preview7" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '7')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar7" id="gambar7" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 8</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar8) ?>" id="preview8" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '8')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar8" id="gambar8" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 9</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar9) ?>" id="preview9" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '9')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar9" id="gambar9" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 10</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar10) ?>" id="preview10" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '10')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar10" id="gambar10" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 11</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar11) ?>" id="preview11" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '11')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar11" id="gambar11" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 12</label>
                                            <img src="<?= base_url('assets/file/iconproduk/' . $data->gambar12) ?>" id="preview12" style="display: block; max-width: 200px;" />
                                            <input onchange="previewImage(this, '12')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar12" id="gambar12" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        <a href="<?= base_url('listproduk'); ?>" class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>

                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <br><br><br><br>
    <script>
        function previewImage(input, id) {
            var preview = document.getElementById('preview' + id);
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
    <!-- /.content -->
</div>