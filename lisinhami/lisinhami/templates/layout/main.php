<?

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <?= $this->Html->css(['bootstrap.min']) ?>

    <?= $this->Html->script(['jquery-3.3.1.min', 'jquery.cycle', 'bootstrap.min']) ?>

    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['nav', 'footer', 'admin_stylesheet']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <main class="main" style="min-height: 100vh;">
        <?= $this->element('nav') ?>
        <? if($this->request->getParam('action') != "register" && $this->request->getParam('action') != "viewContOrder"){
        echo $this->element('banner') ;
        }
        ?>
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <?= $this->element('footer'); ?>
</body>

</html>