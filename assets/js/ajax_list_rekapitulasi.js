$(document).ready(function(){
  $("#tahun").change(function(){ // Ketika tombol option di klik
    
    $.ajax({
      url: 'K_search_list_rekapitulasi.php',
      type: 'POST',
      data: {tahun: $("#tahun").val(), semester: $("#semester").val(), instansi: $("#instansi").val()}, // Set data yang akan dikirim
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
        $("#view").html(response.hasil);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText);
      }
    });
  });

  $("#semester").change(function(){ // Ketika tombol option di klik
    
    $.ajax({
      url: 'K_search_list_rekapitulasi.php',
      type: 'POST',
      data: {tahun: $("#tahun").val(), semester: $("#semester").val(), instansi: $("#instansi").val()}, // Set data yang akan dikirim
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
        $("#view").html(response.hasil);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText);
      }
    });
  });

  $("#instansi").change(function(){ // Ketika tombol option di klik
    
    $.ajax({
      url: 'K_search_list_rekapitulasi.php',
      type: 'POST',
      data: {tahun: $("#tahun").val(), semester: $("#semester").val(), instansi: $("#instansi").val()}, // Set data yang akan dikirim
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
        $("#view").html(response.hasil);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText);
      }
    });
  });
});