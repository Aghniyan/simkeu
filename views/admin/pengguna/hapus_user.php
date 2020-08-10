<?php
require_once('../../../proccess/crud/function_user.php');
$id = $_GET['id'];
$st = $_GET['st'];
// var_dump($_GET);
  hapus_data_pengguna($id,$st);
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view_user.php">';
  ?>