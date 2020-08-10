<?php
session_start();
if (!isset($_SESSION['login'])) {
	$_SESSION['warna'] = "danger";
	$_SESSION['ikon'] = "fa-ban";
	$_SESSION['pesan'] = "Anda Belum Login, Silahkan Login Terlebih dahulu";
	header("Location:http://localhost/simkeu");
} else {
	
if ($_SESSION['level']!='admin') {
	header("location:javascript://history.go(-1)");
	exit;
}

}
?>