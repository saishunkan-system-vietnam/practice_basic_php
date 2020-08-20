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

    <?= $this->Html->script(['jquery-3.3.1.min', 'jquery.cycle', 'bootstrap.min', 'nav_admin']) ?>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['footer', 'admin_stylesheet']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <? $checkAdmin = 0?>
    <?php
    if ($this->request->getsession()->check(SESSION_ADMIN) && $this->request->getsession()->read(SESSION_ADMIN) == 1) :
        $checkAdmin = 1;?>
        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <?= $this->element('nav_admin') ?>

            <main class="page-content">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </main>
        </div>
    <?php endif; ?>
</body>

<script>
    if(<?= $checkAdmin?> == 0)
    {
        window.location.href = "<?= SITE_URL?>";
    }
</script>

</html>