  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$base_url?>assets/admin_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['nama']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if ($_SESSION['level']=="admin") { ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li><a href="<?=$base_url?>views/admin/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li class="header">Manajemen Data Master</li>
          <li><a href="<?=$base_url?>views/admin/profil/view_profil.php"><i class="fa fa-book"></i> <span>Profil Sekolah</span></a></li>
          <li><a href="<?=$base_url?>views/admin/pengguna/view_user.php"><i class="fa fa-book"></i> <span>Data Pengguna</span></a></li>
          <li class="header">Manajemen Data BOS</li>
          <li><a href="<?=$base_url?>views/admin/bos/view_rkam.php"><i class="fa fa-book"></i> <span>Data RKAM BOS</span></a></li>
          <li><a href="<?=$base_url?>views/admin/bos/view_realisasi.php"><i class="fa fa-book"></i> <span>Data Realisasi BOS</span></a></li>
          <li class="header">Manajemen Data BPMU</li>
          <li><a href="<?=$base_url?>views/admin/bpmu/view_bpmu.php"><i class="fa fa-book"></i> <span>Data Rencana BPMU</span></a></li>
        </ul>
      <?php } ?>
      <?php if ($_SESSION['level']=="Kepala Madrasah") { ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li><a href="<?=$base_url?>views/kepma/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li class="header">Manajemen Dana BOS</li>
          <li><a href="<?=$base_url?>views/kepma/bos/view_rkam.php"><i class="fa fa-book"></i> <span>Data RKAM BOS</span></a></li>
          <li><a href="<?=$base_url?>views/kepma/bos/view_realisasi.php"><i class="fa fa-book"></i> <span>Data Realisasi BOS</span></a></li>
          <li class="header">Manajemen Dana BPMU</li>
          <li><a href="<?=$base_url?>views/kepma/bpmu/view_bpmu.php"><i class="fa fa-book"></i> <span>Data Rencana BPMU</span></a></li>
        </ul>
      <?php } ?>
      <?php if ($_SESSION['level']=="Tata Usaha") { ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li><a href="<?=$base_url?>views/tu/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li class="header">Manajemen Dana BOS</li>
          <li><a href="<?=$base_url?>views/tu/bos/view_rkam.php"><i class="fa fa-book"></i> <span>Data RKAM BOS</span></a></li>
          <li><a href="<?=$base_url?>views/tu/bos/view_realisasi.php"><i class="fa fa-book"></i> <span>Data Realisasi BOS</span></a></li>
          <li class="header">Manajemen Dana BPMU</li>
          <li><a href="<?=$base_url?>views/tu/bpmu/view_rencana_bpmu.php"><i class="fa fa-book"></i> <span>Data Rencana BPMU</span></a></li>
          <li><a href="<?=$base_url?>views/tu/bpmu/view_realisasi_bpmu.php"><i class="fa fa-book"></i> <span>Data Realisasi BPMU</span></a></li>
          <li class="header">Laporan</li>
          <li><a href="<?=$base_url?>views/tu/bos/view_laporan_bos.php"><i class="fa fa-book"></i> <span>Laporan Dana BOS</span></a></li>
          <li><a href="<?=$base_url?>views/tu/bpmu/view_laporan_bpmu.php"><i class="fa fa-book"></i> <span>Laporan Dana BPMU</span></a></li>
        </ul>
      <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>

