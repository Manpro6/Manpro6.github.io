<div class="container">
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
</div>
