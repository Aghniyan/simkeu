<?php
require_once('../../../proccess/crud/function_bos.php');
$id = $_GET['id'];
// var_dump($_GET);
  hapus_data_realisasi($id);
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view_realisasi.php">';
  ?>