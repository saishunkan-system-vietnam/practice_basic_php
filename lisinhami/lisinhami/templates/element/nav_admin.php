
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
                <?= $this->Html->image('user.png', array('alt' => 'User picture', 'border' => '0', 'class' => 'img-responsive img-rounded')); ?>
            </div>
            <div class="user-info">
                <span class="user-name"><?= $this->request->getsession()->read(SESSION_EMAIL)?>
                </span>
                <span class="user-role">Administrator</span>
                <a class="user-role" href=<?= URL_LOGOUT ?>>logout</a>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>General</span>
                </li>
                <li class="sidebar">
                    <a href=<?= SITE_URL ?>>
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar">
                <a href=<?= SITE_URL.'admin' ?>>
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar">
                    <a href=<?= URL_SANPHAM ?>>
                        <i class="fa fa-th-large"></i>
                        <span>Product</span>
                    </a>
                </li>
                <li class="sidebar">
                    <a href=<?= URL_DONHANG ?>>
                        <i class="fa fa-shopping-cart"></i>
                        <span>Order</span>
                    </a>
                </li>
        </div>
</nav>