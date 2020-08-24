<?= $this->Html->css(['cart', 'home']) ?>
<?= $this->Html->script(['cart']) ?>
<?= $this->fetch('css') ?>

<div class="main-shopping">
    <div class="cart_info">
        <p><?php if (!empty($data)) {
                echo "Thông tin chi tiết giỏ hàng!";
            } else {
                echo "Hiện tại bạn chưa có sản phẩm nào!";
            } ?></p>
    </div>
    <div class="cart_listProduct">

        <div class="row">

            <div class="col-sm-8" style="margin-top: 17px">
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width: 50%;">Product</th>
                            <th style="width: 10%;">Price</th>
                            <th style="width: 8%;">Quantity</th>
                            <th style="width: 22%;" class="text-center">Subtotal</th>
                            <th style="width: 22%;" class="text-center">Earn point</th>
                            <th style="width: 10%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $point = 0;
                        $earn_point = 0;
                        if (!empty($data)) {
                            foreach ($data as $key => $item) {
                                $price =  $item['price'] + ($item['price'] * $item['tax']) / 100;
                                $total = $total + ($item['category_cd'] == '1' ? ($item['amount'] * $price) : 0);
                                $point = $point + ($item['category_cd'] == '3' ? ($item['amount'] * $item['price']) : 0);
                                $earn_point = $earn_point + ($item['category_cd'] == '1' ? ($item['amount'] * $item['earn_point']) : 0);
                        ?>
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <?= $this->Html->image(isset($item['img']) ? $item['img'] : "/img/noproduct.png", ['class' => 'img-responsive', 'style' => 'width: 100px;']); ?>
                                            </div>
                                            <div class="col-sm-7">
                                                <p><?= $item['name'] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <? if ($item['category_cd'] == '3') {?>
                                    <td data-th="Price"><?= number_format($price, 0, '.', ',') ?>P</td>
                                    <?} else{?>
                                    <td data-th="Price"><?= number_format($price, 0, '.', ',') ?>đ</td>
                                    <?}?>
                                    <td data-th="Quantity">
                                        <?= $this->Form->create(null, [
                                            'url' => [
                                                'controller' => 'Cart',
                                                'action' => 'update',
                                                $item['id_product']
                                            ]
                                        ]); ?>
                                        <input type="number" name="amount" class="form-control text-center" value="<?= $item['amount'] ?>" min="1">
                                        <?= $this->form->button('Update', ['type' => 'submit', ' class' => 'btn btn-info btn-sm update']) ?>
                                        <?= $this->Form->end(); ?>
                                    </td>
                                    <td data-th="Subtotal" class="text-center">
                                        <?if ($item['category_cd'] == '3') {?>
                                        <?= number_format($item['amount'] * $price, 0, '.', ',') ?>P
                                        <?} else{?>
                                        <?= number_format($item['amount'] * $price, 0, '.', ',') ?>đ
                                        <?}?>
                                    </td>

                                    <td data-th="Subtotal" class="text-center">
                                        <?= number_format($item['amount'] * $item['earn_point'], 0, '.', ',') ?></td>
                                    <td>
                                        <?= $this->Form->postLink(
                                            __('Delete'),
                                            URL_DEL_CART . $item['id_product'],
                                            ['confirm' => __('Bạn có chắc chăn muốn xóa "{0}" không?', $item['name']), 'class' => 'btn btn-danger btn-sm']
                                        ) ?>
                                    </td>
                                </tr>
                        <?php }
                        } ?>

                    </tbody>
                    <tfoot>
                        <?if (!empty($data)){?>
                        <tr>
                            <td class="text-right"><strong>Số Point nhận được: <?= number_format($earn_point, 0, '.', ',') ?>P</strong> </td>
                            <td colspan="5" class="text-right"><strong>Số Point đổi quà: <?= number_format($point, 0, '.', ',') ?>P</strong></td>

                        </tr>
                        <tr>
                            <td class="text-right">
                                <strong>Phí vận chuyển: </strong> <strong class="fee"></strong>
                            </td>
                            <td colspan="2" class="text-right">
                                <strong>Tiền sản phẩm:</strong>
                            </td>
                            <td class="hidden-xs text-center">
                                <strong tt=<?= $total ?> id="tt"><?= number_format($total, 0, '.', ',') ?>đ</strong>
                            </td>
                            <td>
                                <strong>Tổng tiền:</strong>
                            </td>
                            <td class="hidden-xs text-center">
                                <strong id="tt_all"></strong>
                                <strong>đ</strong>
                            </td>
                        </tr>
                        <?}?>
                        <tr>
                            <td>
                                <a href="<?= SITE_URL ?>" class="btn btn-success"><i class="fa fa-angle-left"></i>
                                    Continue Shopping</a>
                            </td>
                            <td colspan="4"></td>
                            <td>
                                <?= $this->Form->postLink(
                                    __('Clear'),
                                    URL_CLEAR_CART,
                                    ['confirm' => __('Bạn có chắc chăn muốn xóa giỏ hàng không?'), 'class' => 'btn btn-warning btn-block']
                                ) ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div id="formStep" class="col-sm-4 stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle border border-primary">1</a>
                        <p>Thông tin người nhận</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle disabled border border-primary">2</a>
                        <p>Phương thức thanh toán và vận chuyển</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle disabled border border-primary">3</a>
                        <p>Xác nhận đơn hàng</p>
                    </div>
                </div>
                <?= $this->Form->create(null, [
                    'id' => 'form',
                    'url' => [
                        'controller' => 'Cart',
                        'action' => 'add',
                    ]
                ]); ?>
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-11">
                            <h3>Thông tin người nhận</h3>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input maxlength="200" type="email" name="id_user" required class="form-control" placeholder="Nhập Email Address" id="firstName" value="<?= empty($infoUser) == false ? $infoUser['uid'] : "" ?>" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Họ và Tên</label>
                                <input maxlength="100" type="text" name="reciever" required="required" class="form-control" placeholder="Nhập họ và tên" value="<?= empty($infoUser) == false ? $infoUser['full_name'] : "" ?>" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Số điện thoại</label>
                                <input maxlength="15" type="text" name="phone" required="required" class="form-control" placeholder="Nhập số điện thoại" value="<?= empty($infoUser) == false ? $infoUser['phone'] : "" ?>" />
                            </div>
                            <div class="form-group">
                                <?if(empty($infoUser)){?>
                                <label class="control-label">Địa chỉ</label>
                                <?}else{?>
                                <select id="ad_cd" class="form-control">
                                    <option value="1" address="<?= $infoUser['address1'] ?>">Địa chỉ chính</option>
                                    <option value="2" address="<?= $infoUser['address2'] ?>">Địa chỉ phụ</option>
                                    <option value="3" address="">Địa chỉ khác</option>
                                </select>
                                <?}?>
                                <textarea class="form-control" style="margin-top: 5px;" name="address" id="address" rows="3" required="required"></textarea>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-11">
                            <h3>Thanh toán & Vận chuyển</h3>
                            <div class="form-group">
                                <label class="control-label">Phương thức thanh toán</label>
                                <div class="form-group">

                                    <select name="paymnt_method" class="form-control" id="sel1">
                                        <? foreach($paymentMethod as $item){?>
                                        <option value="<?= $item->method_paymnt ?>"><?= $item->method_paymnt ?></option>
                                        <?}?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phương thức vận chuyển</label>
                                <div class="form-group">
                                    <select name="shipping_unit" class="form-control" id="shipUnit">
                                        <? foreach($shipUnit as $item){?>
                                        <option fee="<?= $item->fee ?>" value="<?= $item->shipping_unit ?>"><?= $item->shipping_unit ?></option>
                                        <?}?>
                                    </select>
                                    <input type="hidden" id="fee-order" class="fee-order" name="fee">
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-11">
                            <h3>Xác nhận đơn hàng</h3>
                            <? if($point>$earn_point){?>
                            <p>
                                Số điểm của bạn không đủ để đổi quà.
                            </p>
                            <?} else {?>
                            <p>
                                Bạn đồng ý mua hàng.
                            </p>
                            <button class="btn btn-success pull-right" type="button" onClick="this.form.submit()">
                                Mua hàng
                            </button>
                            <?}?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <? if(!empty($infoUser)){?>
    <div class="back-gray pad-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-products-category">
                        <div class="head-box-category">
                            <a href="<?= URL_DANHMUC_SANPHAM ?>" class="left-head">
                                <img src="https://adminbeauty.hvnet.vn/images/sh11-128.png?v=17042020" alt="type icon">
                                <h2>
                                    Sản phẩm quà tặng
                                </h2>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                            <div class="clr"></div>
                        </div>
                        <div class="body-box-category">
                            <?= $this->element('cards', ["data" => isset($productPoint) ? $productPoint : null]); ?>
                            <div class="clr"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?}?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<?= $this->fetch('script') ?>