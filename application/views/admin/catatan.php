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
													Settings
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
											<h5>Notes for your shop</h5>
										</div>
									</div>
									<div class="card-body">
										<form action="<?= base_url() . 'admin/notes/update' ?>" method="post">
											<?php
											foreach ($notes->result() as $nt) {
											?>
												<div class="row">
													<div class="col-md-12 form-grup">
														<textarea class="form-control" id="description" name="notes"><?= $nt->notes ?></textarea>
													</div>
													<div class="col-md-12 mt-3 mb-3">
														<input type="submit" name="submit" value="Update" class="col-md-12 btn btn-outline-success" />
													</div>
												</div>
											<?php } ?>
										</form>
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

		<script>
			tinymce.init({
				selector: 'textarea#description',
				height: 450,
				theme: 'silver',
				mobile: {
					theme: 'mobile',
					plugins: 'lists',
					toolbar: 'undo bold italic'
				}
			});
		</script>
