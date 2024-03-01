<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Permission</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Permission</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6" style="text-align: right;">
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
                            <div class="mb-3" style="display: flex;justify-content: space-between">
                                <select class="form-control" name="user_id" id="user_id" style="width: 250px">
                                    <?php foreach ($users as $user) { ?>
                                        <?php if ($user['id_user'] == $user_id) { ?>
                                            <option value="<?= $user['id_user'] ?>" selected><?= $user['username'] ?></option>
                                        <?php }else{ ?>
                                            <option value="<?= $user['id_user'] ?>"><?= $user['username'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <button class="btn btn-primary" id="btn-simpan">Simpan</button>
                            </div>
                            <div class="table-responsive">
                                <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;" class="table tablelist table-bordered table-striped" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                    <tr height="20px">
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Halaman</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result as $key => $data) {
                                        ?>
                                        <tr>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $no ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $data['nama_halaman'] ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id_halaman="<?= $key ?>" id="exampleCheck1" <?= $data['checked'] ?>>
                                                </div>
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

            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        const selectUser = document.getElementById('user_id');
        const btnSimpan = document.getElementById('btn-simpan');
        selectUser.addEventListener('change', () => {
            const selectedUserId = '<?= base_url('permission/') ?>' + selectUser.value;

            const redirectUrl = `${selectedUserId}`;

            window.location.href = redirectUrl;
        });

        btnSimpan.addEventListener('click', function () {
            const checkboxes = document.querySelectorAll('.form-check-input');

            const checkboxValues = [];

            checkboxes.forEach(checkbox => {
                const idHalaman = checkbox.getAttribute('id_halaman');
                const isChecked = checkbox.checked;

                checkboxValues.push({ idHalaman, isChecked });
            });

            $.ajax({
                url: '<?= base_url('permission-update') ?>',
                type: 'post',
                data: {
                    user_id: selectUser.value,
                    permission: checkboxValues
                },
                success: function (res) {
                    if (res.status == 'OK') {
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
        });
    </script>
</div>
<!-- /.content-wrapper -->

<!-- Function Javascript -->
<!-- End Function Javascript -->