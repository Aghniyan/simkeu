<?php
include ('../../cek_session.php');
if ($_SESSION['level']!='kepma') {
	header("location:javascript://history.go(-1)");
	exit;
}
?>