<br><br>
<div class="container">
  <?php
    if($sesi == 1)
    {
      echo "<div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Perhatian!</strong> Pilih Gambar Perubahannya.</div>";
    } 
    elseif($sesi == 2)
    {
      echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Perhatian!</strong> Tidak menerima format file selain .jpg, .jpeg, .gif dan .png.</div>";
    } 
  ?>
<div class="col-md-10">
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Upload Gambar</b></div>
  <div class="panel-body">   
    <form action="<?= site_url('gambar/update') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="hidden" name="id_gambar" value="<?php echo $gambar['id_gambar'] ?>">
        <input type="hidden" name="path" value="<?php echo $gambar['nama_gambar'] ?>">
        <table class="table table-striped">
         <tr>
          <td style="width:15%;">File Gambar</td>
          <td>
            <div class="col-sm-6">
                <input type="file" name="pic">
            </div>
            </td>
         </tr>
         <tr>
            <td></td>
            <td><div class="col-sm-6"><img style="width:500px; height:250px;" src="<?php echo base_url($gambar['nama_gambar'])?>"></div></td>
         </tr>
         <tr>
          <td></td>
          <td colspan="2"><div class="col-sm-6">
            <button type="submit" class="btn btn-success">Upload</button>
            <a href="<?php echo site_url('gambar') ?>" class="btn btn-danger">Batal</a>
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
