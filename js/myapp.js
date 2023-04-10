$(document).ready(function () {
  //  alert("Demo") ;
});

// add tamu
$(document).on("click", "#add_tamu", function () {
  var nik = $("#nik").val();
  var nama = $("#nama").val();
  var satuan_kerja = $("#satuan_kerja").val();
  var kabupaten = $("#kabupaten").val();
  var no_hp = $("#no_hp").val();
  var action = $("#action").val();

  $.ajax({
    url: "views/tamu/add_tamu.php",
    method: "POST",
    dataType: "JSON",
    data: {
      nik: nik,
      nama: nama,
      satuan_kerja: satuan_kerja,
      kabupaten: kabupaten,
      no_hp: no_hp,
      action: action,
    },
    success: function (data) {
      console.log("sukses fungsi ajax");
      // load_data();
      $("#nik").val("");
      $("#nama").val("");
      $("#satuan_kerja").val("");
      $("#kabupaten").val("");
      $("#no_hp").val("");
      $("#action").val("");

      $(".add_tamu").load("views/kunjungan/add_kunjungan.php?nik=" + data.nik);

      console.log(data);
      // alert("pause");
    },
    error: function (data) {
      console.log(data.responseText);
      alert("terjadi kesalahan server");
    },
  });
});

// hapus tamu
$(document).on("click", ".btn_hapus", function () {
  var id = $(this).attr("id");

  $.ajax({
    url: "views/tamu/hapus.php",
    method: "POST",
    data: {
      id: id,
    },
    beforeSend: function () {
      return confirm("Yakin Ingin Menghapus Data ?");
    },
    success: function () {
      load_data();
    },
  });
});

// add kunjungan
$(document).on("click", "#add_kunjungan", function () {
  var nik = $("#nik").val();
  var tgl_kunjung = $("#tgl_kunjung").val();
  var jam_kunjung = $("#jam_kunjung").val();
  var jml_rombongan = $("#jml_rombongan").val();
  var keperluan = $("#keperluan").val();
  var act_kunjungan = $("#act_kunjungan").val();

  $.ajax({
    url: "views/kunjungan/add_kunjungan.php",
    method: "POST",
    data: {
      nik: nik,
      tgl_kunjung: tgl_kunjung,
      jam_kunjung: jam_kunjung,
      jml_rombongan: jml_rombongan,
      keperluan: keperluan,
      act_kunjungan: act_kunjungan,
    },
    success: function () {
      console.log("Sukses fungsi ajax");
      // console.log(data);
      // alert("pause success");

      $("#nik").val("");
      $("#tgl_kunjung").val("");
      $("#jam_kunjung").val("");
      $("#jml_rombongan").val("");
      $("#keperluan").val("");
      $("#act_kunjungan").val("");

      load_data();

      $(".add_tamu").load("views/terimakasih/terimakasih.html");
    },
    error: function (data) {
      console.log(data.responseText);
      alert("pause success");
    },
  });
});

$(document).on("click", ".act", function () {
  action = $(this).attr("id");
  act_name = $(this).attr("name");
  // alert(act_name);

  $.ajax({
    url: "views/tamu/load_data.php",
    method: "POST",
    data: {
      action: action,
      act_name: act_name,
    },
    error: function (data) {
      console.log(data.responseText);
      alert("pause success");
    },
    success: function (data) {
      console.log("sukses ajax");
      $(".result").html(data);
    },
  });
});

function load_data() {
  // alert("Versi Demo") ;
  $.ajax({
    url: "views/tamu/load_data.php",
    method: "POST",
    success: function (data) {
      $(".result").html(data);
    },
  });
}
