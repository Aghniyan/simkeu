<?php

session_start();
if (!isset($_SESSION['login'])) {
	header("Location:http://localhost/simkeu");
} else {
	if ($_SESSION['level']!='Tata Usaha') {
		header("location:javascript://history.go(-1)");
		exit;
	}
}

?>