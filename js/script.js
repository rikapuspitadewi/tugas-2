// $ = jQuery => ambil dokumen
$(document).ready(function() {

    // hilangkan tombol cari
    $('#tombol-search').hide();

    // event ketika keyword ditulis
    // jQuery => elemen keyword ketika di keyup lakukan fungsi berikut
    $('#keyword').on('keyup', function(){
        // munculkan icon loading
        $('.loader').show();

        // ajax menggunakan load
        // elemen container => ubah isi dengan data dari sumber
        // $('#container').load('ajax/mahasiswa.php?keyword='+$('#keyword').val());

        // $.get()
        $.get('ajax/mahasiswa.php?keyword='+$('#keyword').val(), function(data) {

            $('#container').html(data);
            $('.loader').hide();

        })
    });

});