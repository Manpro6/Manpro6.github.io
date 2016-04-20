<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel - Kritik & Saran</title>
    <link href="<?php echo base_url('css/jquery-ui.min.css')?>" rel="stylesheet" type="text/css" />
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    th{
      text-align: center;
    }

    .ruang {
      text-align: left;
    }

    thead th {
      background-color: grey;
      color: white;
    }

    .black {
      color: grey;
    }

    .tabel_krisan{
        padding-top: 2%;
    }

    </style>
    <script type="text/javascript">
    $(document).ready(function() {
      $('.detailButton').on('click', function() {
        var id = $(this).attr('data-id');
        var tanggal = $(this).closest('tr').children('td.tanggal').text();
        var email = $(this).closest('tr').children('td.email').text();
        var nama = $(this).closest('tr').children('td.nama').text();

        $('#id_detail').attr("value", id);
        $('#tanggalDetail').html(tanggal);
        $('#emailDetail').html(email);
        $('#namaDetail').html(nama);
        $.ajax({
            url : "<?php echo site_url('krisan/bacaPesan'); ?>/"+id,
            success: function(data){
                $('#pesanDetail').html(data);
            }
        });
      });
    });
    </script>
</head>
<body>
  <div class="container">
    <h2>Kritik dan Saran</h2>
    <hr> 
    <?php
      if($sesi == 1)
      {
        echo "<div class='alert alert-success alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <strong>Sukses!</strong> Data kritik dan saran berhasil dihapus.</div>";
      } 
    ?>
    <div class="table-responsive" id="hide">          
      <table class="table">
        <thead class="table_head">
          <tr>
            <th id="th-no" class="th-result text-center">No</th>
            <th id="th-tanggal" class="th-result text-center" style="width:120px;">Tanggal</th>            
            <th id="th-email" class="th-result text-center">Email</th>
            <th id="th-nama" class="th-result text-center">Nama</th>
            <th id="th-krisan" class="th-result text-center">Kritik & Saran</th>           
            <th class="button-action" style="width:150px;">Action</th>
          </tr>
        </thead>
        <tbody id ="tbody-table-krisan" class="table table-striped">
          <?php if($krisan) : ?>
          <?php $no = 0; ?>
            <?php foreach ($krisan as $mydata):?>
              <tr>
              <?php $no++; $mydata['id_kritik'];?>
                <td style="text-align:center;" id='id_kritik'><?php echo $no ?></td>
                <td class="tanggal" style="text-align:center;"><?php echo substr($mydata['tanggal'], 0, 10) ?></td> 
                <td class="email"><?php echo $mydata['email']?></td>
                <td class="nama"><?php echo $mydata['nama']?></td>
                <td style="text-align:justify;">
                  <?php 
                    $pecah = explode(".", $mydata['pesan']);
                    if(count($pecah) > 1)
                    {
                      echo $pecah[0]." .....";
                    }
                    else
                    {
                      echo $pecah[0];
                    }
                  ?>
                </td>
                <th style="text-align:center;">           
                  <?php echo "<a type='button' class='btn btn-xs btn-primary detailButton' data-toggle='modal' data-target='#DetailModal' data-id='"; echo $mydata['id_kritik']."'><span class='glyphicon glyphicon-list'></span> Detail</a>"; ?>
                  <a type="button" href="<?php echo site_url('krisan/delete').'/'.$mydata['id_kritik'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><span class="glyphicon glyphicon-trash"></span>&nbsp; Hapus</a><br>
                </th>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
              <tr><td colspan="7" class='text-center'>
                <em>Tidak ada kritik dan saran untuk ditampilkan</em></td>
              </tr>
          <?php endif ?>
        </tbody>
      </table>
      <div style="float:right;"><?php echo $pagination ?></div>

      <div class="modal fade" id="DetailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">   
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick=location.reload()><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Detail Kritik & Saran</b></h4>
        </div>
        <div class="modal-body"> 
        <input type="hidden" name="id_detail" class="form-control" id="id_edit"> 
        <table>
          <tr style="height:30px;">
            <td style="width:120px;">Nama Pengirim</td>
            <td style="width:8px;">:</td>
            <td id="namaDetail"></td>
          </tr>
          <tr style="height:30px;">
            <td style="width:120px;">Email Pengirim</td>
            <td style="width:8px;">:</td>
            <td id="emailDetail"></td>
          </tr>
          <tr style="height:30px;">
            <td style="width:120px;">Kritik & Saran</td>
            <td style="width:8px;">:</td>
            <td></td>
          </tr>
        </table>
        <br>
        <div id="pesanDetail" style="text-align:justify"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick=location.reload()>Kembali</button>
        </div>
      </div>
      </div>
    </div>

    </div>
    </div>
  </div>
</body>
</html>

