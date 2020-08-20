<br>
<div class="btn-group btn-group-lg" >
    <a href=<?= URL_SANPHAM.'my-pham'?> class="btn <?= $category_cd == 1 ? 'btn-dark' : 'btn-primary'?>">Mỹ phẩm</a>  
    <a href=<?= URL_SANPHAM.'dung-thu'?> class="btn <?= $category_cd == 2 ? 'btn-dark' : 'btn-primary'?>">Dùng thử</a>
    <a href=<?= URL_SANPHAM.'qua-tang'?> class="btn <?= $category_cd == 3 ? 'btn-dark' : 'btn-primary'?>">Quà tặng</a>
  </div>
<div class="content">
<legend><?= __($title) ?></legend>
    <?= $this->Form->create(null,['type'=>'get']);?>
    <div class="input-group w-100"> <input type="text" class="form-control search-form" name="key" id="key" value = "<?= $this->request->getQuery('key');?>" style="width:55%;" placeholder="Search">
     <div class="input-group-append"> <button class="btn btn-primary search-button" type="submit"> <i class="fa fa-search"></i> </button> </div></div>
    <?= $this->Form->end();?>

    <a href=<?= URL_ADD_SANPHAM?> title="Thêm sản phẩm" class="btn btn-primary btn-lg btn-radius" style="margin-bottom: 10px;"><i
            class="fa fa-plus" aria-hidden="true"></i> Add</a>      

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá bán</th>
                <th>Giảm giá</th>
                <th>Thuế %</th>
                <th>Point</th>
                <th>Xuất xứ</th>
                <th>Thông tin chung</th>
                <!-- <th>Info Dtl</th>
                <th>Slug</th> -->
                <th colspan="3"></th>
            </tr>
            <? foreach($tableProduct as $key => $item){?>
            <tr>
                <td><?= $item->id?></td>
                <td><?= $item->name?></td>
                <td><?= $item->odr_date?></td>
                <td><?= $item->discount?></td>
                <td><?= $item->tax?></td>
                <td><?= $item->point?></td>
                <td><?= $item->made_in?></td>
                <td><?= $item->info_gen?></td>
                <!-- <td><?= $item->info_dtl?></td> -->
                <!-- <td><?= $item->slug?></td> -->
                <!-- <td><?= ''
                // $this->Html->link('<span class="fa fa-pencil"> Edit</span>'
                //                         , 'admin/editsanpham/'.$item->id, ['escape' => false, 'title' => __('Edit Sản phẩm'),'class'=>'btn btn-warning  btn-lg btn-radius']) 
                ?></td> -->

                <!-- <td><a href="./editsanpham/" title="Xóa sản phẩm" class="btn btn-danger btn-lg btn-radius"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td> -->
                <td><a href= "<?= URL_IMG.$item->id?>" class="btn btn-info  btn-lg btn-radius"><i
                            class="fa fa-file-image-o" aria-hidden="true"></i> IMG</a></td>
                <td><a href= "<?= URL_EDIT_SANPHAM.$item->id?>" class="btn btn-warning  btn-lg btn-radius"><i
                            class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                <td><?= $this->Form->postLink(
                __('Delete'),
                URL_DEL_SANPHAM.$item->id,
                ['confirm' => __('Bạn có chắc chăn muốn xóa "{0}" không?', $item->name), 'class' => 'btn btn-danger btn-lg btn-radius']
            ) ?></td>
            </tr>
            <? }?>
        </thead>
    </table>
    <?= $this->element('paginate');?>
</div>