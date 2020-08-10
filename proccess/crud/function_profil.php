<?php
function tampil_data($sql)
{
  include('../../../proccess/connection.php');
  $result = mysqli_query($conn,$sql);
  $row = array();
  while ($data = mysqli_fetch_assoc($result)) {
      $row[]=$data;
  }
  return $row;
}


function tampil_profil($npsn=null)
{
  $sql= "SELECT * FROM profil_madrasah ";
  if ($npsn) {
      $sql.=" WHERE npsn = '$npsn'";
  }
  return tampil_data($sql);
}

function ubah_data_profil (){
  include('../../../proccess/connection.php');
  // var_dump($_POST);
  $nama_sekolah = $_POST['nama_sekolah'];
  $tahun_buka = $_POST['tahun_buka'];
  $alamat = $_POST['alamat'];
  $desa = $_POST['desa'];
  $kecamatan = $_POST['kecamatan'];
  $kota = $_POST['kota'];
  $provinsi = $_POST['provinsi'];
  $kodepos = $_POST['kodepos'];
  $email = $_POST['email'];
  $telp = $_POST['telp'];
  $status_sekolah = $_POST['status_sekolah'];
  $jenjang = $_POST['jenjang'];
  $sql = "UPDATE profil_madrasah SET nama_sekolah='$nama_sekolah',tahun_buka='$tahun_buka',alamat='$alamat',desa='$desa',kecamatan='$kecamatan',kota='$kota',provinsi='$provinsi',kodepos='$kodepos',email='$email',telp='$telp',status_sekolah='$status_sekolah',jenjang='$jenjang'";
  $result = mysqli_query($conn,$sql);
  if ($result == true) {
      $_SESSION['warna'] = "success";
      $_SESSION['ikon'] = "fa-check";
      $_SESSION['pesan'] = "Data Berhasil Disimpan";
  } else {
      $_SESSION['warna'] = "danger";
      $_SESSION['ikon'] = "fa-ban";
      $_SESSION['pesan'] = "Data Gagal Disimpan. Error :".mysqli_error($conn);
  }
}
?>