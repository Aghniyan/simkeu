<?php
include ('../../cek_session.php');
if ($_SESSION['level']!='admin') {
	header("location:javascript://history.go(-1)");
	exit;
}
?>