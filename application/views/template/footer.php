	<?php
      $session_id = $this->session->userdata('is_logged_in');
      if($session_id == TRUE) {
      }
      else {
   ?>
	<footer class="navbar-wrapper2" style="background-color:#0066ff">
		<div class="container">
			<div class="col-md-7">	
				<br>
				<h4 style="color:white;">UNIVERSITAS KRISTEN DUTA WACANA</h4>
				<br>
				<p style="color:white;">Jl. Dr. Wahidin Sudirohusodo No. 5-25</p>
				<p style="color:white;">Yogyakarta 55224</p>
				<p style="color:white;">Telp. 0274-563929, Fax. 0274-513235</p>
				<p style="color:white;">Email : <a href="mailto:humas@staff.ukdw.ac.id" style="color:white;"><em>humas@staff.ukdw.ac.id</em></a></p>
				<br><br><br>
				<p style="color:white;">&copy; 2016 - PPLK Manpro Group 6</p>
				<br>
			</div>
			<div class="col-md-5">
				<br>
				<h4 style="color:white;">KRITIK DAN SARAN</h4> 
				<br>
				<?php echo form_open_multipart('krisan/insert')?> 
				<form>
					<table>
						<tr style="height:50px;">
							<td style="color:white;width:110px;font-weight:bold;">Email*</td>
							<td style="color:white;width:10px;font-weight:bold;">:</td>
							<td><input type="email" name="email" class="form-control" placeholder="Isikan email" value="" required maxlength=30 style="width:300px;"></td>
						</tr>	
						<tr style="height:50px;">
							<td style="color:white;width:110px;font-weight:bold;">Nama*</td>
							<td style="color:white;width:10px;font-weight:bold;">:</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Isikan nama" value="" required maxlength=30 style="width:300px;"></td>
						</tr>	
						<tr style="height:50px;">
							<td style="color:white;width:110px;font-weight:bold;">Pesan*</td>
							<td style="color:white;width:10px;font-weight:bold;">:</td>
							<td><textarea rows="3" cols="20" name="pesan" class="form-control" placeholder="Isikan pesan" value="" required style="width:300px;margin-top:10px;"></textarea></td>
						</tr>
						<tr style="height:50px;">
							<td style="color:white;width:110px;font-weight:bold;">Kode Captcha*</td>
							<td style="color:white;width:10px;font-weight:bold;">:</td>
							<td style="margin-top:10px;"><?=$captcha_image?>&nbsp;<a href="#" onclick="parent.window.location.reload(true)"><em>[perbarui gambar]</em></a></td>
						</tr>
						<tr style="height:50px;">
							<td style="color:white;width:110px;"></td>
							<td style="color:white;width:10px;"></td>
							<td><input type="text" name="input_captcha" class="form-control" placeholder="Isikan kode captcha" value="" required size=30 style="width:300px;"></td>
						</tr>
					</table>
		      		<p style="color:white;margin-left:115px;"><em>*Harus diisi</em></p>
		            <button type="submit" class="btn btn-default" style="margin-left:115px;">Kirim</button>
		    </form>
			    <br>
			</div>
		</div>
	</footer>
	<?php } ?>
</div>