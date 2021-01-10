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
								<div class="card card-statistics">
									<div class="card-header">
										<div class="card-heading">
											<h4 class="card-title">Drop Zone</h4>
										</div>
									</div>
									<div class="card-body">
										<form action="<?= base_url() . 'admin/product/upload/' . $this->uri->segment('4') ?>" class="dropzone" id="my-awesome-dropzone"></form>
									</div>
								</div>
							</div>
							<div class="col-12 mb-3">
								<div class=" d-sm-flex flex-nowrap align-items-center">
									<div class="page-title mb-2 mb-sm-0">
										<h1>Image List</h1>
									</div>
									<div class="ml-auto d-flex align-items-center">
										<a href="<?= base_url() . 'admin/product/image/' . $this->uri->segment('4') ?>" class="btn btn-dark">Refesh</a>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="row magnific-wrapper">
									<?php
									foreach ($image->result() as $img) {
									?>
										<div class="col-xl-3 col-6">
											<div class="card card-statistics text-center">
												<div class="card-body p-0">
													<div class="portfolio-item">
														<img class="card-img-custom" src="<?= base_url() . '/assets/template/data-img/upload/' . $img->path . '/' . $img->image ?>" alt="gallery-img">
														<div class="portfolio-overlay">
															<h4 class="text-white"><a href="<?= base_url() . 'admin/product/delete_image/' . $img->id_image . '/' . $img->path ?>">Delete</a></h4>
														</div>
														<a class="popup portfolio-img view" href="<?= base_url() . '/assets/template/data-img/upload/' . $img->path . '/' . $img->image ?>"><i class="fa fa-arrows-alt"></i></a>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="btn__footer">
								<a href="<?= base_url() . 'admin/product' ?>" class="btn-custom btn-info"><i class="fa fa-chevron-left"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$this->load->view('admin/__lib/footer');
		?>
