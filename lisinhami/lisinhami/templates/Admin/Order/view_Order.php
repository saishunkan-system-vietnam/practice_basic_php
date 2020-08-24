<br>
<div class="btn-group btn-group-lg" >
    <a href=<?= URL_DONHANG.'toan-bo'?> class="btn <?= $status == 99 ? 'btn-dark' : 'btn-primary'?>">Toàn bộ</a>  
    <a href=<?= URL_DONHANG.'cho-xac-nhan'?> class="btn <?= $status == 1 ? 'btn-dark' : 'btn-primary'?>">Chờ xác nhận</a>
    <a href=<?= URL_DONHANG.'xac-nhan'?> class="btn <?= $status == 2 ? 'btn-dark' : 'btn-primary'?>">Xác nhận</a>
    <a href=<?= URL_DONHANG.'xuat-hang'?> class="btn <?= $status == 3 ? 'btn-dark' : 'btn-primary'?>">Xuất hàng</a>
    <a href=<?= URL_DONHANG.'van-chuyen'?> class="btn <?= $status == 4 ? 'btn-dark' : 'btn-primary'?>">Vận chuyển</a>
    <a href=<?= URL_DONHANG.'giao-hang'?> class="btn <?= $status == 5 ? 'btn-dark' : 'btn-primary'?>">Giao hàng</a>
    <a href=<?= URL_DONHANG.'hoan-thanh'?> class="btn <?= $status == 6 ? 'btn-dark' : 'btn-primary'?>">Hoàn thành</a>
    <a href=<?= URL_DONHANG.'da-huy'?> class="btn <?= $status == 0 ? 'btn-dark' : 'btn-primary'?>">Đã hủy</a>
  </div>
<div class="content">
<legend><?= __($title) ?></legend>
    <?= $this->Form->create(null,['type'=>'get']);?>
    <select name="odr_flg" id="odr_flg" style="margin-bottom: 5px;">
        <option value="1" <?= $this->request->getQuery('odr_flg') == "1" ? "selected" : ""?>>Mỹ phẩm</option>
        <option value="2" <?= $this->request->getQuery('odr_flg') == "2" ? "selected" : ""?>>Dùng thử</option>
    </select>
     <div class="input-group w-100"> <input type="text" class="form-control search-form" name="key" id="key" value = "<?= $this->request->getQuery('key')?>" placeholder="Search">
     <div class="input-group-append"> <button class="btn btn-primary search-button" type="submit"> <i class="fa fa-search"></i> </button> </div></div>
    <?= $this->Form->end();?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người đặt hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền đơn hàng</th>
                <th>Đơn vị vận chuyển</th>
                <th>Loại thanh toán</th>
                <th>Trạng thái</th>
                <th colspan="4"></th>
            </tr>
            <? foreach($tableOrd as $key => $item){?>
            <tr>
                <td><?= $item->id?></td>
                <td><?= $item->id_user?></td>
                <td><?= $item->odr_date->format('d-m-Y')?></td>
                <td style="text-align: right ;"><?=  $this->Number->format($item->total_paymnt, ['locale' => '']); ?></td>
                <td><?= $item->shipping_unit?></td>
                <td><?= $item->paymnt_method?></td>
                <td><?= $item->status?></td>
                
                <td><a href= "<?= URL_CONTENT_ODR.$item->id?>" class="btn btn-info  btn-lg btn-radius"><i
                            class="fa fa-file-image-o" aria-hidden="true"></i> View</a></td>
                <td><?= $this->Form->postLink(
                __('Xử lý'),
                URL_PROC_ODR.$item->id.'/'.$item->status_cd,
                ['confirm' => __('Bạn có chắc chắn muốn xử lý thực hiện thay đổi trạng thái cho đơn hàng "{0}" không?', $item->id),
                'class' => $item->status_cd > 4 || $item->status_cd > 5 || $item->status_cd == 0  ? 'btn btn-warning btn-lg btn-radius disabled' : 'btn btn-warning btn-lg btn-radius',
                ]
                ) ?></td>
                <td><?= $this->Form->postLink(
                __('Hoàn thành'),
                URL_PROC_ODR.$item->id.'/'.'6'.'/'.$item->id_user.'/'.$item->odr_flg,
                ['confirm' => __('Bạn có chắc chắn muốn xử lý hoàn thành cho đơn hàng "{0}" không?', $item->id),
                'class' => $item->status_cd > 5 || $item->status_cd == 0 ? 'btn btn-success btn-lg btn-radius disabled' : 'btn btn-success btn-lg btn-radius'
                ]
                ) ?></td>
                <td><?= $this->Form->postLink(
                __('Hủy'),
                URL_PROC_ODR.$item->id.'/'.'0',
                ['confirm' => __('Bạn có chắc chắn muốn hủy đơn hàng "{0}" không?', $item->id), 
                'class' => $item->status_cd > 5 || $item->status_cd == 0 ? 'btn btn-danger btn-lg btn-radius disabled':  'btn btn-danger btn-lg btn-radius']
            ) ?></td>
            </tr>
            <? }?>
        </thead>
    </table>
    <?= $this->element('paginate');?>
</div>