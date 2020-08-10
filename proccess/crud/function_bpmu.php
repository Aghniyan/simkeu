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


function tampil_komponen_perencanaan_bpmu($jenis=null)
{
  $sql= "SELECT * FROM komponen_perencanaan_bpmu ";
  if ($jenis) {
      $sql.=" WHERE id= '$jenis'";
  }
  return tampil_data($sql);
}

function tampil_subkomponen_perencanaan_bpmu($jenis=null)
{
  $sql= "SELECT * FROM subkomponen_perencanaan_bpmu ";
  if ($jenis) {
      $sql.=" WHERE id_komponen_perencanaan_bpmu = '$jenis'";
  }
  return tampil_data($sql);
}


function tambah_data_bpmu()
{
    include('../../../proccess/connection.php');
    // var_dump($_POST);die;
    $id_komponen = $_POST['id_komponen'];
    $kode = $_POST['kode'];
    $uraian = $_POST['uraian'];
    $keterangan = $_POST['keterangan'];
    $sql = "INSERT INTO subkomponen_perencanaan_bpmu (id_komponen_perencanaan_bpmu,kode,nama_komponen,keterangan) VALUES ('$id_komponen','$kode','$uraian','$keterangan')";
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

function ubah_data_bpmu()
{
    include('../../../proccess/connection.php');
    // var_dump($_POST);die;
    $id = $_POST['id'];
    $id_komponen = $_POST['id_komponen'];
    $kode = $_POST['kode'];
    $uraian = $_POST['uraian'];
    $keterangan = $_POST['keterangan'];
    $sql = "UPDATE subkomponen_perencanaan_bpmu SET id_komponen_perencanaan_bpmu = '$id_komponen',kode='$kode',nama_komponen='$uraian',keterangan='$keterangan' WHERE id = '$id'";
    // print_r($sql); die;
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
    // header('location: view_user.php');

}


function hapus_data_bpmu($id)
{
    include('../../../proccess/connection.php');
    $sql = "DELETE FROM subkomponen_perencanaan_bpmu WHERE id = '$id'";
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