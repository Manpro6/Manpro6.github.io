<head><title>Admin Panel - Edit Berita</title></head>
<style> 
p.test {
    width: 40em; 
    word-wrap: break-word;
}
</style>
<div class="container">
  <h2>Daftar Berita PPLK</h2><hr>
  <div style="float: right; margin-right: 30px;">
    <a href="<?php echo site_url('berita/add')?>" class="btn btn-xs btn-primary">
      <button type='button' class='btn btn-primary' style="border: none;"><span class="glyphicon glyphicon-plus"></span> Tambah Berita</button>
    </a>
  </div>
  <br><br>       
  <div>          
    <table class="table table-striped" style="margin: auto; width:70%; overflow:auto; text-align:center;">
    
      <tbody id ="tbody-table-krisan" class="table table-striped">
        <?php if($berita) : ?>
              <?php foreach ($berita as $mydata):?>
                <?php $isi = $mydata['isi']?>
                <?php 
                $short = substr($isi, 0, 250);
                $short = explode(' ', $short);
                array_pop($short);
                $short = implode(' ', $short);
          ?>            
            <tr><td><strong><?php echo $mydata['judul'] ?></strong></td></tr>
          <th><img style="max-width:300px;" src="<?php echo base_url($mydata['gambar'])?>"></th>
            <th style="text-align:justify;"><br><p class="test">
            <?php echo $short ?>...</p></th>
            </td>
            <th style="text-align:justify;"><br><br><br>
             <a href="<?php echo site_url('berita/ubah').'/'.$mydata['id_berita'] ?>">
             <button type='button' class='btn btn-sm btn-info editButton' style="width: 90px;"><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#modal-edit"></span>&nbsp;Ubah</button>
             </a>
             <a href="<?php echo site_url('berita/delete').'/'.$mydata['id_berita'] ?>" onclick="return confirm('Anda yakin ingin menghapus berita ini?')"><br><br>
             <button type='button' class='btn btn-sm btn-danger editButton' style="width: 90px;" ><span class='glyphicon glyphicon-trash'></span>&nbsp;Hapus</button>
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
</div>
