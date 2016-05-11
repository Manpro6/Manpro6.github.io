	<?php
      $session_id = $this->session->userdata('is_logged_in');
      if($session_id == TRUE) {
      }
      else {
   ?>
   <div style="clear: both;"></div>
	<footer class="navbar-wrapper2" style="background-color:#0066ff; margin-top: 30px;">
		<div class="container">
			<div class="col-md-7">	
				<br>
				<h4 id="header">UNIVERSITAS KRISTEN DUTA WACANA</h4>
				<br>
				<p id="konten">Jl. Dr. Wahidin Sudirohusodo No. 5-25</p>
				<p id="konten">Yogyakarta 55224</p>
				<p id="konten">Telp. 0274-563929, Fax. 0274-513235</p>
				<p id="konten">Email : <a href="mailto:humas@staff.ukdw.ac.id" style="color:white;"><em id="konten">humas@staff.ukdw.ac.id</em></a></p>
				<br><br><br>
				<p id="konten">&copy; 2016 - PPLK Manpro Group 6</p>
				<br>
			</div>
			<div class="col-md-5">
				<br>
				<h4 id="header">KRITIK DAN SARAN</h4> 
				<br>
				<?php echo form_open_multipart('krisan/insert')?> 
				<form>
			       <table>
						<tr style="height:50px;">
							<td id="box">Email*</td>
							<td id="sama">:</td>
							<td><input type="email" name="email" class="form-control" placeholder="Isikan email" value="" required maxlength=30 style="width:300px;height:30px;font-size:10pt;"></td>
						</tr>	
						<tr style="height:20px;">
							<td id="box">Nama*</td>
							<td id="sama">:</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Isikan nama" value="" required maxlength=30 style="width:300px;height:30px;font-size:10pt;"></td>
						</tr>	
						<tr style="height:75px;">
							<td id="box">Pesan*</td>
							<td id="sama">:</td>
							<td><textarea rows="3" cols="20" name="pesan" class="form-control" placeholder="Isikan pesan" value="" required style="width:300px;margin-top:10px;height:60px;font-size:10pt;"></textarea></td>
						</tr>
						<tr style="height:40px;">
							<td id="box">Kode Captcha*</td>
							<td id="sama">:</td>
							<td style="margin-top:10px;"><?=$captcha_image?>&nbsp;<a href="#" onclick="parent.window.location.reload(true)"><em id="konten">[perbarui gambar]</em></a></td>
						</tr>
						<tr style="height:40px;">
							<td id="box"></td>
							<td style=";"></td>
							<td><input type="text" name="input_captcha" class="form-control" placeholder="Isikan kode captcha" value="" required size=30 style="width:300px;height:30px;font-size:10pt;"></td>
						</tr>
					</table>
		      		<p style="margin-left:26%;" id="konten"><em>*Harus diisi</em></p>
		            <button type="submit" class="btn btn-default" style="margin-left:26%;height:30px;font-size:10pt;">Kirim</button>
			    </form>
			    <br>
			</div>
		</div>
	</footer>
	<?php } ?>
</div>