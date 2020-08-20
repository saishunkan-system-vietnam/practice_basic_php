<br>
<div class="content">
    <?= $this->Form->create(null, ['type' => 'get']); ?>
    <?= $this->Form->end(); ?>

    <table id="employeeList" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền đơn hàng</th>
                <th>Đơn vị vận chuyển</th>
                <th>Loại thanh toán</th>
                <th>Trạng thái</th>
                <th colspan="3"></th>
            </tr>
            <? foreach($tableOrder as $key => $item){?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->odr_date ?></td>
                <td style="text-align: right ;"><?= $this->Number->format($item->total_paymnt, ['locale' => '']); ?></td>
                <td><?= $item->shipping_unit ?></td>
                <td><?= $item->paymnt_method ?></td>
                <td><?= $item->status ?></td>
                <td><a href="<?= URL_IMG . $item->id ?>" class="btn btn-info  btn-lg btn-radius"><i class="fa fa-file-image-o" aria-hidden="true"></i> View</a></td>
            </tr>
            <? }?>
        </thead>
    </table>
</div>