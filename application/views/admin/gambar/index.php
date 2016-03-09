<div class="container">
  <h3><strong>DAFTAR GAMBAR</strong></h3><hr>       
    <table class="table table-striped" style="width:70%; overflow:auto; text-align:center;">
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
                <em>tidak ada data Gambar untuk ditampilkan</em></td>
                </tr>
            <?php endif ?>
      </tbody>
    </table>
  </div>
</div>

