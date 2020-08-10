<?php
require_once('../../../proccess/crud/function_bpmu.php');
$id = $_GET['id'];
// var_dump($_GET);
  hapus_data_bpmu($id);
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view_bpmu.php">';
  ?>