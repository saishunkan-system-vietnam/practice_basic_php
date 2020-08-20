<?php

if (isset($_COOKIE[COOKIE_LOGIN])) {
    $dataSaveUser = json_decode($_COOKIE[COOKIE_LOGIN], true);
    $email = $dataSaveUser['email'];
    $pass = $dataSaveUser['pass'];
} else {
    $email = '';
    $pass = '';
}
?>

<section class="header-main">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2 col-xl-2 col-sm-6 col-md-4 col-10"> <a href=<?= SITE_URL ?> class="brand-wrap" data-abc="true">
                    <span class="logo"><?= $this->Html->image('logo.png', array('alt' => 'logo', 'border' => '0', 'width' => '171.28')); ?></span> </a> </div>

            <div class="col-lg-3 col-xl-4 col-sm-5 col-md-3 d-none d-md-block">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'search-wrap', 'url' => URL_SEARCH]); ?>
                <div class="input-group w-100">
                    <input type="text" class="form-control search-form" name="key" id="key" value="<?= $this->request->getQuery('key') ?>" style="width:55%;" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary search-button" type="submit"> <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
            <div class="col-lg-4 col-xl-2 col-sm-4 col-md-3 col-5" id="div-cart">
                <a href="" class="div-cart"><i class="fa fa-shopping-cart cart"></i><span class="cart"> Giỏ hàng</span></a>
            </div>
            <div class="col-lg-3 col-xl-4 col-sm-2 col-2" style="text-align: right;">
                <?if(!$this->request->getsession()->check(SESSION_EMAIL)):?>
                <a href="#" data-toggle="modal" data-target="#modalLRForm" data-abc="true">
                    <span class="login">Đăng nhập</span>
                </a>
                <a href=<?= URL_REGISTER ?> data-abc="true">
                    <span class="register">Đăng ký</span>
                </a>
                <?else:?>
                <div class="dropdown">
                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-o" aria-hidden="true"></i> <span class="user"><?= $_SESSION['email'] ?></span>
                    </a>

                    <div class="dropdown-menu">
                        <?if($this->request->getsession()->check(SESSION_ADMIN) && $this->request->getsession()->read(SESSION_ADMIN) == 1):?>
                        <a class="dropdown-item" href=<?= SITE_URL.'admin'?>>Admin</a>
                        <? endif?>
                        <a class="dropdown-item" href=<?= URL_LICHSUMUAHANG ?>>Lịch sử mua hàng</a>
                        <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href=<?= URL_LOGOUT ?>>Đăng xuất</a>
                    </div>
                </div>
                <? endif?>
            </div>
        </div>
    </div>
    </div>
</section>
<nav class="navbar navbar-expand-md navbar-main">
    <div class="container-fluid">
        <?= $this->Form->create(null, ['type' => 'get', 'class' => 'd-md-none my-2', 'url' => URL_SEARCH]); ?>
        <div class="input-group"> <input type="search" name="search" class="form-control" placeholder="Search">
            <div class="input-group-append"> <button type="submit" class="btn btn-secondary"> <i class="fa fa-search"></i> </button> </div>
        </div>
        <?= $this->Form->end(); ?>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#dropdown6" aria-expanded="false"> <span class="navbar-toggler-icon"></span> </button>
        <div class="navbar-collapse collapse" id="dropdown6">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link" href=<?= SITE_URL ?> data-abc="true"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> </li>
                <li class="nav-item"> <a class="nav-link" href=<?= URL_DANHMUC_SANPHAM . "san-pham-my-pham" ?> data-abc="true">Sản phẩm mỹ phẩm</a> </li>
                <?if(!isset($_SESSION['email'])):?>
                <li class="nav-item"> <a class="nav-link" href=<?= URL_DANHMUC_SANPHAM . "san-pham-dung-thu" ?> data-abc="true">Sản phẩm dùng thử</a> </li>
                <? endif?>
            </ul>
        </div>
    </div>
</nav>
<!-- Modal -->

<?if ($this->request->getSession()->check('error')) :?>

<div class="modal" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 17px;">

    <?= "<script type='text/javascript'>alert('$_SESSION[error]'); $('#modalLRForm').modal('show')</script>";
    $this->request->getSession()->delete('error'); ?>
    <?else: ?>
    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?endif?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Body-->

                    <?= $this->Form->create(null, ['url' => URL_LOGIN]); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input class="form-control" name="email" placeholder="Enter email" type="email" required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$" title="Email không hợp lệ" value=<?= empty($email) ? '' : $email ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password" value=<?= empty($pass) ? '' :  $pass ?>>
                    </div>
                    <div class="form-check" style="margin-bottom: 10px;">
                        <input type="checkbox" name='remember' class="form-check-input" id="exampleCheck1" checked>
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>