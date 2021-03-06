<?php
  require_once('bdd.php');
  $sql = "SELECT * FROM events ";
  $req = $bdd->prepare($sql);
  $req->execute();
  $events = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel - Penjadwalan</title>
    <link href="<?php echo base_url('css/jquery-ui.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/fullcalendar2.css')?>" rel='stylesheet' />
    <link href="<?php echo base_url('css/fullcalendar.print.css')?>" rel='stylesheet' media='print' />
    <script type="text/javascript">
    $(document).ready(function() {
      $('.alert').delay(5000).fadeOut();
    });
    </script>
</head>
<body>
    <div class="container">
      <h2>Penjadwalan Kursus & Sertifikasi PPLK</h2>
      <hr>
      <?php
      $session_id = $this->session->userdata('is_logged_in');
      if($session_id == TRUE)
      {      
        if($this->session->flashdata('index') == 1)
        {
          echo "<div class='alert alert-warning alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Perhatian!</strong> Inputan tanggal mulai dan tanggal selesai Anda tidak tepat.</div>";
        }
        else if($this->session->flashdata('index') == 2)
        {
          echo "<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Sukses!</strong> Jadwal berhasil ditambahkan.</div>";
        }
        else if($this->session->flashdata('index') == 3)
        {
          echo "<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Sukses!</strong> Jadwal berhasil diubah.</div>";
        }
        else if($this->session->flashdata('index') == 4)
        {
          echo "<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Sukses!</strong> Jadwal berhasil dihapus.</div>";
        }
      }     
  ?>
      <div class="col-md-7">
        <div id="calendar"></div>
      </div>
      <div class="col-md-5">
        <button type='button' class='btn btn-primary btn' data-toggle='modal' data-target='#ModalAdd' id="add"><span class="glyphicon glyphicon-plus"></span> Tambah Jadwal</button>
        <br><br><br><br><br>
        <p class="led"><em><b>*Untuk mengubah/menghapus/melihat data, klik pada data di kalender</b></em></p>
       </div>
   
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <?php echo form_open('event/insert') ?>  
      <form>   
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=location.reload()><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Tambah Jadwal</b></h4>
        </div>
        <div class="modal-body">   
          <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" name="title" class="form-control" id="title" placeholder="Judul" required>
          </div>
          <div class="form-group">
              <label for="pengajar">Pengajar</label>
              <input type="text" name="pengajar" class="form-control" id="pengajar" placeholder="Pengajar">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea rows="4" cols="20" name="deskripsi" class="form-control" placeholder="Deskripsi" id="deskripsi" value="" required></textarea>  
          </div> 
          <div class="form-group">
            <label for="start">Tanggal Mulai</label>
            <input type="datetime-local" name="start" class="form-control" id="start" required min="<?php echo date("Y-m-d").'T'.date("H:i", strtotime('+5 hours'))?>">
          </div>
          <div class="form-group">
            <label for="end">Tanggal Selesai</label>
            <input type="datetime-local" name="end" class="form-control" id="end" required min="<?php echo date("Y-m-d").'T'.date("H:i", strtotime('+5 hours'))?>">
          </div>  
          <div class="form-group">
              <label for="color">Warna</label>
              <select name="color" class="form-control" id="color" required>
                <option value="">-- Pilih Warna --</option>
                <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                <option style="color:#008000;" value="#008000">&#9724; Green</option>             
                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                <option style="color:#000;" value="#000">&#9724; Black</option>         
              </select>
          </div>      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick=location.reload()>Batal</button>
          <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
        </div>
      </form>
      </div>
      </div>
    </div>

    <div style="display:none;">
      <button type='button' class='btn btn-primary btn' data-toggle='modal' data-target='#ModalShow' id="show">Detail Informasi</button>
    </div>
    <div class="modal fade" id="ModalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=location.reload()><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="title" class="title"></h2>         
        </div>
        <div class="modal-body">
            <p id="pelaksanaan">Pelaksanaan </p>
            <p class="sama">:</p>
            <p id="start" class="mulai"></p>
            <p class="sampai">sampai</p>
            <p id="end" class="selesai"></p><br>
            <p id="pelaksanaan">Pengajar</p>
            <p class="sama">:</p>
            <p id="pengajar" class="ajar"></p>
            <br><br>
            <p id="pelaksanaan">Deskripsi</p>
            <p class="sama">:</p>
            <br><br>
            <p id="deskripsi" class="deskripsis"></p>
            <br><br>
        </div>
        <div class="modal-footer">
          <button type='button' class='btn btn-primary btn' data-toggle='modal' data-target='#ModalEdit' id='edit'>Ubah/Hapus Jadwal</button>
          <button type="button" class="btn btn-default" onclick=location.reload()>Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <?php echo form_open('event/update') ?> 
      <form>
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Ubah Jadwal</b></h4>
        </div>
        <div class="modal-body"> 
          <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" name="title" class="form-control" id="titleE" placeholder="Judul" required>
          </div>
          <div class="form-group">
              <label for="pengajar">Pengajar</label>
              <input type="text" name="pengajar" class="form-control" id="pengajarE" placeholder="Pengajar">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea rows="4" cols="20" name="deskripsi" class="form-control" placeholder="Deskripsi" id="deskripsiE" value="" required></textarea>  
          </div>  
          <div class="form-group">
            <label for="start">Tanggal Mulai</label>
            <div id="startE"></div>
          </div>
          <div class="form-group">
            <label for="start">Tanggal Selesai</label>
            <div id="endE"></div>
          </div>
          <div class="form-group">
              <label for="color">Warna</label>
              <select name="color" class="form-control" id="colorE" required>
                <option value="">-- Pilih Warna --</option>
                <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                <option style="color:#008000;" value="#008000">&#9724; Green</option>             
                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                <option style="color:#000;" value="#000">&#9724; Black</option>         
              </select>
          </div>  
          <input type="hidden" name="id" class="form-control" id="idE">
           <div class="form-group"> 
              <label class="text-danger"><input type="checkbox" name="delete" value="delete"> Hapus Jadwal</label>
          </div>
      </div>    
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick=location.reload()>Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

  <script src="<?php echo base_url('js/moment.min.js')?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('js/jquery.js')?>"></script>
  <script src="<?php echo base_url('js/id.js')?>"></script>
  <script src="<?php echo base_url('js/fullcalendar.min.js')?>"></script> 
  <script>
  $(document).ready(function() {   
    $('#calendar').fullCalendar({
      lang: 'id',
      buttonText: {today: 'Hari Ini', month: 'Bulanan', week: 'Mingguan', day: 'harian'},
      contentHeight: 'auto',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      eventLimit: true,
      selectable: true,
      selectHelper: true,
      eventRender: function(event, element) {
        element.attr('title', event.title);
        element.bind('click', function() {
          $('#ModalShow #id').html(event.id);
          $('#ModalShow #title').html(event.title);
          $('#ModalShow #pengajar').html(event.pengajar);
          $('#ModalShow #deskripsi').html(event.deskripsi);
          $('#ModalShow #start').html(event.start.format('DD/MM/YYYY HH:mm'));
          $('#ModalShow #end').html(event.end.format('DD/MM/YYYY HH:mm'));
          $('#ModalShow #color').html(event.color);
          $('#ModalEdit #idE').val(event.id);
          $('#ModalEdit #titleE').val(event.title);
          $('#ModalEdit #pengajarE').val(event.pengajar);
          $('#ModalEdit #deskripsiE').val(event.deskripsi);
          $('#ModalEdit #endE').val(event.end.format('DD/MM/YYYYTHH:mm'));
          $('#ModalEdit #colorE').val(event.color);
          $('#show').click();
          $.ajax({
            url : "<?php echo site_url('event/bacaStart'); ?>/"+event.id,
            success: function(data){
                $('#startE').html(data);
            }
          });
          $.ajax({
            url : "<?php echo site_url('event/bacaEnd'); ?>/"+event.id,
            success: function(data){
                $('#endE').html(data);
            }
          });
       });
      },    
      events: [
      <?php foreach($events as $event):      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          pengajar: '<?php echo $event['pengajar']; ?>',
          deskripsi: '<?php echo $event['deskripsi']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
        },
      <?php endforeach; ?>
      ]
    });
  });
</script>
</body>
</html>

