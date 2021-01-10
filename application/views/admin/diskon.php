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
							<div class="col-12">
								<div class="card card-statistics">
									<div class="card-header">
										<div class="card-heading">
											<h4 class="card-title">Diskon List</h4>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-borderless mb-0">
												<thead>
													<tr>
														<th scope="col">No</th>
														<th scope="col">Codes</th>
														<th scope="col">Status</th>
														<!-- <th scope="col">Actions</th> -->
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($diskon->result() as $dc) {
													?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= '<b>' . $dc->kode . '</b>' ?></td>
															<td>
																<?php
																if ($dc->status === '0') {
																?>
																	<a href="<?= base_url() . 'admin/diskon/sts/' . $dc->id_diskon . '/1'  ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success-inverse pl-3 pr-3">
																		Active
																	</a>
																<?php
																} else if ($dc->status === '1') {
																?>
																	<a href="<?= base_url() . 'admin/diskon/sts/' . $dc->id_diskon . '/0'  ?>" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger-inverse pl-3 pr-3">
																		Deactive
																	</a>
																<?php
																}
																?>
															</td>
															<td>
																<!-- <a href="<?= base_url() . 'admin/diskon/edit/' . $dc->id_diskon ?>" class="btn btn-icon btn-sm btn-square btn-outline-success mr-2"><i class="fa fa-edit"></i></a> -->
																<!-- <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-square btn-outline-danger"><i class="fa fa-trash"></i></a> -->
															</td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="btn__footer">
								<a href="<?= base_url() . 'admin/diskon/add' ?>" class="btn-custom btn-info"><i class="fa fa-plus"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$this->load->view('admin/__lib/footer');
		?>
