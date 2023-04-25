<?php

include("../../config/connection.php");



$sql = "SELECT tamu.nama, tamu.alamat, tamu.satuan_kerja, kunjungan.tgl_kunjung, kunjungan.jml_rombongan FROM tamu INNER JOIN kunjungan WHERE tamu.nik = kunjungan.id_tamu;";
$res = mysqli_query($connect, $sql);
?>

<table class='table'>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Satuan Kerja</th>
        <th>Tgl Kunjungan</th>
        <th>Jml Rombongan</th>
      </tr>
    </thead>

<?php
$no=1;
while($row = mysqli_fetch_array($res)){

?>

    <tbody>
    <tr>
        <th><?= $no ?></th>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['satuan_kerja'] ?></td>
        <td><?= date('d F Y', strtotime($row['tgl_kunjung'])) ?></td>
        <td><?= $row['jml_rombongan'] ?></td>
        
    </tr>
    </tbody>

    <?php
    $no++;
}
    ?>
</table>

<button type="button" class="btn btn-danger btn_cls_laporan">
      Close Laporan
    </button>
<button type="button" class="btn btn-success btn_exp_laporan">
      Cetak Laporan
    </button>