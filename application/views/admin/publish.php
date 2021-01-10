<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/__lib/header');
?>

<body class="light-sidebar">
	<!-- begin app -->
	<div class="app">
		<!-- begin app-wrap -->
		<div class="app-wrap">
			<!-- begin pre-loader -->
			<div class="loader">
				<div class="h-100 d-flex justify-content-center">
					<div class="align-self-center">
						<img src="<?php echo base_url('assets/template/') ?>img/loader/loader.svg" alt="loader">
					</div>
				</div>
			</div>

			<div class="app-container">
				<div class="app-main" id="main">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12 mb-3">
								<!-- begin page title -->
								<div class="d-block d-sm-flex flex-nowrap align-items-center">
									<div class="page-title mb-2 mb-sm-0">
										<h1><?= $title ?></h1>
									</div>
									<div class="ml-auto d-flex align-items-center">
										<nav>
											<ol class="breadcrumb p-0 m-b-0">
												<li class="breadcrumb-item">
													<a href="<?php echo base_url(); ?>admin/dashboard"><i class="ti ti-home"></i></a>
												</li>
												<li class="breadcrumb-item">
													Management Product
												</li>
												<li class="breadcrumb-item active text-primary" aria-current="page"><?= $title ?></li>
											</ol>
										</nav>
									</div>
								</div>
								<!-- end page title -->
							</div>
							<div class="col-12">
								<div class="row">
									<div class="col-md-12 m-b-30">
										<div class="card card-statistics h-100 mb-0 widget-downloads-list">
											<div class="card-header d-flex justify-content-between">
												<div class="card-heading">
													<h4 class="card-title">List Product</h4>
												</div>
											</div>
											<div class="card-body scrollbar scroll_dark">
												<?php
												if ($product->num_rows() > 0) { ?>
													<?php
													foreach ($product->result() as $pr) {
													?>
														<div class="widget-text">
															<div class="media align-items-center">
																<img src="<?= base_url() . 'assets/template/data-img/thumb-img/' . $pr->thumb_image ?>" class="img-fluid">
																<div class="media-body">
																	<h4 class="mb-0 ml-3"><?= $pr->prod_nama ?></h4>
																</div>
																<div>
																	<a href="<?= base_url() . 'admin/publish/list/' . $pr->prod_id . '/1' ?>" class="btn btn-icon btn-round btn-outline-success mr-2">
																		<i class="ti ti-upload"></i>
																	</a>
																</div>
															</div>
														</div>
													<?php } ?>
												<?php } else {
													echo ' <p class="mb-3 text-danger">No data available in list</p>';
												} ?>
											</div>
										</div>
									</div>
									<div class="col-md-12 m-b-30">
										<div class="card card-statistics h-100 mb-0 widget-downloads-list">
											<div class="card-header d-flex justify-content-between">
												<div class="card-heading">
													<h4 class="card-title">List Product Upload</h4>
												</div>
											</div>
											<div class="card-body scrollbar scroll_dark">
												<?php
												if ($product_pub->num_rows() > 0) { ?>
													<?php
													foreach ($product_pub->result() as $pr) {
													?>
														<div class="widget-text">
															<div class="media align-items-center">
																<img src="<?= base_url() . 'assets/template/data-img/thumb-img/' . $pr->thumb_image ?>" class="img-fluid">
																<div class="media-body">
																	<h4 class="mb-0 ml-3"><?= $pr->prod_nama ?></h4>
																</div>
																<div>
																	<a href="<?= base_url() . 'admin/publish/list/' . $pr->prod_id . '/0' ?>" class="btn btn-icon btn-round btn-outline-danger mr-2">
																		<i class="ti ti-close"></i>
																	</a>
																</div>
															</div>
														</div>
													<?php } ?>
												<?php } else {
													echo ' <p class="mb-3 text-danger">No data available in list</p>';
												} ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$this->load->view('admin/__lib/footer');
		?>
