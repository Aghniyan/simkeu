<?php 
require_once('../cek_level.php');
require_once('../../../url_helper.php');
require_once('../../../proccess/crud/function_profil.php');
include_once('../../templates/head.php');
include_once('../../templates/navbar.php');
include_once('../../templates/sidebar.php');
$profil = tampil_profil();
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Profil Madrasah</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>
    <!-- Main content -->
    <?php //var_dump($profil);?>
    <section class="content">
      <div id="form_tambah" class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box">
            
            <div class="box-header with-border">
              <a href="form_ubah_profil.php" id="btn_ubah"  class="btn btn-warning btn-sm ">Ubah</a>
            </div>
            <div class="box-body">
              <form  action="" method="post">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    NPSN
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['npsn']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Nama Sekolah
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['nama_sekolah']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Tahun Dibuka
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['tahun_buka']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Alamat
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['alamat']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Desa / Kelurahan
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['desa']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Kecamatan
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['kecamatan']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Kabupaten / Kota
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['kota']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Provinsi
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['provinsi']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Kode POS
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['kodepos']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Email
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['email']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Telepon
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['telp']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Status Sekolah
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['status_sekolah']?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    Jenjang
                  </div>
                  <div class="form-group col-md-9">
                    <?=$profil[0]['jenjang']?>
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