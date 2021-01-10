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
											<h4 class="card-title"><?= $title ?></h4>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-0">
												<tbody>
													<?php
													foreach ($product->result() as $pr) {
														date_default_timezone_set("Asia/Bangkok");
														$skrng = strtotime("now");
														$create = $skrng - $pr->create_at;
													?>
														<tr>
															<th>
																Thumbnail Image
															</th>
														</tr>
														<tr>
															<td>
																<img src="<?= base_url() . 'assets/template/data-img/thumb-img/' . $pr->thumb_image ?>" class="img-db" alt="">
															</td>
														</tr>
														<tr>
															<th>Name Product</th>
														</tr>
														<tr>
															<td><?= $pr->prod_nama ?></td>
														</tr>

														<tr>
															<th>Price Product</th>
														</tr>
														<tr>
															<td>
																<?php
																echo "Rp " . number_format($pr->prod_price, 2, ',', '.');
																?>
															</td>
														</tr>
														<tr>
															<th>weight Product</th>
														</tr>
														<tr>
															<td><?= $pr->prod_weight . ' <b>(gr)</b>' ?></td>
														</tr>
														<tr>
															<th>Unit Product</th>
														</tr>
														<tr>
															<td><?= $pr->prod_unit ?></td>
														</tr>
														<tr>
															<th>Stock Product</th>
														</tr>
														<tr>
															<td><?= $pr->stock . ' <b>' . $pr->prod_unit . '</b>' ?></td>
														</tr>
														<tr>
															<th>Asuransi Product</th>
														</tr>
														<tr>
															<td><?= $pr->asuransi ?></td>
														</tr>
														<tr>
															<th>condition Product</th>
														</tr>
														<tr>
															<td><?= $pr->kondisi ?></td>
														</tr>
														<tr>
															<th>Merk Product</th>
														</tr>
														<tr>
															<td>
																<?php
																if (!$pr->merk) {
																	echo '-';
																} else {
																	echo $pr->merk;
																}
																?>
															</td>
														</tr>
														<?php
														$where = array(
															'product' => $pr->prod_id
														);
														$op_prod = $this->model->show_data('prod_optional', null, null, $where);
														foreach ($op_prod->result() as $op) {
														?>
															<tr>
																<th>Product Shape</th>
															</tr>
															<tr>
																<td>
																	<?php
																	if (!$op->bentuk) {
																		echo '-';
																	} else {
																		echo $op->bentuk;
																	}
																	?></td>
															</tr>
															<tr>
																<th>Expired Product</th>
															</tr>
															<tr>
																<td>
																	<?php
																	if (!$op->kadaluarsa) {
																		echo '-';
																	} else {
																		echo $op->kadaluarsa;
																	}
																	?></td>
															</tr>
															<tr>
																<th>Long Keep</th>
															</tr>
															<tr>
																<td>
																	<?php
																	if (!$op->lama_simpan) {
																		echo '-';
																	} else {
																		echo $op->lama_simpan . ' <b>(days)</b>';
																	}
																	?></td>
															</tr>
															<tr>
																<th>Save Description</th>
															</tr>
															<tr>
																<td>
																	<?php
																	if (!$op->ket_simpan) {
																		echo '-';
																	} else {
																		echo $op->ket_simpan;
																	}
																	?></td>
															</tr>
														<?php } ?>
														<!-- <tr>
													<th>Description Product</th>
												</tr>
												<tr>
													<td>
														<?= $pr->description ?>
													</td>
												</tr> -->
														<tr>
															<th>Create at Product</th>
														</tr>
														<tr>
															<td><?= $time->get_time_ago(time() - $create) ?></td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
										<div class="btn__footer">
											<a href="<?= base_url() . 'admin/product' ?>" class="btn-custom btn-info"><i class="fa fa-chevron-left"></i></a>
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
