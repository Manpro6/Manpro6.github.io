<head><title>Admin Panel - Edit Berita</title></head>
<div class="container">
  <h2>Daftar berita</h2><hr>
  <div style="float: right; margin-right: 30px;">
    <a href="<?php echo site_url('berita/add')?>" class="btn btn-xs btn-primary">
      <button type='button' class='btn btn-primary' style="border: none;"><span class="glyphicon glyphicon-plus"></span> Tambah Berita</button>
    </a>
  </div>
  <br><br>       
    <table class="table table-striped" style="margin: auto; width:70%; overflow:auto; text-align:center;">
    
      <tbody>
        <?php if($berita) : ?>
              <?php foreach ($berita as $mydata):?>
                <?php $isi = $mydata['isi']?>
                <?php 
                $length = 250;
                $input = substr($isi, 0,250);
    

          if( strlen($input) <= $length )
          { $input=$input;}
         
          else
          {
          $parts = explode(" ", $input);

           while( strlen( implode(" ", $parts) ) > $length )
          array_pop($parts);

           $input=implode(" ", $parts);
          }
          ?>
            <tr>
            <td>
            <tr><td><strong><?php echo $mydata['judul'] ?></strong></td></tr>
          <th><img style="width:300px; height:150px;" src="<?php echo base_url($mydata['gambar'])?>"></th>
            <th style="text-align:justify;"><br><?php echo $input ?>......................</th>
            </td>
            <th style="text-align:justify;"><br><br><br>
             <a href="<?php echo site_url('berita/ubah').'/'.$mydata['id_berita'] ?>">
             <button type='button' class='btn btn-info editButton' style="width: 90px;"><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#modal-edit"></span>&nbsp;Ubah</button>
             </a>
             <a href="<?php echo site_url('berita/delete').'/'.$mydata['id_berita'] ?>">
             <button type='button' class='btn btn-danger editButton' style="width: 90px;"><span class='glyphicon glyphicon-trash'></span>&nbsp;Hapus</button>
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
