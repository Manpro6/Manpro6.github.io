<head><title>PPLK - Beranda</title></head>
<body>
	<div class="container" style="margin-bottom: 20px;">
		<br>
		<img src="<?php echo base_url('images/ukdw_logo.png')?>" height=75 style="float:left;">	
		<p style="font-size:24px;">&nbsp; PUSAT PELATIHAN DAN LAYANAN KOMPUTER</p>
		<p style="font-size:24px;">&nbsp; (PPLK)</p>
		<hr>
		<div class="col-md-8">
			<div id="myCarousel" class="carousel slide">
		      <ol class="carousel-indicators">
		        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		        <li data-target="#myCarousel" data-slide-to="1"></li>
		        <li data-target="#myCarousel" data-slide-to="2"></li>
		        <li data-target="#myCarousel" data-slide-to="3"></li>
		        <li data-target="#myCarousel" data-slide-to="4"></li>
		      </ol>
		     <div class="carousel-inner" role="listbox">
		    <?php if($gambar) : ?>
				<?php foreach ($gambar as $mydata):?>
		        	<?php
					    if($mydata['id_gambar'] == 1)
					    	echo "<div class='item active'><img class='first-slide' src='$mydata[nama_gambar]'></div>";
					    elseif($mydata['id_gambar'] == 2)
					    	echo "<div class='item'><img class='second-slide' src='$mydata[nama_gambar]'></div>";
					    elseif($mydata['id_gambar'] == 3)
					    	echo "<div class='item'><img class='third-slide' src='$mydata[nama_gambar]'></div>";
					    elseif($mydata['id_gambar'] == 4)
					    	echo "<div class='item'><img class='fourth-slide' src='$mydata[nama_gambar]'></div>";
					    elseif($mydata['id_gambar'] == 5)
					    	echo "<div class='item'><img class='fifth-slide' src='$mydata[nama_gambar]'></div>";
					?>  
				<?php endforeach; ?>
			<?php endif ?> 
		      </div>
		      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		        <span class="sr-only">Previous</span>
		      </a>
		      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		        <span class="sr-only">Next</span>
		      </a>
			</div>
		</div>
		<div class="col-md-4">
			NANTI KALENDER DISINI
		</div>
	</div>
</body>
</html>
