<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel - Jadwal Lab</title>
    <link href="<?php echo base_url('css/jquery-ui.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/fullcalendar.css')?>" rel='stylesheet' />
    <link href="<?php echo base_url('css/fullcalendar.print.css')?>" rel='stylesheet' media='print' />
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    th, tr{
      text-align: center;
    }

    .ruang {
      text-align: left;
    }

    thead th {
      background-color: grey;
      color: white;
    }

    .black {
      color: grey;
    }

    </style>
</head>
<body>
  <div class="container">
    <h2>Jadwal Pemakaian Lab PPLK 
      <?php  
        if(isset($_GET['berdasarkan'])){
          echo " - ".$_GET['berdasarkan'];
        } 
      ?> </h2>
    <hr>
    <?php
      $session_id = $this->session->userdata('is_logged_in');
      if($session_id == TRUE) {
        if($this->session->flashdata('sukses') == 1){
    ?>
    <div class="alert alert-success">
      <strong>Sukses!</strong> Update jadwal lab berhasil.
    </div>
    <?php } else if($this->session->flashdata('sukses') == 2  ) { ?>

    <div class="alert alert-danger">
      <strong>Gagal!</strong> Update jadwal lab tidak berhasil.
    </div>
    <?php } ?>
    <h2>Ubah Jadwal</h2>
    <?php echo form_open('lab/update') ?>  
    <form class="form-inline">
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
        <select class="form-control form-control-a" name="prodi">
          <option>Teknik Informatika</option>
          <option>Sistem Informasi</option>
          <option>Management</option>
          <option>Akuntansi</option>
          <option>Arsitektur</option>
          <option>Desain Produk</option>
          <option>-</option>
        </select>
      </div>
      <div class="form-group">
        <input type="jadwal" class="form-control form-panjang" name="matkul" placeholder="Jadwal Baru">
      </div> 
      <button type="submit" class="btn btn-primary">Perbaharui Data</button> 
    </form>
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
            <strong>LAB A<br>
            KAPASITAS: 60
            </strong><br>
            44 unit intel i3<br>
            RAM 6GB,<br>
            16 unit Core2Duo<br>
            RAM 3GB</td>
            <th>I</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "I" && $d['lab'] == "Lab A")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>II</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "II" && $d['lab'] == "Lab A")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>III</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "III" && $d['lab'] == "Lab A")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "IV" && $d['lab'] == "Lab A")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
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
            <strong>LAB B<br>
            (Jaringan)<br>
            KAPASITAS: 30
            </strong>
            <th>I</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "I" && $d['lab'] == "Lab B")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>II</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "II" && $d['lab'] == "Lab B")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>III</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "III" && $d['lab'] == "Lab B")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "IV" && $d['lab'] == "Lab B")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
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
            <strong>LAB C<br>
            KAPASITAS: 48
            </strong><br>
            Intel i5<br>
            Ram 8GB
            <th>I</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "I" && $d['lab'] == "Lab C")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>II</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "II" && $d['lab'] == "Lab C")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>III</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "III" && $d['lab'] == "Lab C")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "IV" && $d['lab'] == "Lab C")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
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
            <strong>LAB D<br>
            (Jaringan)<br>
            KAPASITAS: 30
            </strong>
            <th>I</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "I" && $d['lab'] == "Lab D")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>II</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "II" && $d['lab'] == "Lab D")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>III</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "III" && $d['lab'] == "Lab D")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "IV" && $d['lab'] == "Lab D")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
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
            <strong>LAB E<br>
            KAPASITAS: 30
            </strong>
            <th>I</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "I" && $d['lab'] == "Lab E")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>II</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "II" && $d['lab'] == "Lab E")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>III</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "III" && $d['lab'] == "Lab E")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "IV" && $d['lab'] == "Lab E")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
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
            <strong>LAB F<br>
            KAPASITAS: 30
            </strong>
            <th>I</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "I" && $d['lab'] == "Lab F")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>II</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "II" && $d['lab'] == "Lab F")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>III</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "III" && $d['lab'] == "Lab F")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "IV" && $d['lab'] == "Lab F")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
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
            <strong>LAB G<br>
            (Jaringan)<br>
            KAPASITAS: 30
            </strong>
            <th>I</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "I" && $d['lab'] == "Lab G")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>II</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "II" && $d['lab'] == "Lab G")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>III</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "III" && $d['lab'] == "Lab G")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "IV" && $d['lab'] == "Lab G")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
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
            <strong>LAB H<br>
            KAPASITAS: 30
            </strong>
            <th>I</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "I" && $d['lab'] == "Lab H")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>II</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "II" && $d['lab'] == "Lab H")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>III</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "III" && $d['lab'] == "Lab H")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
          <tr>
            <th>IV</th>
            <?php foreach ($data as $d):
              if ($d['sesi'] == "IV" && $d['lab'] == "Lab H")
                echo "<td>".$d['nama_matkul']."</td>";
            endforeach ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

