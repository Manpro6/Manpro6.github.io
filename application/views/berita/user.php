<head><title>Berita</title></head>
<div class="container">
  <h2>Daftar Berita</h2><hr>       
    <table class="table table-striped" style="margin: auto; width:70%; overflow:auto; text-align:center;">
      <thead style="background:#CCC;"><tr>
        <th style="text-align:center;font-size:30pt;">Berita<th>
        <th></th>
      </tr></thead>
      <tbody>
        <?php if($berita) : ?>
              <?php foreach ($berita as $mydata):?>
              	<?php $isi = $mydata['isi']?>
              	<?php $sinopsis = substr($isi, 1,50)?>
            <tr>
            <td style="text-align:center;"><?php echo $mydata['id_berita']?></td> 
           
            <td>
            <th><?php echo base_url($mydata['judul']) ?></th>
          <th><img style="width:300px; height:150px;" src="<?php echo base_url($mydata['gambar'])?>"></th>
            <th><?php echo $sinopsis ?></th>
            </td>
            <th style="text-align:center;">
              <a type="button" href="<?php echo site_url('berita/detail').'/'.$mydata['id_berita'] ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit" data-toggle="modal"></span>&nbsp; Lihat Lebih Lanjut</a><br><br>
            </th>
            </tr>
              <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" class='text-center'>
                <em>Tidak ada berita untuk ditampilkan</em></td>
                </tr>
            <?php endif ?>
      </tbody>
    </table>
  </div>
</div>
