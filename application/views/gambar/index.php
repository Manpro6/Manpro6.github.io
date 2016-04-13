<head><title>Admin Panel - Edit Gambar</title></head>
<style>
  thead th {
    background-color: grey;
    color: white;
  }
</style>
<div class="container">
  <h2>Daftar Gambar Carousel</h2><hr>    
  <?php
    if($sesi == 1)
    {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Sukses!</strong> Gambar Berhasil Diubah.</div>";
    } 
  ?>
    <table class="table" style="margin: auto; width:70%; overflow:auto; text-align:center;">
      <thead style="background:#CCC;"><tr>
        <th style="text-align:center;font-size:12pt;">Id Gambar</th>
        <th style="text-align:center;font-size:12pt;">Gambar<th>
        <th></th>
      </tr></thead>
      <tbody>
        <?php if($gambar) : ?>
              <?php foreach ($gambar as $mydata):?>
            <tr>
            <td style="text-align:center;"><?php echo $mydata['id_gambar']?></td> 
            <td><img style="width:500px; height:250px;" src="<?php echo base_url($mydata['nama_gambar'])?>"></td>
            <th style="text-align:center;">
              <a type="button" href="<?php echo site_url('gambar/ubah').'/'.$mydata['id_gambar'] ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#modal-edit"></span>&nbsp; Ubah</a><br><br>
            </th>
            </tr>
              <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" class='text-center'>
                <em>Tidak ada gambar untuk ditampilkan</em></td>
                </tr>
            <?php endif ?>
      </tbody>
    </table>
  </div>
</div>

