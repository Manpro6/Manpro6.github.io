$(function() {
        $('#singledatepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'YYYY-MM-DD'
            },
            startDate: <?php 
              if(isset($_GET['tanggal']) && !empty($_GET['tanggal'])) {
                echo "'".$_GET['tanggal']."'";
              } else if (!isset($_GET['tanggal'])) { 
                echo date("Y-m-d");
              }
            ?>
        });
    });

    $(function() {  
      $('input[name="daterange"]').daterangepicker(
      {
          locale: {
            format: 'YYYY-MM-DD'
          },
          startDate: <?php echo date("Y-m-d") ?>,
          endDate: <?php echo date("Y-m-d") ?>
      });
    });

    $(function() {
      $('#datepicker').daterangepicker(
      {
          locale: {
            format: 'YYYY-MM-DD'
          },
          startDate: <?php echo date("Y-m-d") ?>,
          endDate: <?php echo date("Y-m-d") ?>
      });
    });

    $(document).ready(function() {
      $('select[name=pilihProdi]').val('<?php
        if(isset($_GET['prodi'])) {
          echo $_GET['prodi'];
        } else {
          echo "Semua Program Studi";
        }
       ?>');
      $('select[name=pilihProdi]').on('change', function(){
        url = "<?php echo base_url('/lab') ?>" + "/?prodi=" + $('select[name=pilihProdi]').val() + "&tanggal=" + $('#singledatepicker').val();
        $(location).attr("href", url);
      });

      $('#singledatepicker').on('change', function(){
        url = "<?php echo base_url('/lab') ?>" + "/?prodi=" + $('select[name=pilihProdi]').val() + "&tanggal=" + $('#singledatepicker').val();
        $(location).attr("href", url);
      });

      $('.alert').delay(5000).fadeOut();
      $('.editButton').on('click', function() {
        var id = $(this).attr('data-id');
        var matkul = $(this).closest('tr').children('td.matkul').text();
        var hari = $(this).closest('tr').children('td.hari').text();
        var sesi = $(this).closest('tr').children('td.sesi').text();
        var prodi = $(this).closest('tr').children('td.prodi').text();
        var status = $(this).closest('tr').children('td.status').text();
        var tanggal_mulai = $(this).closest('tr').children('td.tanggal_mulai').text();
        var tanggal_selesai = $(this).closest('tr').children('td.tanggal_selesai').text();

        //assign to ID
        $('#id_edit').attr("value", id);
        //hari
        $( "select[name='hari_edit']").val(hari);
        //sesi
        $( "select[name='sesi_edit']").val(sesi);
        //prodi
        $( "select[name='prodi_edit']").val(prodi);
        //status
        $( "select[name='status_edit']").val(status);
        //matkul
        $( "input[name='matkul_edit']").val(matkul);

        $( "input[name='daterange_edit']").daterangepicker(
        {
          locale: {
            format: 'YYYY-MM-DD'
          },
          startDate: tanggal_mulai,
          endDate: tanggal_selesai
        });  
       });
    });