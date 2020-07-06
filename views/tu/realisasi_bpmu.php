
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
							<h3 class="panel-title">Halaman Realisasi BPMU</h3>
							<!-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> -->
						</div>
						<div class="panel-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>No Kode</th>
                <th>No Bukti</th>
                <th width="200px">Uraian</th>
                <th>Penerimaan (Rp)</th>
                <th>Pengeluaran (Rp)</th>
                <th>Saldo</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
              </table>
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
    <script>
      $('#rencana a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
      })
    </script>
    
</body>

</html>
