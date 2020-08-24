<br>
<div class="content">
<legend><?= __($title) ?></legend>
    <?= $this->Form->create(null,['type'=>'get']);?>

    <input type="text" class="form-control" type="submit" name= "key" id = "key"
                value="<?= $this->request->getQuery('key') ?>">
    <?= $this->Form->end();?>

    <a href="addsanpham" title="Thêm sản phẩm" class="btn btn-primary btn-lg btn-radius" style="margin-bottom: 10px;"><i
            class="fa fa-plus" aria-hidden="true"></i> Add</a>      

    <table id="employeeList" class="table table-bordered table-striped">
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
                <th colspan="2"></th>
            </tr>
            <? foreach($TProduct as $key => $item){?>
            <tr>
                <td><?= $item->id?></td>
                <td><?= $item->name?></td>
                <td><?= $item->price?></td>
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
                <td><a href="editsanpham/<?= $item->id?>" class="btn btn-warning  btn-lg btn-radius"><i
                            class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                <td><?= $this->Form->postLink(
                __('Delete'),
                "admin/delsanpham/$item->id",
                ['confirm' => __('Bạn có chắc chăn muốn xóa "{0}" không?', $item->name), 'class' => 'btn btn-danger btn-lg btn-radius']
            ) ?></td>
            </tr>
            <? }?>
        </thead>
    </table>
    <?= $this->element('paginate');?>
</div>