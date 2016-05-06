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
    <meta property="og:url"           content="<?php echo current_url(); ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="PPLK - Beranda ?>" />
    <meta property="og:description"   content="PPLK - Beranda" />
    <meta property="og:image"         content="<?php echo base_url('images/logo_pplk.png'); ?>" />
    <meta property="og:image:width" content="640" /> 
    <meta property="og:image:height" content="442" />
    <title>PPLK - Beranda</title>
    <link href="<?php echo base_url('css/jquery-ui.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/fullcalendar.css')?>" rel='stylesheet' />
    <link href="<?php echo base_url('css/fullcalendar.print.css')?>" rel='stylesheet' media='print' />
    <link href="<?php echo base_url('css/carol.css')?>" rel='stylesheet' />
</head>
<script type="text/javascript">
    $(document).ready(function() {
      $('.alert').delay(5000).fadeOut();
      $('.btnEdit').on('click', function() {
        var id = $(this).attr('data-id');
        var path = $(this).closest('tr').children('td.path').text();

        $('#idEdit').attr("value", id);
        $('#path').val(path);
        $.ajax({
            url : "<?php echo site_url('berita/showBerita'); ?>/"+id,
            success: function(data){
                $('#berita').html(data);
            }
        });
      });
    });
    </script>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1059221997470942',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id; js.async=true;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1059221997470942";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div id="fb-root"></div>
<body link="blue">
	<div class="container">
		<br>
    <img src="<?php echo base_url('images/logo_pplk.png'); ?> " width="300px" style="padding-left: 20px;">
    <div class="fb-share-button" data-href="<?php echo current_url(); ?> " data-layout="button_count" data-mobile-iframe="true" style="float: right; margin-top: 20px;"></div>
		<!-- <img src="<?php echo base_url('images/ukdw_logo.png')?>" height=75 style="float:left;">	
		<p style="font-size:24px;">&nbsp; PUSAT PELATIHAN DAN LAYANAN KOMPUTER</p>
		<p style="font-size:24px;">&nbsp; (PPLK)</p> -->
		<hr>
		<div class="col-md-8">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
		      <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <?php for ($i=1; $i < $count; $i++) { 
              echo "<li data-target='#myCarousel' data-slide-to='$i'></li>";
            } ?>
		      </ol>
		     <div class="carousel-inner" role="listbox">
		    <?php if($gambar) : ?>
				<?php foreach ($gambar as $mydata):?>
		        	<?php
                if($mydata['id_gambar'] == 1)
                {
                  ?>
                  <div class="item active"><img class="first-slide" src="<?php echo base_url($mydata['nama_gambar'])?>"></div>
                  <?php
                }
                else
                {
                  ?>
                  <div class="item"><img src="<?php echo base_url($mydata['nama_gambar'])?>"></div>
                  <?php
                }		    
					?>   
				<?php endforeach; ?>
   <br><br>
   <strong><font style="font-size:24px;">Berita PPLK</font></strong>
   <div id="line"></div>
   <br>
   <table>
        <?php if($berita) : ?>
              <?php foreach ($berita as $aaa):?>
                <?php $isi = $aaa['isi']?>
                   
                <?php 
                $short = substr($isi, 0, 250);
                $short = explode(' ', $short);
                array_pop($short);
                $short = implode(' ', $short);
          ?>
      <tr>
        <td><img style="max-width: 100px; padding-right: 20px;" src="<?php echo base_url($aaa['gambar'])?>"></td>
        <td style="text-align:justify;"><strong style="font-size:12pt;"><?php echo strtoupper($aaa['judul']) ?></strong>
        <br><?php echo $short  ?><a href="<?php echo site_url('berita/lihat').'/'.$aaa['id_berita'] ?>" style="color: #CC0000">&nbsp; Lihat selengkapnya</a></td>
      </tr>
      <?php endforeach; ?>
      <?php else: ?>
          <tr><td class='text-center'>
          <em>Tidak ada berita untuk ditampilkan</em></td>
          </tr>
      <?php endif ?>
      <?php endif ?>
    </table>
    <div id="pagination"><?php echo $pagination ?></div>
			 
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
      <p class="lead" style="color:red;"><em><b>*Untuk melihat detail informasi, klik pada data di kalender</b></em></p>
      <h4><b>Detail Event</b></h4>
      <hr>
      <p id="judul" class="sampai2"></p>
      <p id="titik" class="sama2"></p>
      <p id="title" class="title2"></p>
      <p id="ajar" class="sampai"></p>
      <p id="titik1" class="sama"></p>
      <p id="pengajar"></p>
      <p id="krg1" class="titik"></p>
      <p id="start" class="tanggal"></p>
      <p id="sampai" class="sama"></p>
      <p id="end" class="tanggal"></p>
      <p id="krg2" class="titik"></p>
		</div>		
	</div>
</body>
  <script src="<?php echo base_url('js/moment.min.js')?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('js/jquery.js')?>"></script>
  <script src="<?php echo base_url('js/id.js')?>"></script>
  <script src="<?php echo base_url('js/fullcalendar.min.js')?>"></script> 
  <script>
  $(document).ready(function() {    
    $('#calendar').fullCalendar({
      lang: 'id',
      buttonText: {today: 'Hari Ini'},
      contentHeight: 250,
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
        element.attr('title', event.title);
        element.bind('click', function() {
          $('#id').html(event.id);
          $('#judul').html("Kegiatan");
          $('#title').html(event.title);
          $('#titik').html(":");
          $('#ajar').html("Pengajar");
          $('#krg1').html("(");
          $('#krg2').html(")");
          $('#pengajar').html(event.pengajar);
          $('#titik1').html(":");
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
