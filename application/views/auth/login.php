<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta content="Potenz Global Solutions" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="mobile-web-app-capable" content="yes">
	<!-- app favicon -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/template/') ?>img/favicon.ico">
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<!-- plugin stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/template/') ?>css/vendors.css" />
	<!-- app style -->
	<link href="<?php echo base_url('assets/template/') ?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/template/') ?>css/custom.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.tiny.cloud/1/3c9u2a5btj33eisnohk2ody6zfniaz88zih7gd8jkechddka/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

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

			<!--start login contant-->
			<div class="app-contant">
				<div class="bg-white">
					<div class="container-fluid p-0">
						<div class="row no-gutters">
							<div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
								<div class="d-flex align-items-center h-100-vh">
									<div class="login p-50">
										<h1 class="mb-2">Hii Have A Nice Day</h1>
										<p>Welcome back, please login to your account.</p>
										<?php echo $this->session->flashdata('message') ?>
										<form action="<?= base_url() . 'auth/login/verif' ?>" class="mt-3 mt-sm-5" method="POST">
											<div class="row">
												<div class="col-12">
													<div class="form-group">
														<label class="control-label">User Name*</label>
														<input type="text" class="form-control" placeholder="Username" name="username" required />
													</div>
												</div>
												<div class="col-12 mb-3">
													<label class="control-label">Password*</label>
													<div class="input-group">
														<input type="password" class="form-control" placeholder="Password" name="password" id="pass-input" required>
														<div class="input-group-append" id="button-addon4">
															<button id="pass" class="btn btn-light" type="button"><i class="fa-pass fa fa-eye"></i></button>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="d-block  ">
														<a href="javascript:void(0);" class="ml-auto">Forgot Password ?</a>
													</div>
												</div>
												<div class="col-12 mt-3">
													<input type="submit" name="login" value="Log In" class="btn btn-primary text-uppercase"></input>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
								<div class="row align-items-center h-100">
									<div class="col-7 mx-auto ">
										<img class="img-fluid" src="<?= base_url() . 'assets/template/img/undraw_personal_text_vkd8.svg' ?>" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end login contant-->
		</div>
	</div>
	<script src="<?php echo base_url('assets/template/') ?>js/vendors.js"></script>
	<script src="<?php echo base_url('assets/template/') ?>js/app.js"></script>
	<script src="<?php echo base_url('assets/template/') ?>js/custom.js"></script>

	<script>
		const toggle = () => {
			var txtpass = document.getElementById("pass-input");
			var icon = document.querySelector(".fa-pass");

			if (txtpass.type == 'password') {
				txtpass.setAttribute("type", "text");
				icon.classList.remove("fa-eye");
				icon.classList.toggle("fa-eye-slash");
			} else {
				txtpass.setAttribute("type", "password");
				icon.classList.remove("fa-eye-slash");
				icon.classList.toggle("fa-eye");
			}
		}

		$('#pass').on('click', function() {
			toggle();
		});
	</script>

</body>

</html>
