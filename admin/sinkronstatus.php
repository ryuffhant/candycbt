<?php
require "../config/config.koneksipusat.php";
if ($koneksipusat) {
    $query = mysqli_fetch_array(mysqli_query($koneksipusat, "select * from server where kode_server='$setting[id_server]'"));

    if ($query['status'] == 'aktif') {
        $banksoalx = mysqli_num_rows(mysqli_query($koneksi, "select * from mapel where status='1'"));
        $soalx = mysqli_num_rows(mysqli_query($koneksi, 'select * from soal'));
        $siswax = mysqli_num_rows(mysqli_query($koneksi, "select * from siswa "));
        $ujianx = mysqli_num_rows(mysqli_query($koneksi, "select * from ujian "));

        $banksoal = mysqli_num_rows(mysqli_query($koneksipusat, "select * from mapel where status='1'"));
        $ujian = mysqli_num_rows(mysqli_query($koneksipusat, "select * from ujian where status='1'"));
        $soal = mysqli_num_rows(mysqli_query($koneksipusat, "select * from soal a left join mapel b ON a.id_mapel=b.id_mapel where b.status='1'"));
        $siswa = mysqli_num_rows(mysqli_query($koneksipusat, "select * from siswa where server='$setting[id_server]'"));
        echo "
        <table class='table table-striped'>
        <th>Nama Data</th>
        <th>Data di Lokal</th>
        <th>Data di Server</th>
        <tr>
            <td>Peserta Ujian</td>
            <td>$siswax</td>
            <td>$siswa</td>
        </tr>
        <tr>
            <td>Bank soal</td>
            <td>$banksoalx</td>
            <td>$banksoal</td>
        </tr>
        <tr>
            <td>Jumlah Soal</td>
            <td>$soalx</td>
            <td>$soal</td>
        </tr>
        <tr>
            <td>Jadwal Ujian</td>
            <td>$ujianx</td>
            <td>$ujian</td>
        </tr>
    </table>
    ";
    } else {
        echo "<center>
                    <h1 class='text-yellow'>SERVER BELUM DIAKTIFKAN</h1>
                </center>";
    }
} else {
    echo "<center>
    <h1 class='text-red'>SERVER TIDAK TERHUBUNG</h1>
</center>
";
}
