
<?php foreach ($data as $key => $item) { ?>
    <div class="col-2-ct">
        <div class="pd-box pd-box-category">
            <div class="box-images">
                <?= $this->Html->image(isset($item->t_image['img_url'])?$item->t_image['img_url']:"/img/noproduct.png", array(
                    "class" => "img-reponsive lazy ",
                    'title' => $item->name,
                    'url' => array('controller' => 'Pages', 'action' => 'detailProduct', $item->slug)
                )); ?>
            </div>
            <div class="box-content">
                <h3>
                    <?= $this->Html->link(
                        $item->name,
                        '/pages/detailProduct/' . $item->slug
                    ); ?>
                </h3>
                <div>
                    <?php if ($item->discount == 0) { ?>
                        <span class="price "><?= number_format($item->price / 10, 0, '.', ',') ?>đ</span>
                        <span class="price-drop"></span>
                    <?php } else { ?>
                        <span class="price "><?= number_format($item->price - $item->discount / 10, 0, '.', ',') ?>đ</span>
                        <span class="price-drop"><?= number_format($item->discount / 10, 0, '.', ',') ?>đ</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>