<?php

session_start();
if (!isset($_SESSION['login'])) {
	header("Location:http://localhost/simkeu");
} else {
	if ($_SESSION['level']!='Kepala Madrasah') {
		header("location:javascript://history.go(-1)");
		exit;
	}
}

?>