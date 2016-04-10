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

    .tabel_krisan{
        padding-top: 2%;
    }

    </style>
</head>
<body>
  <div class="container tabel_krisan">
    <h2>Kritik dan Saran</h2>
    <hr> 
    <div class="table-responsive">          
      <table class="table">
        <thead class="table_head">
          <tr>
            <th  id="th-no" class="th-result text-center">no</th>
            <th id="th-krisan" class="th-result text-center">Kritik & Saran</th>
            <th id="th-tanggal" class="th-result text-center">Tanggal</th>
            <th id="th-nama" class="th-result text-center">Nama</th>
            <th id="th-email" class="th-result text-center">Email</th>
            <th class="button-action">Action</th>
          </tr>
        </thead>
        <tbody id ="tbody-table-krisan" class="">
          <tr>
            <td>1</td>
            <td>aaaaa</td>
            <td>11-05-2016</td>
            <td>cyka blyat</td>
            <td>xxxx@xxx.com</td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
           <tr>
            <td>1</td>
            <td>aaaaa</td>
            <td>11-05-2016</td>
            <td>cyka blyat</td>
            <td>xxxx@xxx.com</td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
          <tr>
            <td>1</td>
            <td>aaaaa</td>
            <td>11-05-2016</td>
            <td>cyka blyat</td>
            <td>xxxx@xxx.com</td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
           <tr>
            <td>1</td>
            <td>aaaaa</td>
            <td>11-05-2016</td>
            <td>cyka blyat</td>
            <td>xxxx@xxx.com</td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
           <tr>
            <td>1</td>
            <td>aaaaa</td>
            <td>11-05-2016</td>
            <td>cyka blyat</td>
            <td>xxxx@xxx.com</td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
           <tr>
            <td>1</td>
            <td>aaaaa</td>
            <td>11-05-2016</td>
            <td>cyka blyat</td>
            <td>xxxx@xxx.com</td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
           <tr>
            <td>1</td>
            <td>aaaaa</td>
            <td>11-05-2016</td>
            <td>cyka blyat</td>
            <td>xxxx@xxx.com</td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

