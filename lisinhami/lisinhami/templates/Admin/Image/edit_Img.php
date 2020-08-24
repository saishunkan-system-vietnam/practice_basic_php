<br>
<div class="content">
    <legend><?= __($title) ?></legend>
    <?= $this->Form->create(null,['type'=>'file']);?>

    <div class="row"><label class="btn btn-success  btn-lg btn-radius">
            <input type="file" id="inpimg" name="image_file" onchange="this.form.submit()" style="display: none;"
                accept=".png, .jpeg, .jpg" onchange="preview()">
            <i class="fa fa-plus" aria-hidden="true"></i> <span>Add</span>
        </label> </div>
    <?= $this->Form->end();?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 10%;">Hình ảnh</th>
                <th>Url</th>
                <th colspan="3" style="width: 10%;"></th>
            </tr>
            <? foreach($lstImg as $key => $item){?>
            <tr>
                <td><?= $item->id?></td>
                
                <td><?= $this->Html->image(isset($item->img_url) ? $item->img_url : "/img/noproduct.png",['class'=> 'img-reponsive lazy']); ?></td>
                <td><?= WWW_ROOT.'img'.DS.$item->img_url?></td>
                <td><?= $item->top_flg == 1 ? $this->Html->image("/img/top.png",['alt'=>'TOP']) :''?></td>
                <td><?= $this->Form->postLink(
                __('Set top'),
                URL_SETTOP_IMG.$item->id.'/'.$id_prd,
                ['confirm' => __('Bạn có chắc chăn muốn chọn ảnh này làm ảnh mặc định không?'), 'class' => 'btn btn-warning btn-lg btn-radius']
            ) ?></td>

                <td><?= $this->Form->postLink(
                __('Delete'),
                URL_DEL_IMG.$item->id,
                ['confirm' => __('Bạn có chắc chăn muốn xóa ảnh không?'), 'class' => 'btn btn-danger btn-lg btn-radius']
            ) ?></td>
            </tr>
            <? }?>
        </thead>
    </table>
    <a href=<?= URL_SANPHAM?> title="Trở về" style="font-size: 40px;">
        <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
<style>

</style>