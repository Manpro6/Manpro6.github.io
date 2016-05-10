<head>
  <title>Tambah Berita</title>
  <script src="http://localhost/manpro6_fixed/js/ckeditor.js"></script>
</head>

<br><br><br>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Tambah berita</b></div>
  <div class="panel-body">
    <?php echo form_open_multipart('berita/insert') ?>
       <table class="table table-striped">
             <tr>
              <td style="width:15%;"><label for="judul">Judul</label></td>
              <td>
          <div class="col-sm-6"><input type="text" name="judul" class="form-control" id="judul" placeholder="Judul" required>
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
                <?php echo form_upload('pic'); ?>
            </div>
            </td>
         </tr>

          <tr>
          <td style="width:10%;"><label for="isi">Isi Berita</label></td>
          <td colspan="2">
          <div class="col-sm-12"> <!-- <textarea rows="30" cols="15" name="isi" class="form-control" placeholder="Isi Berita" id="isi" value="" required></textarea>   -->
          <textarea name="isi" id="editor1" rows="10" cols="80">
              Tulis berita di sini.
          </textarea>
          <script>
              // Replace the <textarea id="editor1"> with a CKEditor
              // instance, using default configuration.
              CKEDITOR.replace( 'editor1' );
          </script>
          </div></td>
          <td></td>
         </tr>

         <tr style="text-align: right;">
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Simpan">
            <a href="<?php echo site_url('berita') ?>" class="btn btn-danger">Batal</a>
          </td>
         </tr>
       </table>
     </form>
    </div>
   </div> 
 </div>