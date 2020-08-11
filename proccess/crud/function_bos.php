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
  $sql= "SELECT *, SUM(jumlah_dana) AS total FROM detail_komponen_perencanaan_bos LEFT JOIN perencanaan_bos_detail ON detail_komponen_perencanaan_bos.kode = perencanaan_bos_detail.id_detail_komponen_perencanaan_bos GROUP BY kode";
  if ($idsub) {
      $sql.=" HAVING detail_komponen_perencanaan_bos.id_subkomponen_perencanaan_bos = '$idsub'";
  }
  if ($id) {
    $sql.=" HAVING kode = '$id'";
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


function tampil_rincian_rkam($kode=null)
{
  $sql= "SELECT *,detail_komponen_perencanaan_bos.id_subkomponen_perencanaan_bos AS id_subkomponen FROM detail_komponen_perencanaan_bos LEFT JOIN perencanaan_bos_detail ON detail_komponen_perencanaan_bos.kode = perencanaan_bos_detail.id_detail_komponen_perencanaan_bos";
  if ($kode) {
      $sql.=" WHERE kode = '$kode'";
  }
  return tampil_data($sql);
}

function tampil_perencanaan_bos($data=null)
{
  include('../../../proccess/connection.php');
  $sql= "SELECT * FROM perencanaan_bos";
  if ($data != null) {
    $sql .= " WHERE ";
    $isi = [];
    foreach ($data as $key => $value) array_push($isi, $key . "= '" . mysqli_real_escape_string($conn,$value) . "'");
    $sql .= implode(" AND ", $isi);
  }
  return tampil_data($sql);
}

function tampil_perencanaan_bos_detail($data=null)
{
  include('../../../proccess/connection.php');
  $sql= "SELECT * FROM perencanaan_bos_detail";
  if ($data != null) {
    $sql .= " WHERE ";
    $isi = [];
    foreach ($data as $key => $value) array_push($isi, $key . "= '" . mysqli_real_escape_string($conn,$value) . "'");
    $sql .= implode(" AND ", $isi);
  }
//   var_dump($sql);die;
  return tampil_data($sql);
}


function tampil_rekap_rkam($data=null)
{
  include('../../../proccess/connection.php');
  $sql= "SELECT *, IF((id_komponen_perencanaan_bos=3),SUM(jumlah_dana)*jumlah_siswa, SUM(jumlah_dana))AS total FROM subkomponen_perencanaan_bos LEFT JOIN perencanaan_bos_detail ON subkomponen_perencanaan_bos.id = perencanaan_bos_detail.id_subkomponen_perencanaan_bos LEFT JOIN perencanaan_bos ON perencanaan_bos.id = perencanaan_bos_detail.id_perencanaan_bos GROUP BY nama_subkomponen";
  if ($data != null) {
    $sql .= " HAVING ";
    $isi = [];
    foreach ($data as $key => $value) array_push($isi, $key . "= '" . mysqli_real_escape_string($conn,$value) . "'");
    $sql .= implode(" AND ", $isi);
  }
  $sql.=" ORDER BY subkomponen_perencanaan_bos.id ASC ";
  return tampil_data($sql);
}

function nama_bulan(){
    $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    return $bulan;
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
    $sql = "UPDATE detail_komponen_perencanaan_bos SET id_subkomponen_perencanaan_bos = '$id_subkomponen',uraian='$uraian' WHERE kode = '$kode'";
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

function ubah_data_rincian_rkam(){
    include('../../../proccess/connection.php');
    // var_dump($_POST);die;
    $tahun = $_POST['tahun'];
    $id_subkomponen = $_POST['id_sub'];
    $kode = $_POST['kode'];
    $jumlah = $_POST['jumlah'];
    $no=0;
    $bulan = nama_bulan();
// var_dump($id_detail);die;    
    foreach ($jumlah as $j) {
        $data = [
            'id_detail_komponen_perencanaan_bos'=>$kode,
            'bulan'=>$bulan[$no]
        ];
        $id_detail = tampil_perencanaan_bos_detail($data);
        
        if ($id_detail!=null) {
            $sql = "UPDATE perencanaan_bos_detail SET jumlah_dana = '".$j."' WHERE id=".$id_detail[0]['id'];
            $result = mysqli_query($conn,$sql);
            // var_dump($sql);
        } else {
            $perencanaan  = tampil_perencanaan_bos(['tahun'=>$tahun]);
            // var_dump($perencanaan);
            $sql = "INSERT INTO perencanaan_bos_detail (id_perencanaan_bos,id_subkomponen_perencanaan_bos,id_detail_komponen_perencanaan_bos,bulan,jumlah_dana) VALUES('".$perencanaan[0]['id']."','".$id_subkomponen."','".$kode."','".$bulan[$no]."','".$j."')";
            $result = mysqli_query($conn,$sql);
            // var_dump($sql);
        }
        $no++;
    }
    // die;
    
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
    $sql = "DELETE FROM detail_komponen_perencanaan_bos WHERE kode = '$id'";
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


function hapus_data_rincian_rkam($id,$thn)
{
    include('../../../proccess/connection.php');
    $perencanaan  = tampil_perencanaan_bos(['tahun'=>$thn]);
    $sql = "DELETE FROM perencanaan_bos_detail WHERE id_detail_komponen_perencanaan_bos = '$id' and id_perencanaan_bos ='".$perencanaan[0]['id']."'";
    // var_dump($sql);die;
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