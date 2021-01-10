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
							<div class="col-md-12 m-b-30">
								<!-- begin page title -->
								<div class="d-block d-lg-flex flex-nowrap align-items-center">
									<?php
									$where = array(
										'sel_id' => $this->session->userdata('id_user'),
									);
									date_default_timezone_set("Asia/Bangkok");
									/* This sets the $time variable to the current hour in the 24 hour clock format */
									$time = date("H");
									/* Set the $timezone variable to become the current timezone */
									$timezone = date("e");
									/* If the time is less than 1200 hours, show good morning */
									$says;
									if ($time < "12") {
										$says = "Good morning";
									} else if ($time >= "12" && $time < "17") {
										$says = "Good afternoon";
									} else if ($time >= "17" && $time < "19") {
										$says = "Good evening";
									} else if ($time >= "19") {
										$says = "Good night";
									}
									$seller = $this->model->show_data('seller', null, null, $where);
									foreach ($seller->result() as $sl) {
									?>
										<div class="bg-img mb-2 mb-xl-0 mr-3">
											<img class="img-fluid rounded" src="<?= base_url() . 'assets/template/data-img/user/' . $sl->sell_image ?>" alt="user">
										</div>
										<div class="page-title mb-2 mb-xl-0">
											<h1 class="mb-1"><?= $says . ', ' . $sl->sel_firstname . ' ' . $sl->sel_lastname ?> </h1>
											<p><?= $sl->address ?></p>
										</div>
									<?php } ?>
									<div class="ml-auto d-flex align-items-center secondary-menu text-center">
										<a href="<?= base_url() . 'admin/notes' ?>" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Notes">
											<i class="fa fa-sticky-note btn btn-icon text-info"></i>
										</a>
										<a href="<?= base_url() . 'admin/account' ?>" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Profile">
											<i class="fa fa-user btn btn-icon text-danger"></i>
										</a>
									</div>
								</div>
								<!-- end page title -->
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="card card-statistics">
									<div class="row no-gutters">
										<div class="col-xxl-4 col-lg-6">
											<div class="p-20 border-lg-right border-bottom border-xxl-bottom-0">
												<div class="d-flex m-b-10">
													<p class="mb-0 font-regular text-muted font-weight-bold">Total Product</p>
												</div>
												<div class="d-block d-sm-flex h-100 align-items-center">
													<div class="apexchart-wrapper">
														<div id="analytics7"></div>
													</div>
													<div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
														<h3 class="mb-0">
															<i class="icon-arrow-up-circle"></i>
															<?php
															$where = array(
																'seller' => $this->session->userdata('id_user')
															);
															$pr = $this->model->show_data('product', null, null, $where);
															echo $pr->num_rows();
															?>
														</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xxl-4 col-lg-6">
											<div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0">
												<div class="d-flex m-b-10">
													<p class="mb-0 font-regular text-muted font-weight-bold">Product Publish</p>
												</div>
												<div class="d-block d-sm-flex h-100 align-items-center">
													<div class="apexchart-wrapper">
														<div id="analytics8"></div>
													</div>
													<div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
														<h3 class="mb-0">
															<i class="icon-arrow-up-circle"></i>
															<?php
															$where = array(
																'status' => '1',
																'seller' => $this->session->userdata('id_user')
															);
															$pr = $this->model->show_data('product', null, null, $where);
															echo $pr->num_rows();
															?>
														</h3>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xxl-4 col-lg-6">
											<div class="p-20 border-lg-right border-bottom border-lg-bottom-0">
												<div class="d-flex m-b-10">
													<p class="mb-0 font-regular text-muted font-weight-bold">Discount Codes</p>
												</div>
												<div class="d-block d-sm-flex h-100 align-items-center">
													<div class="apexchart-wrapper">
														<div id="analytics9"></div>
													</div>
													<div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
														<h3 class="mb-0">
															<i class="icon-arrow-up-circle"></i>
															<?php
															$where = array(
																'seller' => $this->session->userdata('id_user')
															);
															$pr = $this->model->show_data('diskon', null, null, $where);
															echo $pr->num_rows();
															?>
														</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xxl-8 m-b-30">
								<div class="card card-statistics h-100 mb-0">
									<div class="card-header d-flex align-items-center justify-content-between">
										<div class="card-heading">
											<h4 class="card-title">Discount Codes</h4>
										</div>
									</div>
									<div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
										<div class="datatable-wrapper table-responsive">
											<table id="datatable" class="table table-borderless table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Codes</th>
														<th>Status</th>
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
																	<a href="javascript:void(0)" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-success-inverse pl-3 pr-3">
																		Active
																	</a>
																<?php
																} else if ($dc->status === '1') {
																?>
																	<a href="javascript:void(0)" class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-pill badge-danger-inverse pl-3 pr-3">
																		Deactive
																	</a>
																<?php
																}
																?>
															</td>
														</tr>
													<?php } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>No</th>
														<th>Codes</th>
														<th>Status</th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-xxl-4 m-b-30">
								<div class="card card-statistics h-100 mb-0">
									<div class="card-header d-flex justify-content-between">
										<div class="card-heading">
											<h4 class="card-title">User Activity</h4>
										</div>
									</div>
									<div class="card-body">
										<ul class="activity">
											<?php
											foreach ($history->result() as $hs) {
												date_default_timezone_set("Asia/Bangkok");
												$skrng = strtotime("now");
												$create = $skrng - $hs->date;
											?>
												<li class="activity-item success">
													<div class="activity-info">
														<h5 class="mb-0"><?= $hs->history ?></h5>
														<span>
															<?= $get->get_time_ago(time() - $create) ?>
														</span>
													</div>
												</li>
											<?php } ?>
										</ul>
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
