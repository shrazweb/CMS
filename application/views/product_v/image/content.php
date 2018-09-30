<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">Drop files here or click to upload.</h3>
                        <p class="m-b-lg text-muted">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>

    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
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
                        <td class="w100 text-center"><img width="100" src="http://www.shrazweb.com/wp-content/uploads/2016/11/kartvizit-r.png" alt="" class="img responsive"></td>
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



