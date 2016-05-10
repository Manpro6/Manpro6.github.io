<head>
<title>Edit Berita</title>
  <script src="http://localhost/manpro6_fixed/js/ckeditor.js"></script>
</head>

<br><br><br><br>
<div class="container">
<div class="col-md-10">
<div class="panel panel-default">
  <div class="panel-heading"><b>Edit Berita<b></div>
  <div class="panel-body">   
    <form action="<?= site_url('berita/update') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="hidden" name="id_berita" value="<?php echo $berita['id_berita'] ?>">
        <input type="hidden" name="path" value="<?php echo $berita['gambar'] ?>">
        <table class="table table-striped">
        <tr>
              <td style="width:15%;"><label for="judul">Judul</label></td>
              <td>
          <div class="col-sm-6"><input type="text" name="judul" class="form-control" id="judul" placeholder="Judul" required value="<?php echo $berita['judul'] ?>">
          </div></td>
          </tr>

          <tr>
              <td style="width:15%;"><label for="penulis">Penulis</label></td>
              <td>
          <div class="col-sm-6"><input type="text" name="penulis" class="form-control" id="penulis" placeholder="Nama Penulis" required value="<?php echo $berita['penulis'] ?>">
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

              <td ><label for="isi">Isi Berita</label></td>
              <td style="padding-left: 22px;">
              <textarea name="isi" id="editor1" rows="10" cols="80">
                  <?php echo $berita['isi'] ?>
              </textarea>
              <script>
                  // Replace the <textarea id="editor1"> with a CKEditor
                  // instance, using default configuration.
                  CKEDITOR.replace( 'editor1' );
              </script>
          <!-- <div class="col-sm-6"> <textarea rows="30" cols="15" name="isi" class="form-control" placeholder="Isi Berita" id="isi" required><?php echo $berita['isi'] ?></textarea>  
          </div> --></td>
         <tr style="text-align: right;">
           <td colspan="2">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?php echo site_url('berita') ?>" class="btn btn-danger">Batal</a> 
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
