<?php 
require_once('../cek_level.php');
require_once('../../../url_helper.php');
require_once('../../../proccess/crud/function_bpmu.php');
include_once('../../templates/head.php');
include_once('../../templates/navbar.php');
include_once('../../templates/sidebar.php');
$id = $_GET['id'];
$bpmu = tampil_komponen_perencanaan_bpmu();
$subbpmu = tampil_subkomponen_perencanaan_bpmu($id);
if (isset($_POST['ubah'])) {
  ubah_data_bpmu();
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view_bpmu.php">';

}
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Rencana BPMU</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Rencana BPMU</li>
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
              <a href="view_bpmu.php" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i> kembali</a>
            </div>
            <div class="box-body">
              <form  action="" method="post">
                <div class="form-row text-center">
                  <div class="form-group col-md-12">
                    <h3 class="box-title">FORM TAMBAH DATA RENCANA BPMU</h3>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="id_komponen">Jenis Belanja</label>
                  </div>
                  <div class="form-group col-md-9">
                    <select class="form-control" id="id_komponen" name="id_komponen">
                      <?php
                        $i="A";
                        foreach($bpmu as $b){
                      ?>
                      <option <?=($b['id']==$subbpmu[0]['id_komponen_perencanaan_bpmu']) ? "selected" : "" ;?> value="<?=$b['id']?>"><?=$i.'. '.$b['nama_komponen']?></option>
                        <?php $i++; } ?>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="kode">No Kode</label>
                  </div>
                  <div class="form-group col-md-9">
                    <input type="text" class="form-control" id="kode" name="kode" placeholder="no kode..." value="<?=$subbpmu[0]['kode']?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="uraian">uraian Komponen</label>
                  </div>
                  <div class="form-group col-md-9">
                    <input type="text" class="form-control" id="uraian" name="uraian" placeholder="uraian komponen ..." value="<?=$subbpmu[0]['nama_komponen']?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="keterangan">keterangan Komponen</label>
                  </div>
                  <div class="form-group col-md-9">
                    <textarea name="keterangan" class="form-control" id="keterangan" placeholder="keterangan.."><?=$subbpmu[0]['keterangan']?></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="id komponen ..." value="<?=$subbpmu[0]['id']?>">
                    <input class="form-control btn btn-primary" type="submit" value="Simpan" name="ubah">
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