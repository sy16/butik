$(document).ready(function () {
  //  alert("Demo") ;
});

$(document).on("submit", "#add_form", function (event) {
  var form_data = $(this).serialize();

  $.ajax({
    url: "./config/aksi.php",
    method: "POST",
    data: form_data,
    success: function (data) {
      window.location.replace("terimakasih.html");
      // console.log("Sukses fungsi ajax");
      // console.log(data);
      // alert('pause success');
    },
    error: function (data) {
      console.log(data.responseText);
    },
  });
});
