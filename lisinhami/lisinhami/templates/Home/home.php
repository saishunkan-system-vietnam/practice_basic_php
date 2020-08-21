<?= $this->Html->css(['home']) ?>
<?= $this->fetch('css') ?>

<div class="container">
    <div class="back-gray pad-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-products-category">
                        <div class="head-box-category">
                            <a href="<?=URL_DANHMUC_SANPHAM?>" class="left-head">
                                <img src="https://adminbeauty.hvnet.vn/images/sh11-128.png?v=17042020" alt="type icon">
                                <h2>
                                    Mỹ Phẩm
                                </h2>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                            <div class="clr"></div>
                        </div>
                        <div class="body-box-category">
                            <?= $this->element('cards', ["data" => isset($cosmetic) ? $cosmetic : null]); ?>
                            <div class="clr"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
