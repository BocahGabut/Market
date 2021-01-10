<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('__lib/header_all');
?>
<title>Market</title>
<link rel="icon" href="">

<body>
	<div class="container">
		<?php
		$this->load->view('__lib/navbar');
		?>
		<div class="container__main">
			<div class="container__main-top">
				<h1 class="title">Happy Shooping</h1>
				<!-- <div class="filter">
					<span></span>
					<span></span>
					<span></span>
				</div> -->
			</div>
			<div class="container__main-product">
				<?php
				foreach ($product->result() as $pr) {
				?>
					<a href="<?= base_url() . 'f5bf48aa40cad7891eb709fcf1fde128/detail/' . $pr->prod_id ?>" class="card__product">
						<div class="card__product-main">
							<img src="<?= base_url() . 'assets/template/data-img/thumb-img/' . $pr->thumb_image ?>" alt="">
						</div>
						<div class="card__product-footer">
							<div class="product__name">
								<?= $pr->prod_nama;
								?>
							</div>
							<div class="price">
								<div class="product__price">
									<?php
									$hasil_rupiah = "Rp " . number_format($pr->prod_price, 0, ',', '.');
									echo $hasil_rupiah;
									?>
								</div>
								<!-- <a href="<?= base_url() . 'f5bf48aa40cad7891eb709fcf1fde128/detail/' . $pr->prod_id ?>" class="btn__detail">
									<i class="fal fa-shopping-cart"></i>
								</a> -->
							</div>
						</div>
					</a>
				<?php } ?>

			</div>
		</div>
	</div>

	<?php
	$this->load->view('__lib/footer')
	?>

	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/shortcuts/sticky.js"></script>
	<script src="<?= base_url() . 'assets/front/' ?>js/lightslider.js"></script>
	<script src="<?= base_url() . 'assets/front/' ?>js/script.js"></script>
