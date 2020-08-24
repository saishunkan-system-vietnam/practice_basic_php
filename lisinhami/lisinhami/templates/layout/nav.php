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
                    <a class="nav-user-img" href="#" data-toggle="modal" data-target="#modalLRForm" data-abc="true">
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
                <li class="nav-item"> <a class="nav-link" href="" data-abc="true"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> </li>
                <li class="nav-item"> <a class="nav-link" href="" data-abc="true">Sản phẩm thường</a> </li>
                <li class="nav-item"> <a class="nav-link" href="" data-abc="true">Sản phẩm dùng thử</a> </li>
                <li class="nav-item"> <a class="nav-link" href="" data-abc="true">Sản phẩm quà tặng</a> </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Banner -->
<div class="banner" style="margin-top: 10px; margin-right: 20%; margin-left: 20%;">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <span class="d-block w-100"><?= $this->Html->image('1.jpg', array('alt' => 'logo', 'border' => '0', 'width' => '100%')); ?></span>
                <!-- <img class="d-block w-100" src="..." alt="First slide"> -->
            </div>
            <div class="carousel-item">
                <span class="d-block w-100"><?= $this->Html->image('2.jpg', array('alt' => 'logo', 'border' => '0', 'width' => '100%')); ?></span>
            </div>
            <div class="carousel-item">
                <span class="d-block w-100"><?= $this->Html->image('3.jpg', array('alt' => 'logo', 'border' => '0', 'width' => '100%')); ?></span>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<script>
    $('.carousel').carousel({
        interval: 4000
    });
</script>
<!-- Modal -->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check" style="margin-bottom: 10px;">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>