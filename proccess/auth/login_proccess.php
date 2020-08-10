
<?php
session_start();
function sql_login($u,$p){
    include '../connection.php';
    $sql_login = "SELECT * FROM pengguna WHERE username = '$u' AND password = '$p'";
    $result = mysqli_query($conn, $sql_login);
    
    return $result;
}

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    
    if (mysqli_num_rows(sql_login($username,$password))>=1) {
        $_SESSION['login']= true;
        $row = mysqli_fetch_assoc(sql_login($username,$password));
        $_SESSION['nama']=$row['nama_lengkap'];
        $_SESSION['username']=$row['username'];
        $_SESSION['level']=$row['level'];
        
        switch ($_SESSION['level']) {
            case 'admin':
                echo "ini halaman admin";
                header("Location:http://localhost/simkeu/views/admin/index.php");
                break;
            case 'Tata Usaha':
                echo "ini halaman Kepala TU";
                header("Location:http://localhost/simkeu/views/tu/index.php");
                # code...
                break;
            case 'Kepala Madrasah':
                echo "ini halaman Kepala Madrasah";
                header("Location:http://localhost/simkeu/views/kepma/index.php");
                # code...
                break;
            default:
                $_SESSION['login']=false;
                header("Location:http://localhost/simkeu");
            break;
        }
    } else{
        header("Location:http://localhost/simkeu");
    }
    
    
    
    
}

?>