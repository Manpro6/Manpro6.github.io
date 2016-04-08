<?php 
  global $i;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel - Jadwal Lab</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
     
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /><script type="text/javascript">
    $(function() {
      $('input[name="daterange"]').daterangepicker(
      {
          locale: {
            format: 'YYYY-MM-DD'
          },
          startDate: <?php echo date("Y-m-d") ?>,
          endDate: <?php echo date("Y-m-d") ?>
      }, 
      function(start, end, label) {
          alert("Periode Jadwal terpilih: " + start.format('YYYY-MM-DD') + ' hingga ' + end.format('YYYY-MM-DD'));
      });
    });
    </script>
    <style>
    #add {
      margin-bottom: 20px;
    }

    th, tr{
      text-align: center;
    }

    .black {
      color: white;
    }

    .nama_lab {
      font-weight: bolder;
      font-size: 26px;
    }

    .center {
      text-align: center;
    }
    </style>
</head>
<body>
  <div class="container">
    <h2>Jadwal Lab PPLK</h2>
    <hr>
    <?php
      $session_id = $this->session->userdata('is_logged_in');
      if($session_id == TRUE) {
        if($this->session->flashdata('sukses') == 1){
    ?>
    <div class="alert alert-success">
      <strong>Sukses!</strong> Jadwal lab berhasil dirubah.
    </div>
    <?php } else if($this->session->flashdata('sukses') == 2  ) { ?>

    <div class="alert alert-danger">
      <strong>Gagal!</strong> Jadwal lab tidak berhasil dirubah.
    </div>
    <?php } ?>
    <!-- Trigger the modal with a button -->
    <button type='button' class='btn btn-primary btn' data-toggle='modal' data-target='#myModal' id="add">Tambah Jadwal</button>
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
              <select class="form-control form-control-a">
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
    
    
    <?php } else { ?>
    <p>Tampilkan berdasarkan jadwal program studi : </p>
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">     
      <?php  
        if(isset($_GET['berdasarkan'])){
          echo $_GET['berdasarkan'];
        } else {
          echo "Semua Program Studi";
        }
      ?>
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="?berdasarkan=Semua Program Studi">Semua Program Studi</a></li>
        <li><a href="?berdasarkan=Teknik Informatika">Teknik Informatika</a></li>
        <li><a href="?berdasarkan=Sistem Informasi">Sistem Informasi</a></li>
        <li><a href="?berdasarkan=Management">Management</a></li>
        <li><a href="?berdasarkan=Akuntansi">Akuntansi</a></li>
        <li><a href="?berdasarkan=Arsitektur">Arsitektur</a></li>
        <li><a href="?berdasarkan=Desain Produk">Desain Produk</a></li>
      </ul>
    </div>

    <?php } ?>
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
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="ruang"> 
            <span class="nama_lab">LAB A</span><br>
            KAPASITAS: 60
            <th>I</th>
            <?php
              for ($i = 1; $i <6 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab']  == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else if(count($arr_baru) == 0){
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>II</th>
             <?php
              for ($i = 6; $i <11 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = 11; $i <16 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = 16; $i <21 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
        </tbody>
        <!-- baris 2 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="7" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="ruang"> 
            <span class="nama_lab">LAB B</span><br>
            KAPASITAS: 48
            <th>I</th>
            <?php
              for ($i = 21; $i <26 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = 26; $i <31 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = 31; $i <36 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = 36; $i <41 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
        </tbody>
        <!-- baris 3 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="7" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="ruang"> 
            <span class="nama_lab">LAB C</span><br>
            KAPASITAS: 32
            <th>I</th>
            <?php
              for ($i = 41; $i <46 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = 46; $i <51 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = 51; $i <56 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = 56; $i <61 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
        </tbody>
        <!-- baris 4 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="7" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="ruang"> 
            <span class="nama_lab">LAB D</span><br>
            KAPASITAS: 32
            <th>I</th>
            <?php
              for ($i = 61; $i <66 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = 66; $i <71 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = 71; $i <76 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = 76; $i <81 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
        </tbody>
        <!-- baris 5 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="7" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="ruang"> 
            <span class="nama_lab">LAB E</span><br>
            KAPASITAS: 40
            <th>I</th>
            <?php
              for ($i = 81; $i <86 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = 86; $i <91 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = 91; $i <96 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = 96; $i <101 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
        </tbody>
        <!-- baris 6 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="7" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="ruang"> 
            <span class="nama_lab">LAB F</span><br>
            KAPASITAS: 40
            <th>I</th>
            <?php
              for ($i = 101; $i <106 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = 106; $i <111 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = 111; $i <116 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = 116; $i <121 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
        </tbody>
        <!-- baris 7 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="7" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="ruang"> 
            <span class="nama_lab">LAB G</span><br>
            KAPASITAS: 32
            <th>I</th>
            <?php
              for ($i = 121; $i <126 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = 126; $i <131 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = 131; $i <136 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = 136; $i <141 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
        </tbody>
        <!-- baris 8 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="7" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="ruang"> 
            <span class="nama_lab">LAB H</span><br>
            KAPASITAS: 48
            <th>I</th>
            <?php
              for ($i = 141; $i <146 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = 146; $i <151 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = 151; $i <156 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = 156; $i <161 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
        </tbody>
        <!-- baris 9 -->
        <thead class="thead-inverse">
          <tr>
            <th colspan="7" class="black"># </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="4" class="ruang"> 
            <span class="nama_lab">LAB I</span><br>
            KAPASITAS: 40 <br>
            <strong>(Lab Bebas)</strong>
            <th>I</th>
            <?php
              for ($i = 161; $i <166 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>II</th>
            <?php
              for ($i = 166; $i <171 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>III</th>
            <?php
              for ($i = 171; $i <176 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php
              for ($i = 176; $i <181 ; $i++) {
                $arr_baru = array_filter($data, function($ar) {
                  global $i;
                  return ($ar['id_lab'] == $i);
                });

                if(count($arr_baru) > 0){
                  foreach ($arr_baru as $row){
                    echo "<td>".$row["nama_matkul"]."</td>";   
                  }
                } else {
                  echo "<td></td>";
                }
              }
            ?>
          </tr>
        </tbody>
        </table>
        <div class="center">
          <h4>Note: Senin | Sesi I: 08.30, Sesi II: 11.30, Sesi III: 14.30, Sesi IV: 17.30</h3>
          <h4>      Selasa-Jumat | Sesi I: 07.30, Sesi II: 10.30, Sesi III: 13.30, Sesi IV: 16.30</h3>  
          <br>
        </div>
    </div>
  </div>
</body>
</html>

