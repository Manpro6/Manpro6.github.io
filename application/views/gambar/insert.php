<br><br><br>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Upload Image</b></div>
  <div class="panel-body">
    <?php echo form_open_multipart('gambar/upload') ?>
       <table class="table table-striped">
         <tr>
          <td style="width:15%;">File Gambar</td>
          <td>
            <div class="col-sm-6">
                <?php echo form_upload('pic'); ?>
            </div>
            </td>
         </tr>
         <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Simpan">
            <a href="<?php echo site_url('gambar') ?>" class="btn btn-danger">Batal</a>
          </td>
         </tr>
       </table>
     </form>
    </div>
   </div> 
 </div>