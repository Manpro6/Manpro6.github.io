<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Login Admin Panel</title>
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
  <!-- CSS Tambahan -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/login_admin.css')?>">


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
    <div class="container">
      <?php echo form_open('login/cek') ?>
      <form class="form-signin">
        <label for="inputEmail" class="sr-only">Username</label>
        <input name="username" type="text" class="form-control" placeholder="Username" required="" autofocus="">
        <span class="glyphicon glyphicon-user form-control-feedback" style="color:#ff9900;"></span>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback" style="color:#ff9900;"></span>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <br>
    <?php if(isset($error)) echo "<b><span style='color:yellow;'>$error</span></b>";
    if(isset($logout)) echo "<b><span style='color:#ffffcc;'>$logout</span></b>"; ?>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

<!-- <div class="container">
  <div class="login_form">
    <br>
    <h2><strong>LOGIN</strong></h2><hr>
    <?php echo form_open('login/cek') ?>    
    <form style="width:60%;">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Masukkan Username disini" value="" required maxlength=20 style="width:400px;">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan Password disini" value="" required maxlength=20 style="width:400px;">
      </div>
      <button type="submit" class="btn btn-success">Login</button>
    </form>
    <br><br><br><br>
  </div>
</div> -->