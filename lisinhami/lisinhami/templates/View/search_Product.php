<?= $this->Html->css(['home']) ?>
<div class="container">
    <div class="back-gray pad-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-products-category">
                        <div class="head-box-category">
                            <div class="clr"></div>
                        </div>
                        <div class="body-box-category">
                            <?= $this->element('cards', ['data' => $tableProduct]); ?>
                            <div class="clr"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->element('paginate'); ?>
</div>