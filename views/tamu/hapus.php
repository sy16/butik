<?php

include "../../config/connection.php";


$id = $_POST['id'];
// echo $id;
// die();
// var_dump($id);
$query = "DELETE from tamu WHERE id_tamu='$id'";
mysqli_query($connect, $query);
