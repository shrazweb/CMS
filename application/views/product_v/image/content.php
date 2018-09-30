<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("product/image_upload"); ?>" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/image_upload"); ?>'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">Yüklemek istediğiniz resimleri buraya sürükleyiniz</h3>
                        <p class="m-b-lg text-muted">(Yüklemek için dosyalarınızı sürükleyiniz yada buraya tıklayınız)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="widget p-lg">

                <h4><b><?php echo $item->title; ?></b> kaydına ait resimler</h4>


            <div class="widget-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <th>id</th>
                    <th>Görsel</th>
                    <th>Resim Adı</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="w100 text-center">id</td>
                        <td class="w150 text-center"><img width="150" src="http://www.shrazweb.com/wp-content/uploads/2016/11/kartvizit-r.png" alt="" class="img responsive"></td>
                        <td>Resim Adı</td>
                        <td class="w100 text-center">
                            <input
                                    data-url="<?php echo base_url("product/isActiveSetter/"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"

                                <?php echo (true) ? "checked" : "" ;?>
                            >
                        </td>
                        <td class="w100 text-center"><button data-url="<?php echo base_url("product/delete/"); ?>" class="btn btn-sm btn-danger btn-outline btn-block remove-btn"><i class="fa fa-trash"></i> Sil</button></td>
                    </tr>

                    </tbody>
                </table>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
        </div>


</div>



