<br><br>
<div class="container">
<div class="col-md-10">
<div class="panel panel-default"> 
  <div class="panel-body">   
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">      
        <table>
        <tr>
         <td colspan="2" align="center"><strong><font size="6"><?php echo strtoupper($berita['judul']) ?></font><strong></td>
         </td>
         </tr>
         <tr>            
            <td colspan="2" align="center"><img style="width:450px; height:225px; margin:10px;" src="<?php echo base_url($berita['gambar'])?>"></td>
         <td></td>
         </tr>
         <tr style="height:50px;">
           <td> <strong><?php echo $berita['penulis'] ?> |
          <?php echo $berita['tanggal'] ?></strong></td>
         </tr>
          <tr>
              <td style="width:100%;" colspan="2" align="justify"><?php echo nl2br($berita['isi']) ?></td>
              <td colspan="6">
          <td></td>
         </tr>
         <tr>
          <td></td>
          <td colspan="3"><div class="col-sm-6">
            <br>
            <a href="<?php echo site_url('') ?>" class="btn btn-danger">Kembali</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
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
