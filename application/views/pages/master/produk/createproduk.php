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
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nama Produk</label>
                                    <input style="padding-bottom: 10px;text-align: left;" type="text" name="namaproduk" class="form-control" value="<?= set_value('namaproduk') ?>">
                                    <?= form_error('namaproduk', '<small class="text-danger">', '</small>'); ?>
                                </div>
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
                            <?php if ($this->session->userdata('role_id') == 1) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Status Aktif</label>
                                        <select name="statusshow" class="form-control">
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->userdata('role_id') == 2) { ?>
                                <input type="hidden" name="statusshow" value="0">
                            <?php } ?>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-6">
                                <label>Harga Awal </label>
                                <div class="form-group">
                                    <input style="padding-bottom: 10px;max-width: 845px;" name="infopenyelenggara" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Info Penyelenggara </label>
                                <div class="form-group">
                                    <input style="padding-bottom: 10px;max-width: 845px;" rows="8" name="infopenyelenggara" class="form-control"></input>
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 1</label>
                                            <img id="preview1" style="display: none; max-width: 200px;" />
                                            <input onchange="previewImage(this, '1')" required accept="image/jpeg, image/jpg, image/png" type="file" name="gambar1" id="gambar1" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 2</label>
                                            <img id="preview2" style="display: none; max-width: 200px;" />
                                            <input onchange="previewImage(this, '2')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar2" id="gambar2" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 3</label>
                                            <img id="preview3" style="display: none; max-width: 200px;" />
                                            <input onchange="previewImage(this, '3')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar3" id="gambar3" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 4</label>
                                            <img id="preview4" style="display: none; max-width: 200px;" />
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
                                            <img id="preview5" style="display: none; max-width: 200px;" />
                                            <input onchange="previewImage(this, '5')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar5" id="gambar5" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 6</label>
                                            <img id="preview6" style="display: none; max-width: 200px;" />
                                            <input onchange="previewImage(this, '6')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar6" id="gambar6" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 7</label>
                                            <img id="preview7" style="display: none; max-width: 200px;" />
                                            <input onchange="previewImage(this, '7')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar7" id="gambar7" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 8</label>
                                            <img id="preview8" style="display: none; max-width: 200px;" />
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
                                            <img id="preview9" style="display: none; max-width: 200px;" />
                                            <input onchange="previewImage(this, '9')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar9" id="gambar9" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 10</label>
                                            <img id="preview10" style="display: none; max-width: 200px;" />
                                            <input onchange="previewImage(this, '10')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar10" id="gambar10" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 11</label>
                                            <img id="preview11" style="display: none; max-width: 200px;" />
                                            <input onchange="previewImage(this, '11')" accept="image/jpeg, image/jpg, image/png" type="file" name="gambar11" id="gambar11" class="form-control" style="height: 45px;" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gambar 12</label>
                                            <img id="preview12" style="display: none; max-width: 200px;" />
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
    <!-- /.content -->
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
</div>