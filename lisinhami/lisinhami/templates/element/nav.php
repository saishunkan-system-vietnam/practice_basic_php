<section class="header-main border-bottom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-sm-4 col-md-4 col-5"> <a href="#" class="brand-wrap" data-abc="true">
                    <!-- <img class="logo" src="http://ampexamples.com/data/upload/2017/08/bootstrap2_logo.png"> --> <span class="logo">BBBOOTSTRAP</span> </a> </div>
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
<nav class="navbar navbar-expand-md navbar-main border-bottom">
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
<style>
body {
    background-color: #eee
}

.header-main {
    position: relative;
    padding: 7px 15%;
    background-color: #282828;;
}

.logo {
    color: #fff;
    font-size: 25px;
    font-weight: 600
}

.brand-wrap {
    text-decoration: none !important
}

.icon-sm {
    width: 48px;
    height: 48px;
    line-height: 48px !important;
    font-size: 20px
}

.widget-header {
    display: inline-block;
    vertical-align: middle;
    position: relative
}

.widget-header .notify {
    position: absolute;
    top: -3px;
    right: -10px
}

.notify {
    position: absolute;
    top: -4px;
    right: -10px;
    display: inline-block;
    padding: .25em .6em;
    font-size: 12px;
    line-height: 1;
    text-align: center;
    border-radius: 3rem;
    color: #fff;
    background-color: #fa3434
}

.mr-3,
.mx-3 {
    margin-right: 1rem !important
}

.search-form {
    border: 1px solid #ffffff !important;
    background-color: white !important;
}

.search-button {
    color: #007bff;
    background-color: #ffffff;
    border-color: #ffffff
}

.navbar-main { 
    padding: 7px 15%;
    background-color: #fed700;
}

.navbar-toggler {
    border-color: rgba(0, 0, 0, 0.1) !important
}

.navbar-toggler {
    padding: 4px;
    font-size: 1.25rem;
    line-height: 1;
    background-color: transparent;
    border: 1px solid transparent;
    border-radius: 0.37rem
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: .5rem 0;
    margin: .5rem 7px 0px;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: .25rem
}

.dropdown-item {
    display: block;
    width: 100%;
    padding: .45rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0
}

.navbar-toggler-icon {
    background-image: url(https://img.icons8.com/ios/50/000000/menu.png)
}

.nav-link {
    font: 14px/18px Helvetica, Arial, 'DejaVu Sans', 'Liberation Sans', Freesans, sans-serif;
    color: #333;
    outline: none;
    zoom: 1;
    text-transform: uppercase;
    font-weight: 400
}

.vl {
    border-left: 1px solid #fff;
    height: 100%
}

.fas {
    color: #fff
}

.login {
    color: white
}
</style>