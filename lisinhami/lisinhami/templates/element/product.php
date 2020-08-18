<?php

use function PHPSTORM_META\type;
?>
<div class="content">
    <?= $this->Form->create() ?>
    <legend><?= __($title) ?></legend>
    <div class="row">
        <div class="col-md-8">
            <p class="text-warning">Sản phẩm</p>
            <input type="text" class="form-control" name="name" id="name"
                value="<?= isset($data["name"]) ? $data["name"] : null ?>">
        </div>

        <div class="col-md-3">
            <p class="text-warning">Loại sản phẩm</p>
            <select name="category_cd" id="category_cd" class="form-control">
                <option value="1" <?= (isset($data["category_cd"]) ? $data["category_cd"] : null) == '1' ? 'selected' : ''?>>Mỹ
                    phẩm</option>
                <option value="2" <?= (isset($data["category_cd"]) ? $data["category_cd"] : null) == '2' ? 'selected' : ''?>>
                    Sample</option>
                <option value="3" <?= (!empty($data["category_cd"]) ? $data["category_cd"] : null) == '3' ? 'selected' : ''?>>
                    Point</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p class="text-warning">Giá bán</p>
            <input type="text" class="form-control" name="price" id="price"
                value="<?= isset($data["price"]) ? $data["price"] : null?>">
        </div>
        <div class="col-md-4">
            <p class="text-warning">Giảm giá</p>
            <input type="text" class="form-control" name="discount" id="discount"
                value="<?= isset($data["discount"]) ? $data["discount"] : null?>">
        </div>
        <div class="col-md-1">
            <p class="text-warning">Thuế %</p>
            <input type="text" class="form-control" name="tax" id="tax"
                value="<?= isset($data["tax"]) ? $data["tax"] : null?>">
        </div>
        <div class="col-md-2">
            <p class="text-warning">Số point thưởng</p>
            <input type="text" class="form-control" name="point" id="point"
                value="<?= isset($data["point"]) ? $data["point"] : null?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p class="text-warning">Xuất xứ</p>
            <input type="text" class="form-control" name="made_in" id="made_in"
                value="<?= isset($data["made_in"]) ? $data["made_in"] : null?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            <p class="text-warning">Thông tin chung</p>
            <input type="text" class="form-control" name="info_gen" id="info_gen"
                value="<?= isset($data["info_gen"]) ? $data["info_gen"] : null?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            <p class="text-warning">Thông tin chi tiết</p>
            <input type="text" class="form-control" name="info_dtl" id="info_dtl"
                value="<?= isset($data["info_dtl"]) ? $data["info_dtl"] : null?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            <p class="text-warning">Link thân thiện</p>
            <input type="text" class="form-control" name="slug" id="slug"
                value="<?= isset($data["slug"]) ? $data["slug"] : null?>">
        </div>
    </div>

    <?= $this->Form->control('refererUrl',['type'=>'hidden','value'=> $data['refererUrl']]);?>

    <div style="width: 90%;">
    <a href=<?= $data["refererUrl"]?> title="Trở về" style="font-size: 40px;">
            <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <button  class= "btn btn-success  btn-lg btn-radius" style="float: right;">Lưu</button>
    </div>
    <?= $this->Form->end()?>
</div>