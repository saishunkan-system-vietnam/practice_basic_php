<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title ?>
    </title>
    <title>Sidebar template</title>
    <?= $this->Html->meta('icon') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <?= $this->Html->css(['bootstrap.min']) ?>

    <?= $this->Html->script(['jquery-3.3.1.min', 'jquery.cycle', 'bootstrap.min']) ?>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['footer', 'admin_stylesheet']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a></a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name"> Họ và tên
                        </span>
                        <span class="user-role">Administrator</span>
                        <span class="user-role">logout</span>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar">
                            <a href=<?= SITE_URL?>>
                            <i class="fas fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href=<?= URL_SANPHAM?>>
                                <i class="fa fa-th-large"></i>
                                <span>Product</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href=<?= URL_DONHANG?>>
                                <i class="fa fa-shopping-cart"></i>
                                <span>Order</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="#">
                                <i class="fas fa-users"></i>
                                <span>User</span>
                            </a>
                        </li>
                </div>
        </nav>
        <main class="page-content">
            <div class="container-fluid">
                <?= $this->fetch('content') ?>
            </div>
        </main>

    </div>

</body>

</html>
<script>
    jQuery(function($) {
        $(".sidebar-dropdown > a").click(function() {
            if (
                $(this)
                .parent()
                .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });
    });
</script>