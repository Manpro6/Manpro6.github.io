<link href="<?php echo base_url('css/login.css');?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url('font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url('css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />

<body style="background-color:#0066ff"> 
<div id="gbr">
  <img src="<?php echo base_url('images/ukdw_logo.png')?>" style="height:175px;"> 
</div>
<div id="login_form" style="text-align:center;">
  <div>
    <h2 style="color:white;"><b>PPLK</b></h2>
  </div>
    <br>
      <?php echo form_open('login/cek') ?>
      <form>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" id="username" name="username">
            <span class="glyphicon glyphicon-user form-control-feedback" style="color:#000066;"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback" style="color:#000066;"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-block btn-flat" id="submit" name="submit" value="Masuk">
            </div>
          </div>
          <p class="kembali">Atau kembali ke <a href="<?php echo base_url('')?>">halaman utama</a>.</p>
     </form>
     <br>
      </p><?php if(isset($error)) echo "<b><span style='color:yellow;'>$error</span></b>";
      if(isset($logout)) echo "<b><span style='color:yellow;'>$logout</span></b>"; ?>
    </div> 
</div>
</body>