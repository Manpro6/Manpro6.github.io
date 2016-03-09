	<footer class="navbar-wrapper2" style="background-color:#0066ff">
		<div class="container">
			<div class="col-md-8">	
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
			<div class="col-md-4">
				<br>
				<h4 style="color:white;">KRITIK DAN SARAN</h4> 
				<br>
				<?php echo form_open_multipart('welcome/krisan')?> 
				<form>
			            <div class="form-group">
			        		<label style="color:white;">Nama* :</label><br>
			        		<input type="text" name="nama" class="form-control" placeholder="Isikan nama" value="" required maxlength=30 size=30>
			      		</div>
			      		<br>
			      		<div class="form-group">
			        		<label style="color:white;">Pesan* :</label><br>
			        		<textarea rows="4" cols="20" name="pesan" class="form-control" placeholder="Isikan pesan" value="" required></textarea>
			      		</div>
			      		<p style="color:white;"><em>*Harus diisi</em></p>
			            <button type="submit" class="btn btn-default">Kirim</button>
			    </form>
			    <br>
			</div>
		</div>
	</footer>
</div>