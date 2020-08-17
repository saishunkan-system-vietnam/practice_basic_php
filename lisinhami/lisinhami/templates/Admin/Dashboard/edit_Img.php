<br>
<div class="content">
<legend><?= __($title) ?></legend>
    <?= $this->Form->create(null,['type'=>'file']);?>

    <div class="row"><label class="btn btn-success  btn-lg btn-radius">
                    <input type="file" id="inpimg" name="image_file" onchange="this.form.submit()" style="display: none;" accept=".png, .jpeg" onchange="preview()">
                    <i class="fa fa-plus" aria-hidden="true"></i> <span>Add</span>
                </label>    </div> 
    <?= $this->Form->end();?>
    <table id="employeeList" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th  style="width: 5%;">ID</th>
                <th style="width: 10%;">Hình ảnh</th>
                <th >Url</th>
                <th colspan="2" style="width: 10%;"></th>
            </tr>
            <? foreach($lstImg as $key => $item){?>
            <tr>
                <td><?= $item->id?></td>
                <td ><?= $this->html->image($item->img_url,['width'=>'100%']);?></td>
                <td ><?= WWW_ROOT.'img'.DS.$item->img_url?></td>
                <!-- <td><a href="./editsanpham/" title="Xóa sản phẩm" class="btn btn-danger btn-lg btn-radius"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td> -->
                
                <td><a href= "<?= URL_EDIT_SANPHAM.$item->id?>" class="btn btn-warning  btn-lg btn-radius"><i
                            class="fa fa-pencil" aria-hidden="true"></i> Set Top</a></td>
                <td><?= $this->Form->postLink(
                __('Delete'),
                URL_DEL_IMG.$item->id,
                ['confirm' => __('Bạn có chắc chăn muốn xóa ảnh không?'), 'class' => 'btn btn-danger btn-lg btn-radius']
            ) ?></td>
            </tr>
            <? }?>
        </thead>
    </table>
</div>
<style>
    
</style>