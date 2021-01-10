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
								<div class="row account-contant">
									<div class="col-12">
										<div class="card card-statistics">
											<div class="card-body p-0">
												<div class="row no-gutters">
													<?php echo $this->session->flashdata('message') ?>
													<div class="col-xl-6 pb-xl-0 pb-5 border-right">
														<?php
														foreach ($seller->result() as $sl) {
															date_default_timezone_set("Asia/Bangkok");
															$skrng = strtotime("now");
															$create = $skrng - $sl->create_at;
														?>
															<div class="page-account-profil pt-5">
																<div class="profile-img text-center rounded-circle">
																	<div class="pt-5">
																		<div class="avatar m-auto">
																			<?php
																			if ($sl->sell_image == 'default') {
																			?>
																				<img src="https://www.iconfinder.com/data/icons/business-avatar-1/512/7_avatar-512.png" class="img-fluid" alt="users-avatar">
																			<?php } else { ?>
																				<img src="<?= base_url() . 'assets/template/data-img/user/' . $sl->sell_image ?>" class="img-fluid " alt="users-avatar">
																			<?php } ?>
																		</div>
																		<div class="profile-btn text-center">
																			<div><button data-toggle="modal" data-target="#upload" class="btn btn-primary mb-2 mt-3">Upload New Avatar</button></div>
																		</div>
																		<div class="profile-btn text-center">
																			<div><button data-toggle="modal" data-target="#pass" class="btn btn-danger mb-2">Change Password</button></div>
																		</div>
																		<div class="profile pt-4 mb-3">
																			<h4 class="mb-1"><?= $sl->sel_firstname . ' ' . $sl->sel_lastname ?></h4>
																			<p><?= 'Join at ' . $time->get_time_ago(time() - $create) ?></p>
																		</div>
																	</div>
																</div>
															</div>
														<?php } ?>
													</div>
													<div class="col-xl-6 col-md-6 col-12 border-t border-right">
														<div class="page-account-form">
															<div class="form-titel border-bottom p-3">
																<h5 class="mb-0 py-2">Edit Your Personal Settings</h5>
															</div>
															<div class="p-4">
																<form method="POST" action="<?= base_url() . 'admin/account/update' ?>">
																	<div class="form-row">
																		<div class="form-group col-md-6">
																			<label for="name1">First Name</label>
																			<input type="text" id="first" class="form-control" name="first">
																		</div>
																		<div class="form-group col-md-6">
																			<label for="name1">Last Name</label>
																			<input type="text" id="last" class="form-control" name="last">
																		</div>
																		<div class="form-group col-md-12">
																			<label for="name1">WhatsApp Number</label>
																			<div class="input-group">
																				<div class="input-group-prepend">
																					<select name="phone_code" id="phone_code" class="form-control">
																						<option selected disabled>Choose...</option>
																					</select>
																				</div>
																				<input type="text" class="form-control wa-number" aria-label="Text input with dropdown button" id="wa" name="wa">
																			</div>
																		</div>
																		<div class="form-group col-md-12">
																			<label for="username">Username</label>
																			<input type="text" id="username" class="form-control" name="username">
																		</div>
																	</div>
																	<div class="form-group">
																		<label for="add1">Email</label>
																		<input type="text" id="email" class="form-control" name="email">
																	</div>
																	<div class="form-group">
																		<label for="add1">Shop Name</label>
																		<input type="text" id="shopname" class="form-control" name="shopname">
																	</div>
																	<div class="form-group">
																		<label for="add1">Address</label>
																		<input type="text" id="address" class="form-control" name="address">
																	</div>

																	<div class="form-row">
																		<div class="form-group col-md-6">
																			<label for="province-id">province</label>
																			<select class="form-control" id="province-id" name="province">
																				<option selected disabled>Choose...</option>
																			</select>
																		</div>
																		<div class="form-group col-md-6">
																			<label for="city-id">City</label>
																			<select id="city-id" class="form-control" name="city">
																				<option selected disabled>Choose...</option>
																			</select>
																		</div>
																		<div class="form-group col-md-6">
																			<label for="sub-id">Sub District</label>
																			<select id="sub-id" class="form-control" name="district">
																				<option selected disabled>Choose...</option>
																			</select>
																		</div>
																		<!-- <div class="form-group col-md-6">
																	<label for="zip-id">Zip code</label>
																	<select id="zip-id" class="form-control" name="postal">
																		<option selected disabled>Choose...</option>
																	</select>
																</div> -->
																		<div class="form-group col-md-6">
																			<label for="name1">Postalcode</label>
																			<input type="number" id="zip-id" class="form-control" name="postal">
																		</div>
																	</div>
																	<input type="submit" value="Update Information" name="profile" class="btn btn-primary"></input>
																</form>
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
					</div>
				</div>
			</div>
		</div>

		<?php
		$this->load->view('admin/__lib/footer');
		$this->load->view('admin/modal/update_avatar');
		?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
		<script src="<?php echo base_url('assets/template/') ?>js/account.js"></script>
		<script>
			const account = () => {
				$.ajax({
					url: "<?= base_url() . 'admin/account/show' ?>",
					dataType: 'json',
					success: function(data) {
						var baris = '';
						for (var i = 0; i < data.length; i++) {
							document.getElementById("first").value = '' + data[i].sel_firstname;
							document.getElementById("last").value = '' + data[i].sel_lastname;
							document.getElementById("phone_code").value = '' + data[i].code_country;
							document.getElementById("wa").value = '' + data[i].number_wa;
							document.getElementById("username").value = '' + data[i].username;
							document.getElementById("email").value = '' + data[i].email;
							document.getElementById("shopname").value = '' + data[i].sell_shopname;
							document.getElementById("address").value = '' + data[i].address;
							detail_city(data[i].city)
							detail_district(data[i].sub_district)
							// detail_provincy(data[i].province)
							document.getElementById("province-id").value = '' + data[i].province;
							document.getElementById("city-id").value = '' + data[i].city;
							document.getElementById("sub-id").value = '' + data[i].sub_district;
							document.getElementById("zip-id").value = '' + data[i].postalcode;
						}
					}
				});
			}
			account()
		</script>
