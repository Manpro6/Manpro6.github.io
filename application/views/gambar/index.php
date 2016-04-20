<head><title>Admin Panel - Edit Gambar</title></head>
<style>
  thead th {
    background-color: grey;
    color: white;
  }
</style>
<script type="text/javascript">
    $(document).ready(function() {
      $('.btnEdit').on('click', function() {
        var id = $(this).attr('data-id');
        var path = $(this).closest('tr').children('td.path').text();

        $('#idEdit').attr("value", id);
        $('#path').val(path);
        $.ajax({
            url : "<?php echo site_url('gambar/showGambar'); ?>/"+id,
            success: function(data){
                $('#gambar').html(data);
            }
        });
      });
    });
    </script>
<div class="container">
  <h2>Daftar Gambar Carousel</h2><hr>    
  <?php
    if($sesi == 1)
    {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Sukses!</strong> Gambar Berhasil Diubah.</div>";
    } 
    elseif($sesi == 2)
    {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Sukses!</strong> Gambar Berhasil Ditambahkan.</div>";
    } 
    elseif($sesi == 3)
    {
      echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Perhatian!</strong> Tidak menerima format file selain .jpg, .jpeg, .gif dan .png.</div>";
    } 
    elseif($sesi == 4)
    {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Sukses!</strong> Gambar berhasil dihapus.</div>";
    }
  ?>
  <button type='button' class='btn btn-primary btn' data-toggle='modal' data-target='#ModalAdd' style="margin-bottom:20px;"><span class="glyphicon glyphicon-plus"></span> Tambah Gambar</button>

    <table class="table" style="margin: auto; width:60%; overflow:auto; text-align:center;">
      <thead style="background:#CCC;"><tr>
        <th style="text-align:center;font-size:12pt;display:none;">Id Gambar</th>
        <th style="text-align:center;font-size:12pt;display:none;">Nama Gambar</th>
        <th style="text-align:center;font-size:12pt;">Gambar</th>
        <th style="text-align:center;font-size:12pt;width:">Action</th>
      </tr></thead>
      <tbody>
        <?php if($gambar) : ?>
              <?php foreach ($gambar as $mydata):?>
            <tr>
            <td style="text-align:center;display:none;" class="id"><?php echo $mydata['id_gambar']?></td> 
            <td style="text-align:center;display:none;" class="path"><?php echo $mydata['nama_gambar']?></td>
            <td><img style="width:400px; height:200px;" src="<?php echo base_url($mydata['nama_gambar'])?>"></td>
            <th style="text-align:center;"> <!--  -->
              <?php echo "<a type='button' class='btn btn-xs btn-primary btnEdit' data-toggle='modal' data-target='#ModalEdit' data-id='"; echo $mydata['id_gambar']."'><span class='glyphicon glyphicon-edit'></span> Ubah</a>"; ?>
              <a type="button" href="<?php echo site_url('gambar/delete').'/'.$mydata['id_gambar'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus gambar ini?')"><span class="glyphicon glyphicon-trash"></span>&nbsp; Hapus</a><br><br>
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
    <div style="float:right;"><?php echo $pagination ?></div>

    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form action="<?= site_url('gambar/insert') ?>" method="post" enctype="multipart/form-data">    
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick=location.reload()><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Upload Gambar</b></h4>
        </div>
        <div class="modal-body">    
              <div class="form-group">
                <table border=0>
                 <tr style="height:50px;">
                  <td style="width:20%;">File Gambar :</td>
                  <td>
                    <div class="col-sm-6">
                        <input type="file" name="pic" required>
                    </div>
                    </td>
                 </tr>
               </table>
              </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick=location.reload()>Batal</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
      </div>
      </div>
    </div>

    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form action="<?= site_url('gambar/update') ?>" method="post" enctype="multipart/form-data">   
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick=location.reload()><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Upload Perubahan Gambar</b></h4>
        </div>
        <div class="modal-body">    
          <input type="hidden" name="id_gambar" class="form-control" id="idEdit"> 
          <input type="hidden" name="path" class="form-control" id="path"> 
              <div class="form-group">
                <table border=0>
                 <tr style="height:50px;">
                  <td style="width:20%;">File Gambar :</td>
                  <td>
                    <div class="col-sm-6">
                        <input type="file" name="pic" required>
                    </div>
                    </td>
                 </tr>
               </table>
               <div id="gambar" style="margin-left:18%;"></div>
              </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick=location.reload()>Batal</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
      </div>
      </div>
    </div>

  </div>
</div>



