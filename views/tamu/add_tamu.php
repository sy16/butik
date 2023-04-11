<?php
include("../../config/connection.php");

if (isset($_POST["action"])) {
   
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$satuan_kerja = $_POST['satuan_kerja'];
$no_hp = $_POST['no_hp'];

    $query = "INSERT INTO tamu(nik,nama,jk,alamat,provinsi,kabupaten,pekerjaan,satuan_kerja,no_hp)
    values('$nik','$nama','','$alamat','','','','$satuan_kerja','$no_hp')";

    // echo "<br>$query <br>";
    // die();
    $res = mysqli_query($connect, $query);
    // var_dump($connect);
    // echo "<br> $res <br>";


        if ($res) {
        $status= "data berhasil disimpan";
        // echo "{nik :$nik}";
    } else {
        $status= "data gagal disimpan";
    }

    $response = array(
      "status"=> $status,
      "nik"=>$nik
      // "res"=>$query,
    );

    echo json_encode($response);



} 
else {
?>


<form id="add_form" action="#">
                        <div class="field">
              <label class="label">NIK</label>
              <div class="control">
                <input class="input" type="text" name="nik" placeholder="Nik" id="nik">
              </div>
            <div class="field">
              <label class="label">Nama</label>
              <div class="control">
                <input class="input" type="text" name="nama" placeholder="nama" id="nama">
              </div>
            </div>

            <div class="field">
              <label class="label">Satuan Kerja</label>
              <div class="control">
                <input class="input" type="text" name="satuan_kerja" placeholder="Satuan Kerja" id="satuan_kerja">
              </div>
            </div>
            <div class="field">
              <label class="label">Alamat</label>
              <div class="control">
                <input class="input" type="text" name="alamat" placeholder="Alamat" id="alamat">
              </div>
            </div>
            <div class="field">
              <label class="label">No Hp</label>
              <div class="control">
                <input class="input" type="text" name="no_hp" placeholder="nohp" id="no_hp">
              </div>
            </div>
            <div class="control">
              <input type="hidden" name="action" id="action" value="insert">
              <a class="button is-primary" name="add_tamu" id="add_tamu">Simpan Tamu</a>
            </div>
          </form>

          <?php
}
?>