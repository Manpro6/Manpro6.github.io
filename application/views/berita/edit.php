<br><br><br><br>
<div class="container">
<div class="col-md-10">
<div class="panel panel-default">
  <div class="panel-heading"><b>Edit Berita<b></div>
  <div class="panel-body">   
    <form action="<?= site_url('gambar/update') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="hidden" name="id_berita" value="<?php echo $berita['id_berita'] ?>">
        <input type="hidden" name="path" value="<?php echo $berita['gambar'] ?>">
        <table class="table table-striped">
        <tr>
              <td style="width:15%;"><label for="judul">Judul</label></td>
              <td>
          <div class="col-sm-6"><input type="text" name="title" class="form-control" id="judul" placeholder="Judul" required>
          </div></td>
          </tr>

          <tr>
              <td style="width:15%;"><label for="penulis">Penulis</label></td>
              <td>
          <div class="col-sm-6"><input type="text" name="penulis" class="form-control" id="penulis" placeholder="Nama Penulis" required>
          </div></td>
         </tr>
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
            <td><div class="col-sm-6"><img style="width:300px; height:150px;" src="<?php echo base_url($berita['gambar'])?>"></div></td>
         </tr>
          <tr>

              <td style="width:10%;"><label for="isi">Isi Berita</label></td>
              <td colspan="2">
          <div class="col-sm-6"> <textarea rows="30" cols="15" name="isi" class="form-control" placeholder="Isi Berita" id="isi" value="" required></textarea>  
          </div></td>
  <td></td>
         </tr>
         <tr>
          <td></td>
          <td colspan="3" align="center"><div class="col-sm-6">
            <button type="submit" class="btn btn-success">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo site_url('berita') ?>" class="btn btn-danger">Batal</a>
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
