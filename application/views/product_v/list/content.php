<div class="row">
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if(empty($items)){?>
            <div class="alert alert-danger text-center text">
                <p>Henüz ürün eklemediniz. Hemen yeni bir tane ekleyin.. <a href="<?php echo base_url("product/add"); ?>" class="fa fa-plus btn btn-danger btn-sm"> Ürün Ekle</a></p>
            </div>
            <?php } else { ?>
            <h4 class="m-b-lg">Ürün Listesi
                <a href="<?php echo base_url("product/add"); ?>" class="btn btn-success pull-right"><i class="fa fa-plus"> Yeni Ekle</i></a>
            </h4>
                <table class="table table-striped table-hover">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>#id</th>
                        <th>Başlık</th>
                        <th>url</th>
                        <th>Açıklama</th>
                        <th>Durumu</th>
                        <th class="w100 text-center">İşlemler</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("product/rankSetter"); ?>">
                  <?php foreach($items as $item) {;?>
                      <tr id="ord-<?php echo $item->id; ?>">
                          <td><i class="fa fa-reorder"></i></td>
                          <td><?php echo $item->id ;?></td>
                          <td><?php echo $item->title ;?></td>
                          <td><?php echo $item->url ;?></td>
                          <td><?php echo $item->description ;?></td>
                          <td>

                              <input
                                      data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                      class="isActive"
                                      type="checkbox"
                                      data-switchery
                                      data-color="#10c469"

                                      <?php echo ($item->isActive) ? "checked" : "" ;?>
                              >

                          </td>
                          <td class="text-center">
                              <button data-url="<?php echo base_url("product/delete/$item->id"); ?>" class="btn btn-sm btn-danger btn-outline remove-btn"><i class="fa fa-trash"></i> Sil</button>
                              <a href="<?php echo base_url("product/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-edit"></i> Düzenle</a>
                              <a href="<?php echo base_url("product/image_form/$item->id"); ?>" class="btn btn-sm btn-default"><i class="fa fa-image"></i> Resimler</a>
                          </td>
                      </tr>
                  <?php } ;?>

                    </tbody>
                </table>
            <?php } ;?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>



