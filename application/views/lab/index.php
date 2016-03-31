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
      background-color: black;
      color: white;
    }

    .black {
      color: black;
    }
    </style>
</head>
<body>
  <div class="container">
    <h2>Jadwal Pemakaian Lab PPLK</h2>
    <hr>
    <p>Tampilkan berdasarkan jadwal program studi : </p>
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Semua Program Studi
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="#">Teknik Informatika</a></li>
        <li><a href="#">Sistem Informasi</a></li>
        <li><a href="#">Management</a></li>
        <li><a href="#">Akuntansi</a></li>
        <li><a href="#">Arsitektur</a></li>
        <li><a href="#">Desain Produk</a></li>
      </ul>
    </div>
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
            <td>Pr. SAP (B) - Mahas</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>II</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>III</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>IV</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
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
            <td>Pr. SAP (B) - Mahas</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>II</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>III</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>IV</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
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
            <td>Pr. SAP (B) - Mahas</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>II</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>III</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>IV</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
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
            <td>Pr. SAP (B) - Mahas</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>II</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>III</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>IV</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
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
            <td>Pr. SAP (B) - Mahas</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>II</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>III</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>IV</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
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
            <td>Pr. SAP (B) - Mahas</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>II</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>III</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>IV</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
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
            <td>Pr. SAP (B) - Mahas</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>II</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>III</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>IV</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
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
            <td>Pr. SAP (B) - Mahas</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>II</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>III</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
          <tr>
            <th>IV</th>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
            <td>Table cell</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

