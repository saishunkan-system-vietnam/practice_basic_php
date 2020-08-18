<div class="detail-product">
	<div class="bracum">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="#">Trang cấp 1</a></li>
			<li class="breadcrumb-item"><a href="#">Trang cấp 2</a></li>
			<li class="breadcrumb-item active" aria-current="page">Trang hiện tại</li>
		</ol>
	</div>
	<div class="container">
		<div class="row">
			<div class="product-detail-left col-lg-4">
				<div class="sp-loading">
					<?= $this->Html->image('sp-loading.gif') ?>
					Loading Images
				</div>
				<div class="sp-wrap">
					<?php foreach ($image as $key => $item) { ?>
						<a href=<?= SITE_URL . 'img/' . $item->img_url ?>><?= $this->Html->image($item->img_url) ?></a>
					<?php }; ?>
				</div>
			</div>
			<div class="col-lg-5">
				<div>
					<h1 class="title-Product"><?= $product->name ?></h1>
				</div>
				<div class="box-price">
					<div class="price-drop">
						<?php if ($product->discount == 0) { ?>
							<span><?= number_format($product->price / 10, 0, '.', ',') ?>đ</span>
							<span class="issale"></span>
						<?php } else { ?>
							<span><?= number_format(($product->price - $product->discount) / 10, 0, '.', ',') ?>đ</span>
							<span class="issale "><?= number_format($product->price / 10, 0, '.', ',') ?>đ</span>
						<?php } ?>
					</div>
					<div class="hanc">
						<p><?= $product->made_in ?></p>
					</div>
				</div>
				<div class="box-note ">
					<?= $product->info_gen ?>
				</div>
				<div class="card-box">
					<div class="box-add">
						<div class="number-card">
							<span>Số lượng:</span>
							<input type="number" name="numberproduct" id="numberproduct" class="form-control" value="1" min="1" max="99" data-barcode="5056175935079" data-refid="6813">
							<div class="clr"></div>
						</div>
						<div class="bst">
							<button type="button" class="btn-bts btn-atc" onclick="AddCard()">
								<i class="fa fa-shopping-cart"></i>
								Thêm giỏ hàng
							</button>
							<div class="clr"></div>
						</div>
						<div class="clr"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="box-left">
					<div class="title-left">
						<strong>-- CHẤT LƯỢNG CHO TẤT CẢ --</strong>
					</div>
					<div class="content-left pad-8-15">
						<div class="box-shas rig-limit">
							<?= $this->Html->image('chinh-sach-04.png', array('class' => 'img-reponsive lazy')) ?>
							<div class="content-shas">
								<strong>mỹ phẩm 100% chính hãng </strong>
								<p>Chất lượng sản phẩm luôn được chứng nhận bằng sự tin cậy của Khách Hàng suốt nhiều năm qua</p>
							</div>
							<div class="clr"></div>
						</div>
						<div class="box-shas rig-limit">
							<?= $this->Html->image('chinh-sach-05.png', array('class' => 'img-reponsive lazy')) ?>
							<div class="content-shas">
								<strong>
									LUÔN ĐƯỢC TÍCH ĐIỂM
								</strong>
								<p>
									Đơn hàng từ 100k=1 điểm. Tích điểm đổi quà.
								</p>
							</div>
							<div class="clr"></div>
						</div>
						<div class="box-shas rig-limit">
							<?= $this->Html->image('chinh-sach-06.png', array('class' => 'img-reponsive lazy')) ?>
							<div class="content-shas">
								<strong>MIỄN PHÍ GIAO HÀNG </strong>
								<p>Đơn hàng trên 200k nội thành HCM</p>
							</div>
							<div class="clr"></div>
						</div>
						<div class="box-shas rig-limit">
							<?= $this->Html->image('chinh-sach-07.png', array('class' => 'img-reponsive lazy')) ?>
							<div class="content-shas">
								<strong>TRI ÂN KHÁCH HÀNG</strong>
								<p>Với các chương trình khuyến mãi, các sự kiện &amp; quà tặng đặc biệt vô cùng hấp dẫn</p>
							</div>
							<div class="clr"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="product-info">
		<div class="item-note ">
			<div class="title-member">
				<h2>Thông tin sản phẩm</h2>
			</div>
			<div class="back-content">
				<?= $product->info_dtl ?>
			</div>
		</div>
	</div>
	<div class="box-products">
		<!-- <div class="head-box">
			<div class="title-box">
				<strong>
					SẢN PHẨM CÙNG LOẠI
				</strong>
			</div>
		</div>
		<div class="clr"></div>
		<div class="owl-carousel">
			<?= $this->element('cards', ["data" => isset($data) ? $data : null]); ?>
		</div> -->
		<div class="col-lg-12">
			<div class="box-products">
				<div class="head-box">
					<div class="title-box">
						<h2>
							<a title="">
								SẢN PHẨM CÙNG LOẠI
							</a>
						</h2>
					</div>
				</div>
				<div class="body-box">
					<div class="owl-carousel new-sale owl-loaded owl-drag">
					</div>
				</div>
			</div>

		</div>
	</div>


	<script>
		$(document).ready(function() {
			$("#sliderShuffle").cycle({
				next: '#next',
				prev: '#prev'
			});

			$('.owl-carousel').owlCarousel({
				items: 4,
				loop: true,
				margin: 15,
				autoplay: true,
				autoplayTimeout: 3000, //3 Second
				nav: true,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 3,
						nav: true
					},
					1000: {
						items: 4,
						nav: true
					}
				}

			});

			$(function() {
				$(".sp-wrap").smoothproducts();
			});
		});
	</script>