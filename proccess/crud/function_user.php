<?php
function tampil_data_pengguna($id=null){
    include('../../../proccess/connection.php');
    $sql= "SELECT * FROM pengguna";
    if ($id) {
        $sql.=" WHERE id = $id";
    }
    $result = mysqli_query($conn,$sql);
    $row = array();
    while ($data = mysqli_fetch_assoc($result)) {
        $row[]=$data;
    }
    return $row;
}

function tambah_data_pengguna()
{
    include('../../../proccess/connection.php');
    // var_dump($_POST);die;
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $level = $_POST['level'];
    $status = 0;

    $sql = "INSERT INTO pengguna (nama_lengkap,username,password,level,status) VALUES ('$nama','$username','$password','$level','$status')";
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

function ubah_data_pengguna(){
    include('../../../proccess/connection.php');
    // var_dump($_POST);
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $level = $_POST['level'];
    $sql = "UPDATE pengguna SET nama_lengkap = '$nama',username='$username',password='$password',level='$level' WHERE id = '$id'";
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

function hapus_data_pengguna($id,$st)
{
    include('../../../proccess/connection.php');
    if($st == '0'){
        $status = 1;
    } else if($st == '1'){
        $status = 0;
    }
    $sql = "UPDATE pengguna SET status = '$status' WHERE id = '$id'";
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