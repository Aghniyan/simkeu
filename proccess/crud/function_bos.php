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


function tampil_komponen_perencanaan_bos($jenis=null)
{
  $sql= "SELECT * FROM komponen_perencanaan_bos ";
  if ($jenis) {
      $sql.=" WHERE jenis = '$jenis'";
  }
  return tampil_data($sql);
}

function tampil_subkomponen_perencanaan_bos($idkomponen)
{
  $sql= "SELECT * FROM subkomponen_perencanaan_bos ";
  if ($idkomponen) {
      $sql.=" WHERE id_komponen_perencanaan_bos = '$idkomponen'";
  }
  return tampil_data($sql);
}

function tampil_detail_komponen_perencanaan_bos($idsub=null, $id=null)
{
  $sql= "SELECT * FROM detail_komponen_perencanaan_bos ";
  if ($idsub) {
      $sql.=" WHERE id_subkomponen_perencanaan_bos = '$idsub'";
  }
  if ($id) {
    $sql.=" WHERE id = '$id'";
  }
  return tampil_data($sql);
}

function tampil_data_rkam($id=null)
{
  $sql= "SELECT * FROM komponen_perencanaan_bos JOIN subkomponen_perencanaan_bos ON komponen_perencanaan_bos.id=subkomponen_perencanaan_bos.id_komponen_perencanaan_bos";
  if ($id) {
      $sql.=" WHERE id = $id";
  }
  return tampil_data($sql);
}

function tampil_jenis_penggunaan_dana($id=null)
{
  $sql= "SELECT * FROM jenis_penggunaan_dana";
  if ($id) {
      $sql.=" WHERE id = $id";
  }
  return tampil_data($sql);
}

function tampil_rkam($id=null)
{
  $sql= "SELECT * FROM subkomponen_perencanaan_bos LEFT JOIN perencanaan_bos_detail ON subkomponen_perencanaan_bos.id = perencanaan_bos_detail.id_subkomponen_perencanaan_bos";
  if ($id) {
      $sql.=" WHERE id_komponen_perencanaan_bos ='$id'";
  }
  return tampil_data($sql);
}

function tampil_rincian_peruraian($kode=null)
{
  $sql= "SELECT * FROM detail_komponen_perencanaan_bos LEFT JOIN perencanaan_bos_detail ON detail_komponen_perencanaan_bos.id = perencanaan_bos_detail.id_detail_komponen_perencanaan_bos";
  if ($kode) {
      $sql.=" WHERE kode = '$kode'";
  }
  return tampil_data($sql);
}


function tampil_rincian_rkam($id=null)
{
    $sql= "SELECT perencanaan_bos_detail.id AS id,id_perencanaan_bos,nama_subkomponen,kode,uraian, bulan,jumlah_dana 
    FROM perencanaan_bos_detail 
        LEFT JOIN detail_komponen_perencanaan_bos ON perencanaan_bos_detail.id_detail_komponen_perencanaan_bos=detail_komponen_perencanaan_bos.id 
        JOIN subkomponen_perencanaan_bos ON perencanaan_bos_detail.id_subkomponen_perencanaan_bos= subkomponen_perencanaan_bos.id
    GROUP BY perencanaan_bos_detail.id_subkomponen_perencanaan_bos,id_detail_komponen_perencanaan_bos ORDER BY id ASC";
//   if ($id) {
//       $sql.=" WHERE id_komponen_perencanaan_bos ='$id'";
//   }
  return tampil_data($sql);
}

function tambah_data_rkam()
{
    include('../../../proccess/connection.php');
    // var_dump($_POST);die;
    $id_subkomponen = $_POST['id_subkomponen'];
    $kode = $_POST['kode'];
    $uraian = $_POST['uraian'];
    $sql = "INSERT INTO detail_komponen_perencanaan_bos (id_subkomponen_perencanaan_bos,kode,uraian) VALUES ('$id_subkomponen','$kode','$uraian')";
    // print_r($sql); die;
    $result = mysqli_query($conn,$sql);
    if ($result == true) {
        $_SESSION['warna'] = "success";
        $_SESSION['ikon'] = "fa-check";
        $_SESSION['pesan'] = "Data Berhasil Ditambahkan";
    } else {
        $_SESSION['warna'] = "danger";
        $_SESSION['ikon'] = "fa-ban";
        $_SESSION['pesan'] = "Data Gagal Ditambahkan. Error :".mysqli_error($conn);
    }
    // header('location: view_user.php');

}

function tambah_data_komponen_realisasi()
{
  include('../../../proccess/connection.php');
    // var_dump($_POST);die;
    $nama = $_POST['nama'];
    $sql = "INSERT INTO jenis_penggunaan_dana (nama_penggunaan) VALUES ('$nama')";
    // print_r($sql); die;
    $result = mysqli_query($conn,$sql);
    if ($result == true) {
        $_SESSION['warna'] = "success";
        $_SESSION['ikon'] = "fa-check";
        $_SESSION['pesan'] = "Data Berhasil Ditambahkan";
    } else {
        $_SESSION['warna'] = "danger";
        $_SESSION['ikon'] = "fa-ban";
        $_SESSION['pesan'] = "Data Gagal Ditambahkan. Error :".mysqli_error($conn);
    }
    // header('location: view_user.php');

}


function ubah_data_rkam(){
    include('../../../proccess/connection.php');
    // var_dump($_POST);
    $id = $_POST['id'];
    $id_subkomponen = $_POST['id_subkomponen'];
    $kode = $_POST['kode'];
    $uraian = $_POST['uraian'];
    $sql = "UPDATE detail_komponen_perencanaan_bos SET id_subkomponen_perencanaan_bos = '$id_subkomponen',kode='$kode',uraian='$uraian' WHERE id = '$id'";
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

function ubah_data_komponen_realisasi(){
  include('../../../proccess/connection.php');
  // var_dump($_POST);
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $sql = "UPDATE jenis_penggunaan_dana SET nama_penggunaan = '$nama' WHERE id = '$id'";
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

function hapus_data_rkam($id)
{
    include('../../../proccess/connection.php');
    $sql = "DELETE FROM detail_komponen_perencanaan_bos WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if ($result == true) {
        $_SESSION['warna'] = "success";
        $_SESSION['ikon'] = "fa-check";
        $_SESSION['pesan'] = "Data Berhasil Dihapus";
    } else {
        $_SESSION['warna'] = "danger";
        $_SESSION['ikon'] = "fa-ban";
        $_SESSION['pesan'] = "Data Gagal Dihapus. Error :".mysqli_error($conn);
    }
}

function hapus_data_realisasi($id)
{
    include('../../../proccess/connection.php');
    $sql = "DELETE FROM jenis_penggunaan_dana WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if ($result == true) {
        $_SESSION['warna'] = "success";
        $_SESSION['ikon'] = "fa-check";
        $_SESSION['pesan'] = "Data Berhasil Dihapus";
    } else {
        $_SESSION['warna'] = "danger";
        $_SESSION['ikon'] = "fa-ban";
        $_SESSION['pesan'] = "Data Gagal Dihapus. Error :".mysqli_error($conn);
    }
}
?>