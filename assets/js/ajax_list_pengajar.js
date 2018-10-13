$(document).ready(function () {

    $("#instansi").change(function () { // Ketika tombol option di klik

        $.ajax({
            url: 'search_list_pengajar.php',
            type: 'POST',
            data: {instansi: $("#instansi").val()}, // Set data yang akan dikirim
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) { // Ketika proses pengiriman berhasil
                $("#view").html(response.hasil);
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText);
            }
        });
    });
});