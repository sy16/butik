<?php

include("../../config/connection.php");

$batas = 5;
// $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman=1;
$previous = $halaman - 1;
$next = $halaman + 1;

$data= mysqli_query($connect,"SELECT *FROM tamu");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data/$batas);

// echo $_post['halaman'];
if (isset($_POST["action"])) {

  if($_POST['act_name']=="next" && $halaman < $total_halaman) {
  $halaman=$next;
  }

  else if($_POST['act_name']=="previous" && $halaman > 1){ 
    $halaman=$previous;
  }

  else if($_POST['act_name']=="num_page"){ 
    $halaman=(INT)$_POST['action'];
  }
}

$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
// $halaman_awal = 6;	


// echo $halaman;
$query="SELECT *FROM tamu ORDER BY id_tamu ASC LIMIT $halaman_awal, $batas";
$res=mysqli_query($connect, $query);
$nomor = $halaman_awal+1;


$output="";

$output .="
<table class='table'>
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Satuan Kerja</th>
        <th>Alamat</th>
        <th> </th>
      </tr>
    </thead>
    <tbody>
";
if (mysqli_num_rows($res) < 1) {
  $output .= "
      <tr>
          <td colspan='6' align='center'>NO DATA</td>
      </tr>
      ";
}

//perulangan membuat list data
$no = 1;
while ($row = mysqli_fetch_array($res)) {
$output .="      
<tr>
        <th>". $no ."</th>
        <td>" . $row['nama'] . "</td>
        <td>" . $row['satuan_kerja'] . "</td>
        <td>" . $row['alamat'] . "</td>
        <td>
        <div class='col-md-12'>
        <div class='row'>

        <div class='col-md-6'>
        <button id='" . $row['id_tamu'] . "' class='btn btn-danger btn_hapus' data-home='views/permintaan/load_data.php' data-url='views/permintaan/hapusPermintaan.php'>Hapus</button>
        </div>
        </div>
        </div>
    </td>
      </tr>
     
";
$no++;
}

$output .= "    </tbody>
                </table>
<nav>
<ul class='pagination justify-content-center'>
  <li class='page-item'>

  <a  class='page-link act' id='". $halaman ."' name='previous'>Previous</a>
  </li> ";

  for($x=1;$x<=$total_halaman;$x++){
    $output .="
    <li class='page-item'><a class='page-link act' id=". $x ."' name='num_page'>". $x ."</a></li>
    ";    
  }


  $output .="		
  <li class='page-item'>
    <a  class='page-link act' id='". $halaman ."' name='next'>Next</a>
  </li>
</ul>
</nav> ";



echo $output;

// $output .= "
// <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
//   Launch demo modal
// </button>
// ";
?>


