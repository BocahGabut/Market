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
									<?php echo $this->session->flashdata('message') ?>
									<?php
									if ($product->num_rows() > 0) {
									?>
										<?php
										foreach ($product->result() as $u) {
										?>
											<div class="col-md-4">
												<div class="card card-statistics ">
													<div class="gallery">
														<a href="<?= base_url() . 'assets/template/data-img/thumb-img/' . $u->thumb_image ?>" alt="Card Product" class=" view"><img src="<?= base_url() . 'assets/template/data-img/thumb-img/' . $u->thumb_image ?>" alt="Card Product" class="card-img-custom "></a>
													</div>
													<div class="card-body">
														<h4 class="card-title"><?= $u->prod_nama ?></h4>
														<button onclick="delete_message('<?php echo $u->prod_id ?>','<?php echo base_url(); ?>admin/product/delete','<?php echo base_url(); ?>admin/product/')" class="btn btn-icon btn-outline-danger mr-2"><i class="fa fa-trash"></i></button>
														<!-- <button onclick="category('<?= $u->prod_id ?>')" class="btn btn-icon btn-outline-success mr-2"><i class="fa fa-edit"></i></button> -->
														<a href="<?= base_url() . 'admin/product/detail/' . $u->prod_id ?>" class="btn btn-icon btn-outline-info mr-2"><i class="fa fa-info"></i></a>
														<a href="<?= base_url() . 'admin/product/image/' . $u->prod_id ?>" class="btn btn-icon btn-outline-warning mr-2"><i class="fa fa-image"></i></a>
														<a href="<?= base_url() . 'admin/product/edit/' . $u->prod_id ?>" class="btn btn-icon btn-outline-success "><i class="fa fa-edit"></i></a>
													</div>
												</div>
											</div>
										<?php } ?>
									<?php } else { ?>
										<div class="text-error">
											<h4>No data available in list</h4>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="btn__footer">
								<a href="<?= base_url() . 'admin/product/productadd' ?>" class="btn-custom btn-info"><i class="fa fa-plus"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$this->load->view('admin/__lib/footer');
		?>
