<?php
include("connection.php");


$nik = $_POST['nik'];
$nama = $_POST['nama'];
$kabupaten = $_POST['kabupaten'];
$satuan_kerja = $_POST['satuan_kerja'];
$no_hp = $_POST['no_hp'];



if (isset($_POST["action"])) {

    $query = "INSERT INTO tamu(nik,nama,jk,alamat,provinsi,kabupaten,pekerjaan,satuan_kerja,no_hp)
    values('$nik','$nama','','','','$kabupaten','','$satuan_kerja','$no_hp')";

    // echo "<br>$query <br>";
    // die();
    $res = mysqli_query($connect, $query);
    // var_dump($connect);
    // echo "<br> $res <br>";


    if ($res) {
        echo "data berhasil disimpan";
    } else {
        echo "data gagal disimpan";
    }
}

