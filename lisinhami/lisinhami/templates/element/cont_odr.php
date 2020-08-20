<div class="content">
    <div class="row"><b>Trạng thái đơn hàng: </b>
    <span 
    class = "<?= $dataOdrH->status_cd == '0' ? "badge btn-danger" : ($dataOdrH->status_cd == '6' ? "badge btn-success" : "badge btn-primary")?>"
    
    ><?= $dataOdrH->status?></span></div>
    <div class="row"><b>Tài khoản mua hàng: </b><span><?= $dataOdrH->id_user?></span></div>
    <div class="row"><b>Ngày mua hàng:</b><span><?= $dataOdrH->odr_date->format('d-m-Y')?></span></div>
    <div class="row"><b>Hình thức thanh toán: </b><span><?= $dataOdrH->paymnt_method?></span></div>
    <div class="row"><b>Đơn vị vận chuyển: </b><span><?= $dataOdrH->shipping_unit?></span></div>
    <br>
    <div class="row">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sản phẩm</th>
                <th>Số lượng</th>
                <th>ĐƠn giá</th>
                <th>Thuế</th>
                <th>Thành tiền</th>
            </tr>            
            <? foreach($dataOdrD as $key => $item)
            { $stt++;?>
            <tr>
                <td><?= $stt?></td>
                <td><?= $item->name?></td>
                <td style="text-align: right ;"><?=  $this->Number->format($item->amount, ['locale' => '']); ?></td>
                <td style="text-align: right ;"><?=  $this->Number->format($item->price, ['locale' => '']); ?></td>
                <td style="text-align: right ;"><?=  $this->Number->format($item->tax, ['locale' => '']); ?></td>
                <td style="text-align: right ;"><?=  $this->Number->format($item->paymnt, ['locale' => '']); ?></td>
            </tr>
            <? }?>
        </thead>
    </table>
    </div>
    <div class="row"><b>Tổng: </b><span><?= $this->Number->format( $dataOdrH->paymnt, ['locale' => '']); ?></span></div>
    <div class="row"><b>Phí vận chuyển: </b><span><?= $this->Number->format( $dataOdrH->fee, ['locale' => '']); ?></span></div>
    <div class="row"><b>Tổng tiền đơn hàng: </b><span><?= $this->Number->format( $dataOdrH->total_paymnt, ['locale' => '']); ?></span></div>
    <br>
    <div style="width: 90%;">
    <a href=<?= $refererUrl?> title="Trở về" style="font-size: 40px;">
            <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
</div>

<style>
    span{
        text-indent: 5px;
    }
</style>