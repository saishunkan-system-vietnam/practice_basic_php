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
        interval: 3000
    });
</script>