
<html dir="ltr" lang="en">
<head>
  <title>Contoh Penggunaan Request API Wilayah menggunakan ajax</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127341144-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127341144-1');
</script>

</head>
<body >
<br><br><br><br>
 <div class="container">
  <div class="row">

  <div class="col-sm-6">
   <div class="form-group">
     <label for="form_sex">Provinsi <small>*</small></label>
      <select class="form-control m-b" name="provinsi" id="propinsi">
        <option selected value="">-- Pilih Provinsi --</option>
     </select>
    </select>
   </div>
  </div>
  <div class="col-sm-6">
   <div class="form-group">
     <label for="form_post">Kab / Kota <small>*</small></label>
            <select class="form-control m-b" name="kabupaten" id="kabupaten">
           <option selected value="">-- Pilih Kabupaten --</option>
       </select>
    </div>
  </div>
  </div>
  <div class="row">
  <div class="col-sm-6">
   <div class="form-group">
     <label for="form_sex">Kecamatan <small>*</small></label>
        <select class="form-control m-b" name="kecamatan" id="kecamatan">
       <option selected value="">-- Pilih Kecamatan --</option>
     </select>
      </div>
  </div>
  <div class="col-sm-6">
   <div class="form-group">
     <label for="form_post">Kelurahan / Desa <small>*</small></label>
      <select class="form-control m-b" name="kelurahan" id="kelurahan">
       <option selected value="">-- Pilih Kelurahan --</option>
     </select>
     </div>
  </div>
  </div>
</div>
  <!-- external javascripts -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




<script type = "text/javascript" >
      var return_first = function() {
          var tmp = null;
          $.ajax({
              'async': false,
              'type': "get",
              'global': false,
              'dataType': 'json',
              'url': 'https://x.rajaapi.com/poe',
              'success': function(data) {
                  tmp = data.token;
              }
          });
          return tmp;
      }();
  $(document).ready(function() {
      $.ajax({
          url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
          type: 'GET',
          dataType: 'json',
          success: function(json) {
              if (json.code == 200) {
                  for (i = 0; i < Object.keys(json.data).length; i++) {
                      $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                  }
              } else {
                  $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
              }
          }
      });
      $("#propinsi").change(function() {
          var propinsi = $("#propinsi").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
              data: "idpropinsi=" + propinsi,
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                  $("#kabupaten").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                      $('#kecamatan').html($('<option>').text('-- Pilih Kecamatan --').attr('value', '-- Pilih Kecamatan --'));
                      $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));

                  } else {
                      $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
      });
      $("#kabupaten").change(function() {
          var kabupaten = $("#kabupaten").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kecamatan',
              data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi,
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                  $("#kecamatan").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kecamatan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                      $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));
                      
                  } else {
                      $('#kecamatan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
      });
      $("#kecamatan").change(function() {
          var kecamatan = $("#kecamatan").val();
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kelurahan',
              data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi + "&idkecamatan=" + kecamatan,
              type: 'GET',
              dataType: 'json',
              cache: false,
              success: function(json) {
                  $("#kelurahan").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kelurahan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                  } else {
                      $('#kelurahan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
      });
  });
</script>

</body>
</html>

