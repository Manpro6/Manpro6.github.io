<head><title>Admin Panel - Edit Gambar</title></head>
<link href="<?php echo base_url('css/carol.css')?>" rel='stylesheet'/>
<script type="text/javascript">
    $(document).ready(function() {
      $('.alert').delay(5000).fadeOut();
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
      $session_id = $this->session->userdata('is_logged_in');
      if($session_id == TRUE)
      {      
        if($this->session->flashdata('index') == 1)
        {
          echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Sukses!</strong> Gambar Berhasil Ditambah.</div>";
        }
        else if($this->session->flashdata('index') == 2)
        {
          echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Sukses!</strong> Gambar Berhasil Diubah.</div>";
        }
        else if($this->session->flashdata('index') == 3)
        {
          echo "<div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <strong>Perhatian!</strong> Tidak menerima format file selain .jpg, .jpeg, .gif dan .png.</div>";
        }
        else if($this->session->flashdata('index') == 4)
        {
          echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <strong>Sukses!</strong> Gambar Berhasil Dihapus.</div>";
        }
      }     
  ?>
    <button type='button' class='btn btn-primary btn' data-toggle='modal' data-target='#ModalAdd' style="float:right;"><span class="glyphicon glyphicon-plus"></span> Tambah Gambar</button>
    <table class="table" id="formatTabel">
      <thead><tr>
        <th id="showNone">Id Gambar</th>
        <th id="showNone">Nama Gambar</th>
        <th class="showFill">Gambar</th>
        <th class="showFill">Aksi</th>
      </tr></thead>
      <tbody>
        <?php if($gambar) : ?>
              <?php foreach ($gambar as $mydata):?>
            <tr>
            <td id="showNone" class="id"><?php echo $mydata['id_gambar']?></td> 
            <td id="showNone" class="path"><?php echo $mydata['nama_gambar']?></td>
            <td><img class="img" src="<?php echo base_url($mydata['nama_gambar'])?>"></td>
            <th class="center">
              <?php echo "<a type='button' class='btn btn-sm btn-info btnEdit' data-toggle='modal' data-target='#ModalEdit' data-id='"; echo $mydata['id_gambar']."'><span class='glyphicon glyphicon-edit'></span> Ubah</a>"; ?>
              <a type="button" href="<?php echo site_url('gambar/delete').'/'.$mydata['id_gambar'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus gambar ini?')"><span class="glyphicon glyphicon-trash"></span>&nbsp; Hapus</a><br><br>
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
    <div id="pagination"><?php echo $pagination ?></div>

    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form action="<?= site_url('gambar/insert') ?>" method="post" enctype="multipart/form-data">    
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=location.reload()><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Unggah Gambar</b></h4>
        </div>
        <div class="modal-body">    
              <div class="form-group">
                <table border=0>
                 <tr>
                  <td class="pic">File Gambar :</td>
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
          <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick=location.reload()>Batal</button>
          <button type="submit" class="btn btn-primary">Unggah Gambar</button>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=location.reload()><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Unggah Perubahan Gambar</b></h4>
        </div>
        <div class="modal-body">    
          <input type="hidden" name="id_gambar" class="form-control" id="idEdit"> 
          <input type="hidden" name="path" class="form-control" id="path"> 
              <div class="form-group">
                <table border=0>
                 <tr>
                  <td class="pic">File Gambar :</td>
                  <td>
                    <div class="col-sm-6">
                        <input type="file" name="pic" required>
                    </div>
                    </td>
                 </tr>
               </table>
               <div id="gambar" class="margin"></div>
              </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick=location.reload()>Batal</button>
          <button type="submit" class="btn btn-primary">Unggah Perubahan</button>
        </div>
      </form>
      </div>
      </div>
    </div>

  </div>
</div>



