
$(document).ready(function () {

    /* Tabloda sıralama işlemi yapıyoruz */
    $(".sortable").sortable();

    /* sweetAlert işlemini yapıyoruz. */
    $(".remove-btn").click(function () {

        // sil butonundan gelen data url yi okuyan metod
        // data kelimesi button dan gelen içinde data geçen atribute leri buluyor ve alıyor
        // data("url") data-url dediğimiz yeri okuyor
        // button içinde data-url değil de data-key deseydik data("key") yazardık
        var $data_url = $(this).data("url");

        swal({
            title: 'Kayıt Silinecek ?',
            text: "İşlem geri alınamaz !",
            type: 'danger',
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
    })

    });
   });

    /* isActive işlemini yapıyoruz // Kayıt etkin mi değil mi? */
    $(".isActive").change(function () {

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
            // jquery nin post işlemini kullanıyoruz ki içine 3 parametre alır.
            // 1.si url 2.si bilgi yani input name i 3.sü fonksiyon
            $.post($data_url, {data : $data}, function(response) {

            });
        }

    });

    // Sıralama yapılıyor
    $(".sortable").on("sortupdate",function(event,ui) {

        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");
        $.post($data_url, {data: $data}, function(response) {
        })

    });


