<head><title>Berita</title></head>
<div class="container">
  <h2>Daftar Berita</h2><hr>       
    <table class="table table-striped" style="margin: auto; width:70%; overflow:auto; text-align:center;">
      <thead style="background:#CCC;"><tr>
        <th style="text-align:center;font-size:30pt;">Berita<th>
        <th></th>
      </tr></thead>
      <tbody>
        
            <tr>
            <td style="text-align:center;"><?php echo base_url($mydata['judul'])?></td> 
            <td></td>
            <td></td>
            </tr>

            <tr>
            <td><img style="width:300px; height:150px;" src="<?php echo base_url($mydata['gambar'])?>"></td>
            </tr>

            <tr>
            <td><?php echo base_url($mydata['tanggal']) ?></td>
       <td></td>
       <td></td>
            <td><?php echo  base_url($mydata['isi']) ?>
            </td>
           
            </tr>
             
      </tbody>
    </table>
  </div>
</div>