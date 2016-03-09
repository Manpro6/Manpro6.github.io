<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.ico" />
  <!-- Ikon UKDW -->
  <link rel="icon" href="http://ukdw.ac.id/images/favicon.png" type="image/png">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.css')?>">
  <link rel="stylesheet" href= <?php echo base_url('css/carol.css')?>>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/nav.css')?>">

  <!-- Bootstrap Core JS -->
  <script src="<?php echo base_url('js/jquery-2.1.3.min.js')?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>


  <!-- Custom Fonts -->
  <link href="<?php echo base_url('font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('font-awesome/css/font-awesome.css')?>" rel="stylesheet" type="text/css">
  <script src="<?php echo base_url('js/jquery-2.1.3.min.js')?>"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url('js/bootstrap.js')?>"></script>
  <script src="<?php echo base_url('js/cbpAnimatedHeader.js')?>"></script>
  <script src="<?php echo base_url('js/cbpAnimatedHeader.min.js')?>"></script>
  <script src="<?php echo base_url('js/classie.js')?>"></script>
  <script src="<?php echo base_url('js/jquery.js')?>"></script>
  <script src="<?php echo base_url('js/jqBootstrapValidation.js')?>"></script>
</head>
<body>
  <div class="container-fluid blue-background">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('')?>" style="color:white; font-size:20pt; margin-left:3px;">PPLK</a>
        </div>
        <form class="navbar-form navbar-right">
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
              <div class="form-group">
                <input type="text" name="cari" placeholder="cari" class="form-control">
              </div>     
              <a href="<?php echo site_url('login')?>" style="color:white; font-size:12pt; float:right; margin-left:15px; margin-top:8px;">LOGIN</a>
        </form>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url('index.php/gambar')?>">Gambar</a></li>
            <li><a href="<?php echo base_url('index.php/kursus')?>">Kursus</a></li>    
            <li><a href="<?php echo base_url('index.php/sertifikasi')?>">Sertifikasi</a></li>
            <li><a href="<?php echo base_url('index.php/tentang')?>">Tentang</a></li>        
          </ul>
        </div>
      </nav>
    </div>
  </div>