<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("product/image_upload/$item->id"); ?>" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/image_upload/$item->id"); ?>'}">
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
                <div class="container-fluid"><b class="alert alert-warning"><i class="fa fa-camera"></i>  <?php echo $item->title; ?></b><a class="btn btn-info btn-md pull-right" href="<?php echo base_url("product"); ?>">Kapat</a>
                </div>
            <div class="widget-body">
                <?php if(empty($item_images)){?>
                    <div class="alert alert-danger text-center text">
                        <p>Henüz resim yüklenmedi.</p>
                    </div>
                <?php } else { ?>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <th class="w100 text-center">id</th>
                    <th class="w150 text-center">Görsel</th>
                    <th>Resim Adı</th>
                    <th class="w100 text-center">Durumu</th>
                    <th class="w100 text-center">İşlem</th>
                    </thead>
                    <tbody>
                    <?php foreach ($item_images as $image) {;?>
                    <tr>
                        <td class="w100 text-center"><?php echo $image->id; ?></td>
                        <td class="w150 text-center">
                            <img width="150" src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url");?>" alt="<?php echo base_url("uploads/{$viewFolder}/$image->img_url");?>" class="img responsive"></td>
                        <td><?php echo $image->img_url; ?></td>
                        <td class="w100 text-center">
                            <input
                                    data-url="<?php echo base_url("product/isActiveSetter/"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"

                                <?php echo ($image->id) ? "checked" : "" ;?>
                            >
                        </td>
                        <td class="w100 text-center"><button data-url="<?php echo base_url("product/delete/"); ?>" class="btn btn-sm btn-danger btn-outline btn-block remove-btn"><i class="fa fa-trash"></i> Sil</button></td>
                    </tr>
                    <?php }; ?>
                    </tbody>
                </table>
                <?php }; ?>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
        </div>


</div>



