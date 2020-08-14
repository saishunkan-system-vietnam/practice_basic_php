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
                    <div class="dropdown btn-group"> <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-abc="true"></a>
                    </div> <span class="vl"></span> <a class="nav-link nav-user-img" href="#" data-toggle="modal" data-target="#login-modal" data-abc="true"><span class="login">LOGIN</span></a>
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
                <li class="nav-item"> <a class="nav-link" href="" data-abc="true">Trang chủ</a> </li>
                <li class="nav-item"> <a class="nav-link" href="" data-abc="true">Sản phẩm thường</a> </li>
                <li class="nav-item"> <a class="nav-link" href="" data-abc="true">Sản phẩm dùng thử</a> </li>
                <li class="nav-item"> <a class="nav-link" href="" data-abc="true">Sản phẩm quà tặng</a> </li>
            </ul>
        </div>
    </div>
</nav>