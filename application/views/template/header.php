<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">   
  <!-- Ikon UKDW -->
  <link rel="icon" href="<?php echo base_url('images/favicon.png')?>" type="image/png">

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
  <style>
    hover {
    background-color:#ff6600;
    color:black;
    cursor: pointer;
  }
  </style>
</head>
<body>
 <div class="container-fluid blue-background" style="margin-top:0px;">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url('')?>">PPLK</a>
        </div>
            <?php
              $session_id = $this->session->userdata('is_logged_in');
              if($session_id == TRUE) {
           ?>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url('/gambar')?>">Gambar</a></li>       
                <li><a href="<?php echo base_url('/event')?>">Penjadwalan</a></li> 
                <li><a href="<?php echo base_url('/lab')?>">Jadwal Lab</a></li> 
                <li><a href="<?php echo base_url('/krisan')?>">Kritik & Saran</a></li>
                <li><a href="<?php echo base_url('/berita')?>">Berita</a></li>  
              </ul>
              <ul style="float:right;" class="nav navbar-nav">
                <li><a href="<?php echo site_url('login/logout') ?>"><i class="fa fa-user"></i> Hi <?php print_r($this->session->userdata['username']); ?> | <i class="fa fa-fw fa-power-off"></i> Logout</a></li>
              </ul>
            </div>
          <?php }
        else {
        ?>      
        </form>        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url('/kursus')?>">Kursus</a></li>    
            <li><a href="<?php echo base_url('/sertifikasi')?>">Sertifikasi</a></li>
            <li><a href="<?php echo base_url('/lab')?>">Jadwal Lab</a></li>  
            <li><a href="<?php echo base_url('/tentang')?>">Tentang</a></li>        
          </ul>
        </div>
        <?php } ?>
      </nav>
    </div>
  </div>