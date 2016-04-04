<?php
require_once('bdd.php');
$sql = "SELECT * FROM events ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PPLK - Beranda</title>
    <link href="<?php echo base_url('css/jquery-ui.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/fullcalendar.css')?>" rel='stylesheet' />
    <link href="<?php echo base_url('css/fullcalendar.print.css')?>" rel='stylesheet' media='print' />
    <style>
    #calendar {
      width: 360px;
    }
    .col-centered{
      float: none;
      margin-bottom: 10px;
    }
    </style>
</head>
<body>
	<div class="container">
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
			<div id="calendar" class="col-centered">
      <p class="lead" style="color:red;"><em><b>*Untuk melihat detail informasi, double klik pada data di kalender</b></em></p>
      <h4><b>Detail Event</b></h4>
      <hr><br>
      <p id="judul" style="width:100px;float:left;"></p>
      <p id="titik" style="width:8px;float:left;"></p>
      <p id="title" style="font-weight:bold;"></p>
      <p id="ajar" style="width:100px;float:left;"></p>
      <p id="titik1" style="width:8px;float:left;"></p>
      <p id="pengajar"></p>
      <p id="pelaksanaan" style="width:100px;float:left;"></p>
      <p id="titik2" style="width:8px;float:left;"></p>
      <p id="start" style="width:120px;float:left;"></p>
      <p id="sampai" style="width:8px;float:left;"></p>
      <p id="end"></p>
		</div>		
	</div>
</body>
  <script src="<?php echo base_url('js/moment.min.js')?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('js/jquery.js')?>"></script>
  <script src="<?php echo base_url('js/fullcalendar.min.js')?>"></script> 
  <script>
  $(document).ready(function() {    
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next',
        center: 'title',
        right: 'today'
      },
      editable: true,
      eventLimit: true,
      selectable: true,
      selectHelper: true,
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#id').html(event.id);
          $('#judul').html("Kegiatan");
          $('#title').html(event.title);
          $('#titik').html(":");
          $('#ajar').html("Pengajar");
          $('#pengajar').html(event.pengajar);
          $('#titik1').html(":");
          $('#pelaksanaan').html("Pelaksanaan");
          $('#titik2').html(":");
          $('#start').html(event.start.format('DD/MM/YYYY HH:mm'));
          $('#sampai').html("-");
          $('#end').html(event.end.format('DD/MM/YYYY HH:mm'));
       });
      },   
      events: [
      <?php foreach($events as $event):      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          pengajar: '<?php echo $event['pengajar']; ?>',
          deskripsi: '<?php echo $event['deskripsi']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
        },
      <?php endforeach; ?>
      ]
    });
  });
</script>
</html>
