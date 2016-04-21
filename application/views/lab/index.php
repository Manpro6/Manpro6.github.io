<?php 
  global $i;
  $iterasi = 1;
  $indeks = ($this->pagination->cur_page-1)*$this->pagination->per_page;
  if($indeks <= 0) $indeks = 0;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php $session_id = $this->session->userdata('is_logged_in');
      if($session_id == TRUE) { ?>
    <title>Admin Panel - Jadwal Lab</title>
    <?php } else { ?>
    <title>Jadwal Lab PPLK</title>
    <?php } ?>
    <script src="<?php echo base_url('js/jquery.1.12.0.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="<?php echo base_url('js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/moment.min.js');?>"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="<?php echo base_url('js/daterangepicker.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/daterangepicker.css');?>" />
    
    <!-- Edit Form Modal -->
    <script src="<?php echo base_url('js/bootbox.js');?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/css_lab.css');?>" />

    <!-- Datepicker -->
    <script type="text/javascript">
    $(function() {
        $('#singledatepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'YYYY-MM-DD'
            },
            startDate: <?php 
              if(isset($_GET['tanggal']) && !empty($_GET['tanggal'])) {
                echo "'".$_GET['tanggal']."'";
              } else if (!isset($_GET['tanggal'])) { 
                echo date("Y-m-d");
              }
            ?>
        });
    });

    $(function() {  
      $('input[name="daterange"]').daterangepicker(
      {
          locale: {
            format: 'YYYY-MM-DD'
          },
          startDate: <?php echo date("Y-m-d") ?>,
          endDate: <?php echo date("Y-m-d") ?>
      });
    });

    $(function() {
      $('#datepicker').daterangepicker(
      {
          locale: {
            format: 'YYYY-MM-DD'
          },
          startDate: <?php echo date("Y-m-d") ?>,
          endDate: <?php echo date("Y-m-d") ?>
      });
    });

    $(document).ready(function() {
      $('select[name=pilihProdi]').val('<?php
        if(isset($_GET['prodi'])) {
          echo $_GET['prodi'];
        } else {
          echo "Semua Program Studi";
        }
       ?>');
      $('select[name=pilihProdi]').on('change', function(){
        url = "<?php echo base_url('/lab') ?>" + "/?prodi=" + $('select[name=pilihProdi]').val() + "&tanggal=" + $('#singledatepicker').val();
        $(location).attr("href", url);
      });

      $('#singledatepicker').on('change', function(){
        url = "<?php echo base_url('/lab') ?>" + "/?prodi=" + $('select[name=pilihProdi]').val() + "&tanggal=" + $('#singledatepicker').val();
        $(location).attr("href", url);
      });

      $('.alert').delay(5000).fadeOut();
      $('.editButton').on('click', function() {
        var id = $(this).attr('data-id');
        var matkul = $(this).closest('tr').children('td.matkul').text();
        var hari = $(this).closest('tr').children('td.hari').text();
        var sesi = $(this).closest('tr').children('td.sesi').text();
        var prodi = $(this).closest('tr').children('td.prodi').text();
        var status = $(this).closest('tr').children('td.status').text();
        var tanggal_mulai = $(this).closest('tr').children('td.tanggal_mulai').text();
        var tanggal_selesai = $(this).closest('tr').children('td.tanggal_selesai').text();

        //assign to ID
        $('#id_edit').attr("value", id);
        //hari
        $( "select[name='hari_edit']").val(hari);
        //sesi
        $( "select[name='sesi_edit']").val(sesi);
        //prodi
        $( "select[name='prodi_edit']").val(prodi);
        //status
        $( "select[name='status_edit']").val(status);
        //matkul
        $( "input[name='matkul_edit']").val(matkul);

        $( "input[name='daterange_edit']").daterangepicker(
        {
          locale: {
            format: 'YYYY-MM-DD'
          },
          startDate: tanggal_mulai,
          endDate: tanggal_selesai
        });  
       });
    });
    </script>
</head>
<body>
  <div class="container">
    
    <h2>Jadwal Lab PPLK</h2>
    <hr>
    <?php
      $session_id = $this->session->userdata('is_logged_in');
      if($session_id == TRUE) {
        // echo "<h1>". $this->session->flashdata('out') . "</h1>";
        
        if($this->session->flashdata('sukses') == 1){
    ?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Sukses!</strong> Entri jadwal baru berhasil.
    </div>
    <?php } else if($this->session->flashdata('sukses') == 2  ) { ?>

    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Gagal!</strong> Entri jadwal baru tidak berhasil.
    </div>
    <?php } else if($this->session->flashdata('sukses') == 3  ) { ?>

    <div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Gagal!</strong> Sudah ada jadwal pada tanggal tersebut!
    </div>
    <?php } if($this->session->flashdata('hapus') == 1){ ?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Sukses!</strong> Jadwal lab berhasil dihapus.
    </div>
    <?php } else if($this->session->flashdata('hapus') == 2  ) { ?>

    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Gagal!</strong> Jadwal lab tidak berhasil dihapus.
    </div>

    <?php } if($this->session->flashdata('edit') == 1){ ?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Sukses!</strong> Jadwal lab berhasil diedit.
    </div>
    <?php } else if($this->session->flashdata('edit') == 2  ) { ?>

    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Gagal!</strong> Jadwal lab tidak berhasil diedit.
    </div>
    
    <?php } else if($this->session->flashdata('edit') == 3  ) { ?>

    <div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Gagal!</strong> Sudah ada jadwal pada tanggal tersebut!
    </div>
    <?php } ?>


    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">     
      <?php 
        if ( isset( $_GET['lab'] ) && !empty( $_GET['lab'] ) ){
          echo $_GET['lab'];
        }
        else {
          echo "Lab A";
        }
       ?>
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="<?php echo base_url('lab/?lab=Lab A'); ?>">Lab A</a></li>
        <li><a href="<?php echo base_url('lab/?lab=Lab B'); ?>">Lab B</a></li>
        <li><a href="<?php echo base_url('lab/?lab=Lab C'); ?>">Lab C</a></li>
        <li><a href="<?php echo base_url('lab/?lab=Lab D'); ?>">Lab D</a></li>
        <li><a href="<?php echo base_url('lab/?lab=Lab E'); ?>">Lab E</a></li>
        <li><a href="<?php echo base_url('lab/?lab=Lab F'); ?>">Lab F</a></li>
        <li><a href="<?php echo base_url('lab/?lab=Lab G'); ?>">Lab G</a></li>
        <li><a href="<?php echo base_url('lab/?lab=Lab H'); ?>">Lab H</a></li>
        <li><a href="<?php echo base_url('lab/?lab=Lab I'); ?>">Lab I</a></li>
      </ul>
      <button type='button' class='btn btn-primary btn' data-toggle='modal' data-target='#myModal' id="add" style="float: right;"> <strong>+</strong>  Tambah Jadwal</button>
    </div>
    <br>
    <div class="table-responsive text-center">          
      <table class="table">
        <thead class="table_head">
          <tr>
            <th id="th-no" class="th-result text-center">No</th>
            <th id="th-matkul" class="th-result text-center">Mata Kuliah</th>
            <th id="th-hari" class="th-result text-center">Hari</th>
            <th id="th-sesi" class="th-result text-center">Sesi</th>
            <th id="th-prodi" class="th-result text-center">Program Studi</th>
            <th id="th-status" class="th-result text-center">Status</th>
            <th id="th-tgl-mulai" class="th-result text-center">Tanggal Mulai</th>
            <th id="th-tgl-selesai" class="th-result text-center">Tanggal Selesai</th>
            <th class="button-action">Action</th>
          </tr>
        </thead>
        <?php 
          if($count > 0){
            $urutan = $indeks+1;
            foreach ($lab as $jadwal_lab) {
              echo "<tbody id ='tbody-table-krisan'>
                    <tr>
                      <td>".$urutan."</td>
                      <td class='matkul'>".$jadwal_lab['nama_matkul']."</td>
                      <td class='hari'>".$jadwal_lab['hari']."</td>
                      <td class='sesi'>".$jadwal_lab['sesi']."</td>
                      <td class='prodi'>".$jadwal_lab['prodi']."</td>
                      <td class='status'>".$jadwal_lab['status']."</td>
                      <td class='tanggal_mulai'>".$jadwal_lab['tanggal_mulai']."</td>
                      <td class='tanggal_selesai'>".$jadwal_lab['tanggal_selesai']."</td>
                      <td>
                        <button type='button' class='btn btn-info editButton' data-toggle='modal' data-target='#editModal' data-id='"; echo $jadwal_lab['id_jadwal_lab']."'>Ubah</button>
                        <button type='button' class='btn btn-danger'><a href='"; echo base_url().'index.php/lab/delete/'.$jadwal_lab['id_jadwal_lab']."'>Hapus</button>
                      </td>
                    </tr>
                    </tbody>";
              $urutan++;
            }
          }
          else 
              echo "<tbody id ='tbody-table-krisan'>
                    <tr>
                      <td colspan='9'>Data Tidak Ditemukan</td>
                    </tr>
                    </tbody>";
        ?>
      </table>
      <ul class="pagination">
        <?php echo $pagination; ?> 
      </ul>
    </div>
    
    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <?php echo form_open('lab/insert') ?>  
        <form class="form-inline">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick=location.reload()><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><b>Tambah Jadwal Lab</b></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputName2">Periode Aktif</label>
              <input type="text" name="daterange" value="01/01/2015 - 01/31/2015" class="form-control form-panjang">
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Ruang Lab</label>
              <select class="form-control form-control-a" name="lab">
                <option>Lab A</option>
                <option>Lab B</option>
                <option>Lab C</option>
                <option>Lab D</option>
                <option>Lab E</option>
                <option>Lab F</option>
                <option>Lab G</option>
                <option>Lab H</option>
                <option>Lab I</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Hari</label>
              <select class="form-control form-control-a" name="hari">
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
                <option>Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Sesi</label>
              <select class="form-control form-control-a" name="sesi">
                <option>I</option>
                <option>II</option>
                <option>III</option>
                <option>IV</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Program Studi</label>
              <select class="form-control form-control-a" name="prodi">
                <optgroup label="Fakultas Teknologi Informasi">
                  <option>Sistem Informasi</option>
                  <option>Teknik Informatika</option>
                </optgroup>
                <optgroup label="Fakultas Bisnis">
                  <option>Manajemen</option>
                  <option>Akuntansi</option>
                  <option>Magister Manajemen</option>
                </optgroup>
                <optgroup label="Pendidikan Bahasa Inggris">
                  <option>Bahasa Inggris</option>
                </optgroup>
                <optgroup label="Fakultas Bioteknologi">
                  <option>Bioteknologi</option>
                </optgroup>
                <optgroup label="Fakultas Arsitektur dan Desain">
                  <option>Arsitektur</option>
                  <option>Desain produk</option>
                  <option>Magister Arsitektur</option>
                </optgroup>
                <optgroup label="Fakultas Kedokteran">
                  <option>Kedokteran</option>
                </optgroup>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Mata Kuliah</label>
              <input type="jadwal" class="form-control form-panjang" name="matkul" placeholder="Jadwal Baru" required>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Status Mata Kuliah</label>
              <select class="form-control form-control-a" name="status">
                <option>Reguler</option>
                <option>Pengganti</option>
              </select>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick=location.reload()>Batal</button>
            <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    
    <!-- Modal -->
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <?php echo form_open('lab/update') ?>  
        <form class="form-inline">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick=location.reload()><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><b>Edit Jadwal Lab</b></h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id_edit" class="form-control" id="id_edit">
            <div class="form-group">
              <label for="exampleInputName2">Periode Aktif</label>
              <input type="text" name="daterange_edit" value="01/01/2015 - 01/31/2015" class="form-control form-panjang">
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Ruang Lab</label>
              <select class="form-control form-control-a" name="lab_edit">
                <option>Lab A</option>
                <option>Lab B</option>
                <option>Lab C</option>
                <option>Lab D</option>
                <option>Lab E</option>
                <option>Lab F</option>
                <option>Lab G</option>
                <option>Lab H</option>
                <option>Lab I</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Hari</label>
              <select class="form-control form-control-a" name="hari_edit">
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
                <option>Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Sesi</label>
              <select class="form-control form-control-a" name="sesi_edit">
                <option>I</option>
                <option>II</option>
                <option>III</option>
                <option>IV</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Program Studi</label>
              <select class="form-control form-control-a" name="prodi_edit">
                <optgroup label="Fakultas Teknologi Informasi">
                  <option>Sistem Informasi</option>
                  <option>Teknik Informatika</option>
                </optgroup>
                <optgroup label="Fakultas Bisnis">
                  <option>Manajemen</option>
                  <option>Akuntansi</option>
                  <option>Magister Manajemen</option>
                </optgroup>
                <optgroup label="Pendidikan Bahasa Inggris">
                  <option>Bahasa Inggris</option>
                </optgroup>
                <optgroup label="Fakultas Bioteknologi">
                  <option>Bioteknologi</option>
                </optgroup>
                <optgroup label="Fakultas Arsitektur dan Desain">
                  <option>Arsitektur</option>
                  <option>Desain produk</option>
                  <option>Magister Arsitektur</option>
                </optgroup>
                <optgroup label="Fakultas Kedokteran">
                  <option>Kedokteran</option>
                </optgroup>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Mata Kuliah</label>
              <input type="jadwal" class="form-control form-panjang" name="matkul_edit" placeholder="Jadwal Baru" required>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Status Mata Kuliah</label>
              <select class="form-control form-control-a" name="status_edit">
                <option>Reguler</option>
                <option>Pengganti</option>
              </select>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick=location.reload()>Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <?php } else { ?>
    <p class="berdasarkan">Tampilkan berdasarkan jadwal program studi : </p>
    <div class="dropdown optiongroup">
      <select class="form-control form-control-a " id="pilihProdi" name="pilihProdi">
        <option>Semua Program Studi</option>
        <optgroup label="Fakultas Teknologi Informasi">
          <option>Sistem Informasi</option>
          <option>Teknik Informatika</option>
        </optgroup>
        <optgroup label="Fakultas Bisnis">
          <option>Manajemen</option>
          <option>Akuntansi</option>
          <option>Magister Manajemen</option>
        </optgroup>
        <optgroup label="Pendidikan Bahasa Inggris">
          <option>Bahasa Inggris</option>
        </optgroup>
        <optgroup label="Fakultas Bioteknologi">
          <option>Bioteknologi</option>
        </optgroup>
        <optgroup label="Fakultas Arsitektur dan Desain">
          <option>Arsitektur</option>
          <option>Desain produk</option>
          <option>Magister Arsitektur</option>
        </optgroup>
        <optgroup label="Fakultas Kedokteran">
          <option>Kedokteran</option>
        </optgroup>
      </select>
    </div>
    <div style="clear: both;"></div>
    <div class="tanggal" name="pilihTanggal">
      <input type="text" class="form-control" id="singledatepicker">
    </div>
    <div style="clear: both;"></div>
    <br>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="thead-inverse">
          <tr>
            <th>Ruang</th>
            <th>Sesi</th>
            <th>Senin</th>
            <th>Selasa</th>
            <th>Rabu</th>
            <th>Kamis</th>
            <th>Jumat</th>
            <th>Sabtu</th>
            <th>Minggu</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="Ruang" style="vertical-align:middle;"> 
            <span class="nama_lab">LAB A</span><br>
            KAPASITAS: 60
            <th>I</th>
            <?php
              if($iterasi > 1){
                $iterasi = 1;
              }
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>II</th>
             <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 25;
            ?>
          </tr>
        </tbody>
        <!-- baris 2 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="9" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="Ruang" style="vertical-align:middle;"> 
            <span class="nama_lab">LAB B</span><br>
            KAPASITAS: 48
            <th>I</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 25;
            ?>
          </tr>
        </tbody>
        <!-- baris 3 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="9" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="Ruang" style="vertical-align:middle;"> 
            <span class="nama_lab">LAB C</span><br>
            KAPASITAS: 32
            <th>I</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 25;
            ?>
          </tr>
        </tbody>
        <!-- baris 4 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="9" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="Ruang" style="vertical-align:middle;"> 
            <span class="nama_lab">LAB D</span><br>
            KAPASITAS: 32
            <th>I</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 25;
            ?>
          </tr>
        </tbody>
        <!-- baris 5 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="9" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="Ruang" style="vertical-align:middle;"> 
            <span class="nama_lab">LAB E</span><br>
            KAPASITAS: 40
            <th>I</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 25;
            ?>
          </tr>
        </tbody>
        <!-- baris 6 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="9" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="Ruang" style="vertical-align:middle;"> 
            <span class="nama_lab">LAB F</span><br>
            KAPASITAS: 40
            <th>I</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 25;
            ?>
          </tr>
        </tbody>
        <!-- baris 7 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="9" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="Ruang" style="vertical-align:middle;"> 
            <span class="nama_lab">LAB G</span><br>
            KAPASITAS: 32
            <th>I</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 25;
            ?>
          </tr>
        </tbody>
        <!-- baris 8 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="9" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="Ruang" style="vertical-align:middle;"> 
            <span class="nama_lab">LAB H</span><br>
            KAPASITAS: 48
            <th>I</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 25;
            ?>
          </tr>
        </tbody>
        <!-- baris 9 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="9" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="Ruang" style="vertical-align:middle;"> 
            <span class="nama_lab">LAB I</span><br>
            KAPASITAS: 40 <br>
            <strong>(Lab Bebas)</strong>
            <th>I</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";  
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 1;
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = $iterasi; $i <=$iterasi+24 ; $i+=4) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    $prodi = str_replace(' ', '_', $row['prodi']);
                    $prodi = strtolower($prodi);
                    echo "<td class='". $prodi . "' title='". $row['prodi'] ."'>". $row["nama_matkul"];
                    if($row['status'] != "Reguler"){
                      echo '&nbsp';
                      echo '&nbsp';
                      echo "<img src='". base_url('images/new-icon.gif') . "'>";
                    }
                    echo "</td>";    
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
              $iterasi += 25;
            ?>
          </tr>
        </tbody>
        </table>
        <div class="center">
          <h3>Note:</h3>
          <h4>Keterangan warna latar</h4>
          <div class="box sistem_informasi"></div>
          Sistem Informasi
          <div class="box teknik_informatika"></div>
          Teknik Informatika
          <div class="box magister_manajemen"></div>
          Magister Manajemen
          <div class="box manajemen"></div>
          Manajemen
          <br>
          <div class="box akuntansi"></div>
          Akuntansi
          <div class="box bahasa_inggris"></div>
          Bahasa Inggris
          <div class="box bioteknologi"></div>
          Bioteknologi
          <div class="box arsitektur"></div>
          Arsitektur
          <div class="box desain_produk"></div>
          Desain Produk
          <div class="box magister_arsitektur"></div>
          Magister Arsitektur
          <div class="box kedokteran"></div>
          Kedokteran

          <br>
          <h4> Senin | Sesi I: 08.30, Sesi II: 11.30, Sesi III: 14.30, Sesi IV: 17.30</h3>
          <h4>      Selasa-Jumat | Sesi I: 07.30, Sesi II: 10.30, Sesi III: 13.30, Sesi IV: 16.30</h3>  
          <br>
        </div>
        <?php } ?>
    </div>
  </div>
</body>
</html>