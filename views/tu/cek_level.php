<?php
include ('../../cek_session.php');
if ($_SESSION['level']!='keptu') {
	header("location:javascript://history.go(-1)");
	exit;
}
?>