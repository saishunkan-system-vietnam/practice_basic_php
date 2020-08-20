<?= $this->Html->css(['cart']) ?>
<?= $this->Html->script(['cart']) ?>
<?= $this->fetch('css') ?>

<div class="main-shopping">
    <div class="cart_info">
        <p><?php if ($session->check('cart')) {
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
                            <th style="width: 10%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $item) { ?>
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <?= $this->Html->image(isset($item['img']) ? $item['img'] : "/img/noproduct.png", ['class' => 'img-responsive','style'=>'width: 100px;']); ?>
                                        </div>
                                        <div class="col-sm-7">
                                            <p><?=$item['name']?></p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price"><?=$item['price']?></td>
                                <td data-th="Quantity">
                                    <input type="number" class="form-control text-center" value="<?=$item['amount']?>" />
                                </td>
                                <td data-th="Subtotal" class="text-center"><?=$item['amount']* $item['price']?></td>
                                <td class="actions" data-th="">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                            </td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center">
                                <strong>Total $4.08</strong>
                            </td>
                            <td>
                                <button class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button>
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
                <form role="form" id="form">
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-11">
                                <h3>Thông tin người nhận</h3>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input maxlength="100" type="email" required class="form-control" placeholder="Nhập Email Address" id="firstName" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Họ và Tên</label>
                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Nhập họ và tên" />
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
                                        <select class="form-control" id="sel1">
                                            <option>Ngân hàng nội địa</option>
                                            <option>Ship COD</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Phương thức vận chuyển</label>
                                    <div class="form-group">
                                        <select class="form-control" id="sel1">
                                            <option>Vietel post</option>
                                            <option>Giao hàng nhanh</option>
                                            <option>Grab</option>
                                        </select>
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
                                <p>
                                    Take a moment to review the form, and edit any information.
                                </p>
                                <button class="btn btn-success pull-right" type="submit">
                                    Finish!
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<?= $this->fetch('script') ?>