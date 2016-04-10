<?php 
  global $i;
  $iterasi = 1;
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
    .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

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

    .ruang {
      vertical-align: middle;
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
      <strong>Sukses!</strong> Entri jadwal baru berhasil.
    </div>
    <?php } else if($this->session->flashdata('sukses') == 2  ) { ?>

    <div class="alert alert-danger">
      <strong>Gagal!</strong> Entri jadwal baru tidak berhasil.
    </div>
    <?php } if($this->session->flashdata('hapus') == 1){
    ?>
    <div class="alert alert-success">
      <strong>Sukses!</strong> Jadwal lab berhasil dihapus.
    </div>
    <?php } else if($this->session->flashdata('hapus') == 2  ) { ?>

    <div class="alert alert-danger">
      <strong>Gagal!</strong> Jadwal lab tidak berhasil dihapus.
    </div>
     ?>

    <?php }
    ?>

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
        <li><a href="?lab=Lab A">Lab A</a></li>
        <li><a href="?lab=Lab B">Lab B</a></li>
        <li><a href="?lab=Lab C">Lab C</a></li>
        <li><a href="?lab=Lab D">Lab D</a></li>
        <li><a href="?lab=Lab F">Lab F</a></li>
        <li><a href="?lab=Lab G">Lab G</a></li>
        <li><a href="?lab=Lab H">Lab H</a></li>
        <li><a href="?lab=Lab I">Lab I</a></li>
      </ul>
    </div>
    <br>
    <div class="table-responsive">          
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
        <?php foreach ($lab as $jadwal_lab) {
          echo "<tbody id ='tbody-table-krisan'>
                <tr>
                  <td>".$jadwal_lab['id_jadwal_lab']."</td>
                  <td>".$jadwal_lab['nama_matkul']."</td>
                  <td>".$jadwal_lab['hari']."</td>
                  <td>".$jadwal_lab['sesi']."</td>
                  <td>".$jadwal_lab['prodi']."</td>
                  <td>".$jadwal_lab['status']."</td>
                  <td>".$jadwal_lab['tanggal_mulai']."</td>
                  <td>".$jadwal_lab['tanggal_selesai']."</td>
                  <td>
                    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#editModal'>Ubah</button>
                    <button type='button' class='btn btn-danger'><a href='"; echo base_url().'index.php/lab/delete/'.$jadwal_lab['id_jadwal_lab']."'>Hapus</button>
                  </td>
                </tr>
                </tbody>";
        } ?>
        
      </table>
      <ul class="pagination">
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
      </ul>
    </div>

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
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
                    echo "<td>".$row["nama_matkul"]."</td>";   
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
          <h4>Note: Senin | Sesi I: 08.30, Sesi II: 11.30, Sesi III: 14.30, Sesi IV: 17.30</h3>
          <h4>      Selasa-Jumat | Sesi I: 07.30, Sesi II: 10.30, Sesi III: 13.30, Sesi IV: 16.30</h3>  
          <br>
        </div>
    </div>
  </div>
</body>
</html>

