<?php foreach ($data as $key => $item) { ?>
    <div class="col-2-ct">
        <div class="pd-box pd-box-category">
            <div class="box-images">
                <a href=<?= URL_CHITIET_SANPHAM . $item->slug ?> title="<?= $item->slug ?>">
                    <?= $this->Html->image(isset($item->img) ? $item->img : "/img/noproduct.png", ['class' => 'img-reponsive lazy']); ?>
                </a>
            </div>
            <div class="box-content">
                <h3>
                    <?= $this->Html->link(
                        $item->name,
                        URL_CHITIET_SANPHAM . $item->slug
                    ); ?>
                </h3>
                <div>
                    <?php if ($item->discount == 0) { ?>
                        <span class="price "><?= number_format($item->price, 0, '.', ',') ?>đ</span>
                        <span class="price-drop"></span>
                    <?php } else { ?>
                        <span class="price "><?= number_format(($item->price - $item->discount), 0, '.', ',') ?>đ</span>
                        <span class="price-drop"><?= number_format($item->price, 0, '.', ',') ?>đ</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>