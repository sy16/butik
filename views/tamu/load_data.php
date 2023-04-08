<?php

include("../../config/connection.php");

$query="SELECT *FROM tamu ORDER BY id_tamu ASC";
$res=mysqli_query($connect, $query);

$output="";

$output .="
<table class='table'>
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Satuan Kerja</th>
        <th>Kabupaten</th>
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

$no = 1;
while ($row = mysqli_fetch_array($res)) {
$output .="      
<tr>
        <th>". $no ."</th>
        <td>" . $row['nama'] . "</td>
        <td>" . $row['satuan_kerja'] . "</td>
        <td>" . $row['kabupaten'] . "</td>
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
                </table>";
echo $output;
  ?>