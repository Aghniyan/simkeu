
<?php
include ('cek_level.php');
include ('../../url_helper.php');
?>
<!doctype html>
<html lang="en">

<?php require('../_templates/head.php');?>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
        <!-- NAVBAR -->
        <?php require('../_templates/nav.php');?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
        <?php require('../_templates/left_sidebar.php');?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Selamat Datang di Halaman Kepala Madrasah</h3>
							<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">Dana BOS</span>
											<span class="title">ccc</span>
										</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">Dana BPMU</span>
											<span class="title">Conversions</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
        <?php require('../_templates/footer.php');?>
	</div>
	<!-- END WRAPPER -->
    <!-- Javascript -->
    <?php require('../_templates/js.php');?>
</body>

</html>
