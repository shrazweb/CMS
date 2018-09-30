
$(document).ready(function () {

    $(".remove-btn").click(function () {

        // sil butonundan gelen data url yi okuyan metod
        // data kelimesi button dan gelen içinde data geçen atribute leri buluyor ve alıyor
        // data("url") data-url dediğimiz yeri okuyor
        // button içinde data-url değil de data-key deseydik data("key") yazardık
        var $data_url = $(this).data("url");

        swal({
            title: 'Kayıt Silinecek ?',
            text: "İşlem geri alınamaz !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: 'Hayır'
        }).then(function(result){
            if (result.value) {
            // sayfayı değişkenimizle yenile
                window.location.href = $data_url;

                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Kayıt Silindi',
                    showConfirmButton: true,
                    timer: 15000
                });

        }
    });
        setTimeout(doit, 5000);
    });
   });

