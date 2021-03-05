<div class='row'>
    <div class='col-md-12'>

        <div class='box box-solid'>
            <div class='box-header with-border '>
                <h3 class='box-title'><i class='fa fa-file'></i> Data Hasil Ujian </h3>
                <div class='box-tools pull-right btn-group'>
                </div>
            </div><!-- /.box-header -->
            <div class='box-body'>


                <div class=''>

                    <div id='tabledataujian' class='table-responsive'>
                        <table class='table table-bordered table-striped  table-hover'>
                            <thead>
                                <tr>
                                    <th width='5px'>#</th>
                                    <th>Jenis Ujian</th>
                                    <th>Kode Ujian</th>
                                    <th>Nilai</th>
                                    <th>Temp_Jawaban</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if ($pengawas['level'] == 'guru') {
                                    $ujianQ = mysqli_query($koneksi, "SELECT * FROM nilai a join mapel b ON a.id_mapel=b.id_mapel where b.idguru='$id_pengawas' group by id_ujian");
                                } else {
                                    $ujianQ = mysqli_query($koneksi, "SELECT * FROM nilai a join mapel b ON a.id_mapel=b.id_mapel  group by id_ujian");
                                }
                                while ($ujian = mysqli_fetch_array($ujianQ)) {
                                    $cek = mysqli_num_rows(mysqli_query($koneksi, "select * from nilai where id_ujian='$ujian[id_ujian]' and ujian_selesai='' and id_siswa<>''"));
                                    $cek2 = mysqli_num_rows(mysqli_query($koneksi, "select * from jawaban where id_ujian='$ujian[id_ujian]'"));
                                    if ($cek <> 0 or $cek2 == 0) {
                                        $dis = 'disabled';
                                        $dis2 = '';
                                    } else {
                                        $dis = '';
                                        $dis2 = 'disabled';
                                    }
                                    $no++;
                                    $tempjawaban = mysqli_num_rows(mysqli_query($koneksi, "select * from jawaban where id_ujian='$ujian[id_ujian]'"));
                                    $datajawaban = mysqli_num_rows(mysqli_query($koneksi, "select * from hasil_jawaban where id_ujian='$ujian[id_ujian]'"));
                                    $datanilai = mysqli_num_rows(mysqli_query($koneksi, "select * from nilai where id_ujian='$ujian[id_ujian]'"));
                                    echo "
                                <tr>

                                    <td>$no</td>
                                    <td>$ujian[kode_ujian]</td>
                                    <td>$ujian[nama]</td>
                                    <td>$datanilai</td>
                                    <td>$tempjawaban</td>
                                    <td>$datajawaban</td>
                                    <td>
                                    <button data-id='$ujian[id_ujian]' class='pindahjwbn btn btn-xs btn-primary' $dis><i class='fa fa-refresh'></i> pindah Jawaban</button>
                                    <button data-id='$ujian[id_ujian]' class='hapusnilai btn btn-xs btn-danger' $dis2><i class='fa fa-trash'></i> Nilai</button>
                                    <button data-id='$ujian[id_ujian]' class='hapusjwbn btn btn-xs btn-danger' $dis2><i class='fa fa-trash'></i> Jawaban</button>
                                    
                                    </td>
                                </tr>
                                ";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <script>
            $(document).ready(function() {
                $(document).on('click', '.hapusnilai', function() {
                    var id = $(this).data('id');
                    console.log(id);
                    swal({
                        title: 'Apa anda yakin?',
                        text: "aksi ini akan menghapus data NILAI dan JAWABAN pada ujian ini!",

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: 'hapusnilai.php',
                                method: "POST",
                                data: 'id=' + id,
                                success: function(data) {
                                    swal({
                                        position: 'top-end',
                                        type: 'success',
                                        title: 'Data berhasil dihapus',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $("#tabledataujian").load(window.location + " #tabledataujian");
                                }
                            });
                        }
                    })

                });
                $(document).on('click', '.hapusjwbn', function() {
                    var id = $(this).data('id');
                    console.log(id);
                    swal({
                        title: 'Apa anda yakin?',
                        text: "aksi ini akan menghapus data jawaban pada ujian ini!",

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: 'hapusjawaban.php',
                                method: "POST",
                                data: 'id=' + id,
                                success: function(data) {
                                    swal({
                                        position: 'top-end',
                                        type: 'success',
                                        title: 'Data berhasil dihapus',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $("#tabledataujian").load(window.location + " #tabledataujian");
                                }
                            });
                        }
                    })

                });
                $(document).on('click', '.pindahjwbn', function() {
                    var id = $(this).data('id');
                    console.log(id);
                    swal({
                        title: 'Apa anda yakin?',
                        text: "aksi ini akan memindahkan dari temp_jawaban ke jawaban!",

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: 'ambiljawaban.php',
                                method: "POST",
                                data: 'id=' + id,
                                success: function(data) {
                                    swal({
                                        position: 'top-end',
                                        type: 'success',
                                        title: 'Data berhasil dipindahkan',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $("#tabledataujian").load(window.location + " #tabledataujian");
                                }
                            });
                        }
                    })

                });
            });
        </script>