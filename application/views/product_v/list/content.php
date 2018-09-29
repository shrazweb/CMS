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
                        <th>#id</th>
                        <th>url</th>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th>Durumu</th>
                        <th>İşlemler</th>
                    </thead>
                    <tbody>
                  <?php foreach($items as $item) {;?>

                      <tr>
                          <td><?php echo $item->id ;?></td>
                          <td><?php echo $item->url ;?></td>
                          <td><?php echo $item->title ;?></td>
                          <td><?php echo $item->description ;?></td>
                          <td>

                              <input

                                      type="checkbox"
                                      data-switchery="true"
                                      data-color="#10c469"
                                     <!-- verinin aktif olup olmadığını kontrol eder -->
                                      <?php echo ($item->isActive) ? "checked" : "" ;?>
                              >

                          </td>
                          <td>
                              <a href="#" class="btn btn-sm btn-danger btn-outline"><i class="fa fa-trash"></i> Sil</a>
                              <a href="#" class="btn btn-sm btn-info btn-outline"><i class="fa fa-edit"></i> Düzenle</a>
                          </td>
                      </tr>

                  <?php } ;?>

                    </tbody>
                </table>
            <?php } ;?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>



