<?php
	session_start();
	if (isset($_SESSION['login'])) {
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
					break;
		}
	}
?>


<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
							
								<div class="logo text-center"><img src="assets/img/logo-maskh.jpg" alt="Klorofil Logo" width="100px" height="100px"></div>
								<p class="lead">SILAHKAN MASUK</p>
								<?php
									if (isset($error)) {
										echo"<p>Username dan Password salah</p>";
									}
								?>
						<?php
							if (isset($_SESSION['pesan'])) {?>
								<div class="alert alert-<?=$_SESSION['warna']?> alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa <?=$_SESSION['ikon']?>"></i> Alert!</h4>
									<?=$_SESSION['pesan']?>
								</div>
							<?php  
							// unset($_SESSION['pesan']);
							}
							// var_dump($rencana_personalia);
							?>
								
						</div>
							<form class="form-auth-small" method="POST" action="<?=$base_url?>proccess/auth/login_proccess.php">
								<div class="form-group">
									<label for="username" class="control-label sr-only">Nama Pengguna</label>
									<input type="text" class="form-control" id="username"  name="username" placeholder="Masukan Nama Pengguna...">
								</div>
								<div class="form-group">
									<label for="password" class="control-label sr-only">Kata Sandi</label>
									<input type="password" class="form-control" id="password" name="password"  placeholder="Masukan Kata Sandi...">
								</div>
								<button type="submit" name="login" class="btn btn-primary btn-lg btn-block">MASUK</button>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">SISTEM INFORMASI MANAJEMEN KEUANGAN SEKOLAH</h1>
							<p>MA Siti Khadijah</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
