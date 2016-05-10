<head>
  <title>PPLK - <?php echo strtoupper($berita['judul']) ?></title>
  <meta property="og:url"           content="<?php echo current_url(); ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="PPLK - <?php echo strtoupper($berita['judul']) ?>" />
  <meta property="og:description"   content="Berita PPLK" />
  <meta property="og:image"         content="<?php echo base_url($berita['gambar']) ?>" />
  <meta property="og:image:width" content="640" /> 
  <meta property="og:image:height" content="442" />
</head>

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
<br><br>
<div class="container">
<div class="col-md-10">
<div class="panel panel-default"> 
  <div class="panel-body">   
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">      
        <table>
        <tr>
         <td colspan="2" align="center"><strong><font size="6"><?php echo strtoupper($berita['judul']) ?></font><strong></td>
         </td>
         </tr>
         <tr>            
            <td colspan="2" align="center"><img style="max-height: 250px; margin:10px;" src="<?php echo base_url($berita['gambar'])?>"></td>
         <td></td>
         </tr>
         <tr style="font-size: 19px;">

           <td colspan="5"> <hr style="text-align: center;"><strong><?php echo $berita['penulis'] ?> |
          <?php echo $berita['tanggal'] ?></strong>
          <hr style="text-align: center;">
          </td>
         </tr>
          <tr>
              <td style="width:100%;" colspan="2" align="justify"><?php echo $berita['isi'] ?></td>
              <td colspan="6">
          <td></td>
         </tr>
         <tr>
          <td><div class="fb-share-button" data-href="<?php echo current_url(); ?> " data-layout="button_count" data-mobile-iframe="true"></div>
          </td>
          <div id="fb-root"></div>
          <td colspan="3">
          <div class="col-sm-6">
            <br>
            <a href="<?php echo site_url('') ?>" class="btn btn-danger">Kembali</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
          </div>
          </td>
         </tr>
       </table>
      </div>          
    </form>
  </div>
</div>
</div>
</div> 
</div>
