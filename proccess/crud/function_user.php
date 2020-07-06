<?php
function tampil_data_pengguna(){
    include('../../proccess/connection.php');
    $sql= "SELECT * FROM pengguna";
    $result = mysqli_query($conn,$sql);
    $row = array();
    while ($data = mysqli_fetch_assoc($result)) {
        $row[]=$data;
    }
    return $row;
}

function tambah_data_pengguna()
{
    # code...
}
?>