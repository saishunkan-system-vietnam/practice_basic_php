<div class="row bg-title">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h2>Dashboard</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="white-box customer">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                    <h4 class="text-h ">Khách hàng</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-megna"><?= $dataTotalAccount->count ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="white-box product">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                    <h4 class="text-h">Sản phẩm</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-megna"><?= $dataTotalProduct->count ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h4 class="text-h">Tổng đơn hàng sản phẩm mỹ phẩm: <?= $dataOrder->prdTotal ?></h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="white-box-order">
            <h6 class="text-muted">Đơn hàng Mỹ Phẩm</h6>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                    <h5 class="text-muted">Chờ xử lý</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-primary"><?= $dataOrder->prdWaiting ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="white-box-order">
            <h6 class="text-muted">Đơn hàng Mỹ Phẩm</h6>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                    <h5 class="text-muted">Đang xử lý</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-primary"><?= $dataOrder->prdProcessing ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="white-box-order">
            <h6 class="text-muted">Đơn hàng Mỹ Phẩm</h6>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                    <h5 class="text-muted">Đã hoàn thành</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-primary"><?= $dataOrder->prdComplete ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="white-box-order">
            <h6 class="text-muted">Đơn hàng Mỹ Phẩm</h6>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                    <h5 class="text-muted">Đã hủy</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-primary"><?= $dataOrder->prdCancel ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h4 class="text-h">Tổng đơn hàng sản phẩm dùng thử: <?= $dataOrder->sampleTotal ?></h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="white-box-order">
            <h6 class="text-muted">Đơn hàng dùng thử</h6>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                    <h5 class="text-muted">Chờ xử lý</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-primary"><?= $dataOrder->sampleWaiting ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="white-box-order">
            <h6 class="text-muted">Đơn hàng Mỹ Phẩm</h6>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                    <h5 class="text-muted">Đang xử lý</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-primary"><?= $dataOrder->sampleProcessing ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="white-box-order">
            <h6 class="text-muted">Đơn hàng dùng thử</h6>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                    <h5 class="text-muted">Đã hoàn thành</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-primary"><?= $dataOrder->sampleComplete ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="white-box-order">
            <h6 class="text-muted">Đơn hàng dùng thử</h6>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                    <h5 class="text-muted">Đã hủy</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-primary"><?= $dataOrder->sampleCancel ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="white-box-sum">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                    <h2>Tổng doanh thu</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h1 class="counter text-right m-t-15 text-danger">
                        <?= number_format(($dataTotalPrice->totalPrice), 0, '.', ',') ?>đ</h1>
                </div>
            </div>
        </div>
    </div>
</div>