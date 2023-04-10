<?php
include("../../config/connection.php");

if (isset($_POST["act_kunjungan"])) {

    $id_tamu = $_POST['nik'];
    $keperluan = $_POST['keperluan'];
    $pej_temu = '';
    $tgl_kunjung = $_POST['tgl_kunjung'];
    $jam_kunjung = $_POST['jam_kunjung'];
    $jml_rombongan = $_POST['jml_rombongan'];

    // var_dump($id_permintaan);


    $query = "INSERT INTO kunjungan(id_tamu,keperluan,pej_temu,tgl_kunjung,jam_kunjung,jml_rombongan)
    values('$id_tamu','$keperluan','$pej_temu','$tgl_kunjung','$jam_kunjung','$jml_rombongan')";
    echo "$query";
    // die();
    $res = mysqli_query($connect, $query);
    var_dump($connect);

    if ($res) {
        echo "<script>console.log('data sukses disimpan')</script>";
        // header("location:index.php?permintaan");
    } else {
        echo "<script>console.log('data gagal disimpan')</script>";
    }
} 

?>

<form id="" action="#">
                        <div class="field">
              <label class="label">NIK</label>
              <div class="control">
                <input class="input" type="text" name="nik" placeholder="Nik" id="nik" value="<?= $_GET['nik'] ?>">
              </div>
            <div class="field">
              <label class="label">tgl_kunjung</label>
              <div class="control">
                <input class="input" type="date" name="tgl_kunjung" placeholder="tgl_kunjung" id="tgl_kunjung">
              </div>
            </div>

            <div class="field">
              <label class="label">jam_kunjung</label>
              <div class="control">
                <input class="input" type="time" name="jam_kunjung" placeholder="Jam Kunjung" id="jam_kunjung">
              </div>
            </div>
            <div class="field">
              <label class="label">JML Rombongan</label>
              <div class="control">
                <input class="input" type="text" name="jml_rombongan" placeholder="jml_rombongan" id="jml_rombongan">
              </div>
            </div>
            <div class="field">
              <label class="label">keperluan</label>
              <div class="control">
                <input class="input" type="text" name="keperluan" placeholder="keperluan" id="keperluan">
              </div>
            </div>
            <div class="control">
              <input type="hidden" name="act_kunjungan" id="act_kunjungan" value="insert">
              <a class="button is-primary" name="add_kunjungan" id="add_kunjungan">Simpan Kunjungan</a>
            </div>
          </form>