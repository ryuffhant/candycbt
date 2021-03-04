<?php
$info1 = '';
if (isset($_POST['simpanserver'])) :
    $exec = mysqli_query($koneksi, "UPDATE setting SET id_server='$_POST[id_server]', db_folder='$_POST[db_folder]', db_host='$_POST[db_host]',db_name='$_POST[db_name]',db_user='$_POST[db_user]',db_pass='$_POST[db_pass]' WHERE id_setting='1'");
    if ($exec) {
        $info1 = info('Berhasil menyimpan pengaturan!', 'OK');
    }
endif; ?>
<div class='row'>
    <div class='col-md-12'>
        <div class='box box-solid'>
            <div class='box-header with-border'>
                <h3 class='box-title'><i class='fa fa-gear'></i> Setting Sinkronisasi</h3>
            </div><!-- /.box-header -->
            <div class='box-body'>
                <div class='box box-solid '>
                    <div class='box-header with-border'>
                        <h3 class='box-title'><i class='fa fa-desktop'></i> Status Server</h3>

                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <center><img id='loading-image' src='../dist/img/ajax-loader.gif' style='display:none; width:50px;' />
                            <center>
                                <div id='statusserver'>
                                </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <form action='' method='post' enctype='multipart/form-data'>

                    <div class='box-body'>

                        <?= $info1 ?>
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-3'>
                                    <label>ID SERVER</label>
                                    <input type='text' name='id_server' value="<?= $setting['id_server'] ?>" class='form-control' required='true' />
                                </div>
                                <div class='col-md-3'>
                                    <label>Folder Candy</label>
                                    <input type='text' name='db_folder' value="<?= $setting['db_folder'] ?>" class='form-control' />
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label>db_host/ip</label>
                                    <input type='text' name='db_host' value="<?= $setting['db_host'] ?>" class='form-control' required='true' />
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label>db_user</label>
                                    <input type='text' name='db_user' value="<?= $setting['db_user'] ?>" class='form-control' required='true' />
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label>db_password</label>
                                    <input type='text' name='db_pass' value="<?= $setting['db_pass'] ?>" class='form-control' />
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label>db_name</label>
                                    <input type='text' name='db_name' value="<?= $setting['db_name'] ?>" class='form-control' />
                                </div>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <button type='submit' name='simpanserver' class='btn btn-flat pull-right btn-success' style='margin-bottom:5px'><i class='fa fa-check'></i> Simpan</button>
                        </div>
                    </div><!-- /.box-body -->

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajax({
        type: 'POST',
        url: 'statusserver.php',
        beforeSend: function() {
            $('#loading-image').show();
        },
        success: function(response) {
            $('#statusserver').html(response);
            $('#loading-image').hide();

        }
    });
</script>