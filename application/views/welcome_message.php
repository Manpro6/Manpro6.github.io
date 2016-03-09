<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Selamat Datang di PPLK</title>
	<style type="text/css">
	body
	{
		/*background-color: #fff;*/
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	</style>
</head>
<body>
	<div class="container">
		<br>
		<img src="images/ukdw_logo.jpg" style="float:left; margin-right:10px;" height=75>
		<p style="font-size:24px; margin-top:15px;">PUSAT PELATIHAN</p>
		<p style="font-size:24px; margin-top:15px;">DAN LAYANAN KOMPUTER</p>
		<br>
		<div style="width:1px;height:500px; background-color:black;float:right;margin-right:300px;"></div>
			<div id="myCarousel" class="carousel slide" style="margin-right:350px;">
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
		<br>
	</div>
</body>
</html>
