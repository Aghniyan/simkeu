<?php 
require_once('../cek_level.php');
require_once('../../../url_helper.php');
require_once('../../../proccess/crud/function_user.php');
include_once('../../templates/head.php');
include_once('../../templates/navbar.php');
include_once('../../templates/sidebar.php');

if (isset($_POST['tambah'])) {
  tambah_data_pengguna();
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view_user.php">';

}
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Pengguna</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Pengguna</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div id="form_tambah" class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box">
            
            <div class="box-header with-border">
              <a href="view_user.php" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i> kembali</a>
            </div>
            <div class="box-body">
              <form  action="" method="post">
                <div class="form-row text-center">
                  <div class="form-group col-md-12">
                    <h3 class="box-title">FORM TAMBAH DATA PENGGUNA</h3>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama lengkap...">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="username ...">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password ...">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="level">Level</label>
                    <select class="form-control" id="level" name="level">
                      <option value="Kepala Sekolah">Kepala Sekolah</option>
                      <option value="Tata Usaha">Tata Usaha</option>
                      <option value="admin">admin</option>
                    </select>
                  </div>
                  <div class="form-group col-md-1">
                    <label for="level"></label>
                    <input class="form-control btn btn-primary" type="submit" value="Simpan" name="tambah">
                  </div>
                </div>	
              </form>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>
<?php 
include_once('../../templates/footer.php');
?>