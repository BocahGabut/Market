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
						<div class="row select-wrapper">
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
													<a href="<?php echo base_url(); ?>user/dashboard"><i class="ti ti-home"></i></a>
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
							<div class="col-md-12 col-12 selects-contant">
								<div class="card card-statistics Multi-sel">
									<div class="card-header">
										<div class="card-heading">
											<h4 class="card-title">Form edit diskon</h4>
										</div>
									</div>
									<div class="card-body">
										<?php
										foreach ($diskon->result() as $dc) {
										?>
											<form action="<?= base_url() . 'admin/diskon/save' ?>" method="post">
												<div class="col-md-12 form-grup mb-2 ">
													<label>Discount Value ( % )</label>
													<input required class="form-control" type="text" name="val_disc" value="<?= $dc->persen ?>">
												</div>
												<div class="col-md-12  mb-2 ">
													<label>Discount Code</label>
													<div class="input-group">
														<input type="text" id="code" class="form-control" name="dist_code" required value="<?= $dc->kode ?>">
														<div class="input-group-append" id="button-addon4">
															<button id="generate" class="btn btn-success" type="button">Generate Code</button>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<label>Discount Valid</label>
													<div class="input-group">
														<input type="date" class="form-control" name="from" required value="<?= $dc->start ?>">
														<span class="input-group-addon">To</span>
														<input class="form-control" type="date" name="to" required value="<?= $dc->end ?>">
													</div>
												</div>
												<div class="col-md-12 mt-3">
													<label>Select Product</label>
													<div class="form-group mb-0">
														<select class="js-basic-multiple form-control" name="product[]" multiple="multiple">

															<?php
															foreach ($product->result() as $pr) {
															?>
																<option value="<?= $pr->prod_id ?>"><?= $pr->prod_nama ?></option>
															<?php } ?>
															<optgroup>
																<?php
																foreach ($product->result() as $pr) {
																?>
																	<option value="<?= $pr->prod_id ?>"><?= $pr->prod_nama ?></option>
																<?php } ?>
															</optgroup>
														</select>
													</div>
												</div>
												<div class="col-md-12 mt-3 mb-3">
													<input type="submit" name="submit" value="Save" class="col-md-12 btn btn-outline-success" />
												</div>
											</form>
										<?php } ?>
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
			function makeid(length) {
				var result = '';
				var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
				var charactersLength = characters.length;
				for (var i = 0; i < length; i++) {
					result += characters.charAt(Math.floor(Math.random() * charactersLength));
				}
				return result;
			}

			$('#generate').on('click', function() {
				$('#code').val(makeid(8))
			})
		</script>
