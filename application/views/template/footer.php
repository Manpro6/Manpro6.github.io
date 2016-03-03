<footer class="navbar-wrapper2" style="background-color:#0066ff">
	<br>
    	<div style="margin-left:50px;float:left;">
		<h4 style="color:white;">UNIVERSITAS KRISTEN DUTA WACANA</h4>
		<br>
		<p style="color:white;">Jl. Dr. Wahidin Sudirohusodo No. 5-25</p>
		<p style="color:white;">Yogyakarta 55224</p>
		<p style="color:white;">Telp. 0274-563929, Fax. 0274-513235</p>
		<p style="color:white;">Email : <a href="mailto:humas@staff.ukdw.ac.id" style="color:white;"><em>humas@staff.ukdw.ac.id</em></a></p>
		<br><br><br>
		<p style="color:white;">&copy; 2016 - PPLK</p>
		<br>
	</div><h5 style="color:white;float:right;margin-bottom:15px;margin-left:-160px;text-align:left;margin-right:200px;"><strong>Kritik dan Saran</strong></h5><br><br>
	<?php echo form_open_multipart('welcome/krisan')?> 
	<form>
            <div class="form-group" style="float:right;margin-right:70px;">
        		<label style="color:white;float:right;margin-right:150px;">Nama* :</label><br>
        		<input type="text" name="nama" class="form-control" style="float:right;margin-right:-22px;" placeholder="Isikan nama" value="" required maxlength=30 size=30>
      		</div>
      		<br>
      		<div class="form-group" style="float:right;margin-right:-370px;margin-top:50px;">
        		<label style="color:white;margin-right:298px;float:right;">Pesan* :</label><br>
        		<textarea rows="4" cols="40" name="pesan" class="form-control" placeholder="Isikan pesan" value="" required></textarea>
      		</div>
      		<p style="color:white;margin-top:170px;float:right;margin-right:-85px;"><em>*Harus diisi</em></p>
            <button type="submit" class="btn btn-default" style="margin-top:190px;float:right;margin-right:-370px;">Kirim</button>
    </form>
</footer>