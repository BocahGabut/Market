<?php
foreach ($product->result() as $pr) {
?>
	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$this->load->view('__lib/header_all');
	?>
	<title>Market ~ <?= $pr->prod_nama ?></title>
	<link rel="icon" href="<?= base_url() . 'assets/template/data-img/thumb-img/' . $pr->thumb_image ?>">

	<body id="description">

		<div class="container">
			<?php
			$this->load->view('__lib/navbar');
			?>
			<div class="main__detail">
				<div class="main__detail-left">
					<div class="detail__image">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<img src="<?= base_url() . 'assets/template/data-img/thumb-img/' . $pr->thumb_image ?>" alt="detail">
								</div>
								<?php
								$where = array(
									'product' => $pr->prod_id
								);

								$image = $this->model->show_data('product_image', null, null, $where);

								foreach ($image->result() as $ima) {
								?>
									<div class="swiper-slide">
										<img src="<?= base_url() . 'assets/template/data-img/upload/' . $ima->path . '/' . $ima->image ?>" alt="detail">
									</div>
								<?php } ?>
							</div>
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				<div class="main__detail-right">
					<div class="product__name">
						<?= $pr->prod_nama ?>
					</div>
					<hr>
					<div class="container__info">
						<div class="title__info">
							Harga
						</div>
						<div class="info">
							<div class="price">
								<div class="price-final">
									<?php
									$hasil_rupiah = "Rp " . number_format($pr->prod_price, 0, ',', '.');
									echo $hasil_rupiah;
									?>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="container__info">
						<div class="title__info">
							Kode Discount
						</div>
						<div class="info">
							<div class="discount">
								<?php
								date_default_timezone_set("Asia/Bangkok");
								$tgl = date("Y-m-d");
								$where = array(
									'id_diskon' => $pr->discount
								);
								$dsc = $this->model->show_data('diskon', null, null, $where);
								foreach ($dsc->result() as $dc) {
									if ($tgl >= $dc->start && $tgl <= $dc->end && $dc->status === '0') {

								?>
										<div class="coupon">
											<div class="coupon-left"><?= $dc->persen . '%' ?></div>
											<div class="coupon-con"><?= $dc->kode ?></div>
										</div>
								<?php } else {
										echo '---';
									}
								}  ?>
							</div>
						</div>
					</div> -->
					<hr>
					<div class="container__info">
						<div class="title__info">
							Info Product
						</div>
						<div class="info">
							<div class="container__item">
								<div class="title__item">Berat</div>
								<div class="item"><?= $pr->prod_weight . 'gr' ?></div>
							</div>
							<div class="container__item">
								<div class="title__item">Kondisi</div>
								<div class="item"><?= $pr->kondisi ?></div>
							</div>
							<div class="container__item">
								<div class="title__item">Asuransi</div>
								<div class="item"><?= $pr->asuransi ?></div>
							</div>
							<div class="container__item">
								<div class="title__item">Merk</div>
								<div class="item"><?= $pr->merk ?></div>
							</div>
						</div>
					</div>
					<hr>
					<div class="container__info">
						<div class="title__info">
							Catatan Toko
						</div>
						<div class="info">
							<div class="container__catatan">
								<?php
								$where = array(
									'sel_id' => $pr->seller
								);
								$seller = $this->model->show_data('seller', null, null, $where);

								foreach ($seller->result() as $sl) {
								?>
									<div class="catatan">
										<?= $sl->notes; ?>
									</div>
									<div class="footer__catatan">
										<h5 class="time"><?= date("d M Y H:i", $sl->update_at); ?></h5>
										<!-- <h5 class="time">30 juni 2020 18:05</h5> -->
										<div class="btn__more btn-modal">
											<h5>Selengkapnya</h5>
										</div>
									</div>
								<?php }
								?>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div id="second-det" class="secondary__detail">
				<div id="tab-navbar" class="tab__navbar">
					<a href="#section-desc" class="items active">
						Deskripsi
					</a>
					<!-- <a href="#section-uls" class="items">
                    Ulasan
                </a> -->
					<a href="#section-rekomend" class="items">
						Rekomendasi
					</a>
				</div>
				<div class="tab__indicator"></div>
				<section class="main__description">
					<div id="section-desc" class="description__title">
						Deskripsi product
					</div>
					<hr>
					<?php
					$where = array(
						'product' => $pr->prod_id
					);
					$opt_prod = $this->model->show_data('prod_optional', null, null, $where);
					if ($opt_prod->num_rows() > 0) {
						foreach ($opt_prod->result() as $prod) {
					?>
							<div class="container__info">
								<div class="title__info">
									Optional Info
								</div>
								<div class="info">
									<div class="container__item">
										<div class="title__item">Bentuk</div>
										<div class="item"><?= $prod->bentuk  ?></div>
									</div>
									<div class="container__item">
										<div class="title__item">Kadaluarsa</div>
										<div class="item"><?= $prod->kadaluarsa ?></div>
									</div>
									<div class="container__item">
										<div class="title__item">Lama Simpan</div>
										<div class="item"><?= $prod->lama_simpan . ' hari' ?></div>
									</div>
									<div class="container__item">
										<div class="title__item">Ket. Simpan</div>
										<div class="item"><?= $prod->ket_simpan ?></div>
									</div>
								</div>
							</div>
							<hr>
					<?php
						}
					} else {
					} ?>
					<div class="description__content">
						<div class="item">
							<?= $pr->description ?>
						</div>
					</div>
				</section>
			</div>
			<section class="main__description">
				<div id="section-rekomend" class="description__title">
					Rekomendasi product
				</div>
				<hr>
				<div class="description__content">
					<!-- slider -->
					<div class="container__slider">
						<ul id="autoWidth" class="cs-hidden">

							<?php
							$where = array(
								'seller' => $pr->seller
							);
							$reko = $this->model->show_data('product', null, null, $where, '7');
							foreach ($reko->result() as $rek) {
							?>

								<li class="item-a">
									<a href="<?= base_url() . 'f5bf48aa40cad7891eb709fcf1fde128/detail/' . $rek->prod_id ?>">
										<div class="card__product">
											<div class="card__product-main">
												<img src="<?= base_url() . 'assets/template/data-img/thumb-img/' . $rek->thumb_image ?>" alt="">
											</div>
											<div class="card__product-footer">
												<div class="product__name">
													<?= $rek->prod_nama ?>
												</div>
												<!-- <div class="product__sub">
													Grape Fruit
												</div> -->
												<div class="price">
													<div class="product__price">
														Rp 100.000
													</div>
												</div>
											</div>
										</div>
									</a>
								</li>

							<?php
							}
							?>

						</ul>
					</div>
					<!-- end slider -->
				</div>
			</section>
		</div>
		<?php

		$where = array(
			'sel_id' => $pr->seller
		);
		$seller = $this->model->show_data('seller', null, null, $where);

		foreach ($seller->result() as $sl) {
		?>
			<div id="container__buy" class="container__buy">
				<div id="btn__top" class="btn__top">
					<i class="fas fa-chevron-up"></i>
				</div>
				<div class="buy__item">
					<div class="profile__container">
						<img src="<?= base_url() . 'assets/template/data-img/user/' . $sl->sell_image ?>" alt="avatar" class="avatar">
						<div class="profile__info">
							<div class="nama__toko">
								<?= $sl->sell_shopname ?>
							</div>
							<div class="alamat__toko">
								<?php
								// Get Province
								$api_url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/' . $sl->province;
								// Read JSON file
								$json_data = file_get_contents($api_url);
								// Decode JSON data into PHP array
								$response_data = json_decode($json_data);

								echo $response_data->nama . ', ';

								// Get City
								$api_city = 'https://dev.farizdotid.com/api/daerahindonesia/kota/' . $sl->city;
								// Read JSON file
								$json_city = file_get_contents($api_city);
								// Decode JSON data into PHP array
								$response_city = json_decode($json_city);

								echo $response_city->nama;
								?>
							</div>
						</div>
					</div>
					<div class="product__container">
						<div class="harga">
							<div>Harga</div>
							<div>
								<?php
								$hasil_rupiah = "Rp " . number_format($pr->prod_price, 0, ',', '.');
								echo $hasil_rupiah;
								?>
							</div>
						</div>
						<a target="_blank" rel="noopener noreferrer" href="https://wa.me/<?= $sl->code_country . $sl->number_wa ?>?text=Halo, saya menemukan product anda di *Market*. Saya ingin mengetahui lebih lanjut tentang product anda *<?= $pr->prod_nama ?>*. Terima Kasih! %0a *Link product :* https://project-ecc.000webhostapp.com/f5bf48aa40cad7891eb709fcf1fde128/detail/<?= $pr->prod_id ?> " class="btn__buy">Buy on Whatsapp</a>
					</div>
				</div>
			</div>
			<div class="container__modal modal__show">
				<div class="modal">
					<div class="modal__header">
						<div class="title">Catatan Toko</div>
						<div class="modal__action"><span>&#215;</span></div>
					</div>
					<div class="modal__body">
						<div class="scrool">
							<?= $sl->notes ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
	<?php
	$this->load->view('__lib/footer')
	?>

	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/shortcuts/sticky.js"></script>
	<script src="<?= base_url() . 'assets/front/' ?>js/lightslider.js"></script>
	<script src="<?= base_url() . 'assets/front/' ?>js/script.js"></script>
	<script>
		var waypoint = new Waypoint.Sticky({
			element: document.getElementById('tab-navbar'),
			handler: function(direction) {}
		})
	</script>
	</body>
