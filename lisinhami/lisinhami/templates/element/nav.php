<?
if ($this->request->getSession()->check('success')) {
    echo "<script type='text/javascript'>alert('$_SESSION[success]');</script>";
    $this->request->getSession()->delete('success');
}
var_dump($cookie123);
// var_dump($cookie_val);
?>

<section class="header-main">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-sm-4 col-md-4 col-5"> <a href="#" class="brand-wrap" data-abc="true">
                    <!-- <img class="logo" src="http://ampexamples.com/data/upload/2017/08/bootstrap2_logo.png">-->
                    <span class="logo"><?= $this->Html->image('logo.png', array('alt' => 'logo', 'border' => '0', 'width' => '171.28')); ?></span> </a> </div>

            <div class="col-lg-4 col-xl-5 col-sm-8 col-md-4 d-none d-md-block">
                <form action="#" class="search-wrap">
                    <div class="input-group w-100"> <input type="text" class="form-control search-form" style="width:55%;" placeholder="Search">
                        <div class="input-group-append"> <button class="btn btn-primary search-button" type="submit"> <i class="fa fa-search"></i> </button> </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5 col-xl-4 col-sm-8 col-md-4 col-7">
                <div class="d-flex justify-content-end"> <a target="_blank" href="#" data-abc="true" class="nav-link widget-header"></a> <span class="vl"></span>
                    <div class="dropdown btn-group">
                        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-abc="true"></a>
                    </div>
                    <span class="vl"></span>
                    <a class="nav-user-img" href="#" data-toggle="modal" data-target="#modalLRForm" data-abc="true">
                        <span class="login">Đăng nhập</span>
                    </a>
                    <a class="nav-user-img" href=<?= $this->url->build(['controller' => 'pages', 'action' => 'register']) ?> data-abc="true">
                        <span class="register">Đăng ký</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-md navbar-main">
    <div class="container-fluid">
        <form class="d-md-none my-2">
            <div class="input-group"> <input type="search" name="search" class="form-control" placeholder="Search" required="">
                <div class="input-group-append"> <button type="submit" class="btn btn-secondary"> <i class="fa fa-search"></i> </button> </div>
            </div>
        </form> <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#dropdown6" aria-expanded="false"> <span class="navbar-toggler-icon"></span> </button>
        <div class="navbar-collapse collapse" id="dropdown6">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link" href=<?= SITE_URL ?> data-abc="true"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> </li>
                <li class="nav-item"> <a class="nav-link" href="/danhmuc/san-pham-my-pham" data-abc="true">Sản phẩm mỹ phẩm</a> </li>
                <li class="nav-item"> <a class="nav-link" href="/danhmuc/san-pham-dung-thu" data-abc="true">Sản phẩm dùng thử</a> </li>
                <li class="nav-item"> <a class="nav-link" href="/danhmuc/san-pham-qua-tang" data-abc="true">Sản phẩm quà tặng</a> </li>
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
                        <input class="form-control" name="email" placeholder="Enter email" type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Email không hợp lệ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check" style="margin-bottom: 10px;">
                        <input type="checkbox" name='remember' class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>