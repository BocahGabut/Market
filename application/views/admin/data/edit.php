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
												<li class="breadcrumb-item">
													Product
												</li>
												<li class="breadcrumb-item active text-primary" aria-current="page"><?= $title ?></li>
											</ol>
										</nav>
									</div>
								</div>
								<!-- end page title -->
							</div>
							<div class="col-12">
								<form action="<?= base_url() . 'admin/product/update/' . $this->uri->segment('4') ?>" method="POST" enctype="multipart/form-data">
									<div class="card card-statistic">
										<div class="card-header">
											<div class="card-heading">
												<h5 class="card-title">Product</h5>
											</div>
										</div>
										<div class="card-body">
											<?php
											if ($product->num_rows() > 0) {
											?>
												<?php
												foreach ($product->result() as $u) {
												?>
													<div class="col-md-12 mb-2">
														<h5>Ket :
															<small class=" text-danger">( * ) Harus Di Isi</small>
														</h5>
													</div>
													<div class="form-group col-md-12">
														<label>Nama Product</label>
														<small class=" text-danger"> *</small>
														<input type="text" required name="prod_name" class="form-control" value="<?= $u->prod_nama ?>">
													</div>
													<div class="form-group col-md-12">
														<label>Harga Product (Rp.)</label>
														<small class=" text-danger"> *</small>
														<input id="price_prod" type="text" required name="prod_price" class="form-control" value="<?= $u->prod_price ?>">
													</div>
													<div class=" form-group col-md-12">
														<label>Berat Product (g)</label>
														<small class=" text-danger"> *</small>
														<input type="number" required class="form-control" name="prod_weight" value="<?= $u->prod_weight ?>">
													</div>
													<div class="form-group col-md-12">
														<label>Product Unit</label>
														<small class=" text-danger"> *</small>
														<select class="form-control" required name="prod_unit">
															<option selected value="<?= $u->prod_unit ?>"><?= $u->prod_unit . '  ( Selected )' ?></option>
															<option value="Unit">Unit</option>
															<option value="Kotak">Kotak</option>
															<option value="Botol">Botol</option>
															<option value="Butir">Butir</option>
															<option value="Buah">Buah</option>
															<option value="Biji">Biji</option>
															<option value="Sachet">Sachet</option>
															<option value="Bks">Bks</option>
															<option value="Roll">Roll</option>
															<option value="PCS">PCS</option>
															<option value="Box">Box</option>
															<option value="Meter">Meter</option>
															<option value="Centimeter">Centimeter</option>
															<option value="Liter">Liter</option>
															<option value="CC">CC</option>
															<option value="Mililiter">Mililiter</option>
															<option value="Lusin">Lusin</option>
															<option value="Gross">Gross</option>
															<option value="Kodi">Kodi</option>
															<option value="Rim">Rim</option>
															<option value="Dozen">Dozen</option>
															<option value="Kaleng">Kaleng</option>
															<option value="Lembar">Lembar</option>
															<option value="Helai">Helai</option>
															<option value="Gram">Gram</option>
															<option value="Kilogram">Kilogram</option>
														</select>
													</div>
													<div class="form-group col-md-12">
														<label>Kondisi Product</label>
														<small class=" text-danger"> *</small>
														<select name="kondisi" class="form-control" required>
															<option selected value="<?= $u->kondisi ?>"><?= $u->kondisi . '  ( Selected )' ?></option>
															<option value="New">New</option>
															<option value="Second">Second</option>
														</select>
													</div>
													<div class="form-group col-md-12">
														<label>Asuransi Product</label>
														<small class=" text-danger"> *</small>
														<select name="asuransi" class="form-control" required>
															<option selected value="<?= $u->asuransi ?>"><?= $u->asuransi . '  ( Selected )' ?></option>
															<option value="Ya">Ya</option>
															<option value="Tidak">Tidak</option>
															<option value="Optional">Optional</option>
														</select>
													</div>
													<div class="form-group col-md-12">
														<label>Stock Product </label>
														<small class=" text-danger"> *</small>
														<input type="number" required name="prod_stock" class="form-control" value="<?= $u->stock ?>">
													</div>
													<div class="form-group col-md-12">
														<label>Merk Product </label>
														<input name="prod_merk" type="text" class="form-control" value="<?= $u->merk ?>">
													</div>
													<div class="col-md-12 mb-1">
														<div id="preview_image">
															<div class="">
																<img id="img_preview_edit" class="img-db " src="<?= base_url() . 'assets/template/data-img/thumb-img/' . $u->thumb_image ?>" alt="gallery-img">
															</div>
														</div>
													</div>
													<input type="text" hidden value="<?= $u->thumb_image ?>" readonly name="old_image">
													<input type="text" hidden id="new_image" readonly name="new_image">
													<div class="col-md-12 form-grup">
														<label>Cover Image</label>
														<small class=" text-danger"> *</small>
														<div class="input-group mb-3">
															<div class="custom-file">
																<input onchange="previewImageEdit();" id="image-source-edit" type="file" class="form-control" name="file" />
															</div>
														</div>
													</div>
													<div class="col-md-12 form-grup">
														<label>Deskripsi Product</label>
														<small class=" text-danger"> *</small>
														<textarea class="form-control" id="description" name="description"><?= $u->description ?></textarea>
													</div>
													<div class="col-12 mt-3">
														<?php

														$where = array(
															'product' => $this->uri->segment('4')
														);
														$varian = $this->model->show_data('prod_optional', null, null, $where);

														if ($varian->num_rows() > 0) {
														?>
															<?php
															foreach ($varian->result() as $p) {
															?>
																<div class="row ">
																	<div class="form-group col-md-12">
																		<label>Bentuk Product </label>
																		<select name="prod_bnt" class="form-control">
																			<option value="<?= $p->bentuk ?>" selected><?= $p->bentuk . '  ( Selected ) ' ?></option>
																			<option value="cream">Cream</option>
																			<option value="gel">Gel</option>
																			<option value="capsul">Capsul</option>
																			<option value="lotion">Lotion</option>
																		</select>
																	</div>
																	<div class="form-group col-md-12">
																		<label>Kadaluarsa Product</label>
																		<input name="prod_expired" class="form-control " type="date" value="<?= $p->kadaluarsa ?>">
																	</div>
																	<div class="form-group col-md-12">
																		<label>Lama Simpan Product (Hari)</label>
																		<input type="number" name="prod_lsp" class="form-control" value="<?= $p->lama_simpan ?>">
																	</div>
																	<div class="form-group col-md-12">
																		<label>Ket Simpan Product </label>
																		<input type="text" name="prod_ksp" class="form-control" value="<?= $p->ket_simpan ?>">
																	</div>
																</div>

															<?php } ?>
														<?php } else { ?>
															<div class="row ">
																<div class="form-group col-md-12">
																	<label>Bentuk Product </label>
																	<select name="prod_bnt" class="form-control">
																		<option disabled selected>~~ Silahkan Pilih ~~</option>
																		<option value="cream">Cream</option>
																		<option value="gel">Gel</option>
																		<option value="capsul">Capsul</option>
																		<option value="lotion">Lotion</option>
																	</select>
																</div>
																<div class="form-group col-md-12">
																	<label>Kadaluarsa Product</label>
																	<input name="prod_expired" class="form-control date-picker-default" type="date">
																</div>
																<div class="form-group col-md-12">
																	<label>Lama Simpan Product (Hari)</label>
																	<input type="number" name="prod_lsp" class="form-control">
																</div>
																<div class="form-group col-md-12">
																	<label>Ket Simpan Product </label>
																	<input type="text" name="prod_ksp" class="form-control">
																</div>
															</div>

														<?php } ?>
													</div>
													<div class="col-md-12">
														<input type="submit" name="submit" value="Update" class="col-md-12 btn btn-outline-success" />
													</div>
												<?php } ?>
											<?php } else { ?>
												<div class="text-error">
													<h4>No data available in list</h4>
												</div>
											<?php } ?>
										</div>
									</div>
								</form>
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
				height: 300,
				theme: 'silver',
				mobile: {
					theme: 'mobile',
					plugins: 'autosave lists',
					toolbar: 'undo bold italic'
				}
			});

			var price = document.getElementById('price_prod');

			function formatRupiah(angka, prefix) {
				var number_string = angka.replace(/[^,\d]/g, '').toString(),
					split = number_string.split(','),
					sisa = split[0].length % 3,
					rupiah = split[0].substr(0, sisa),
					ribuan = split[0].substr(sisa).match(/\d{3}/gi);

				if (ribuan) {
					separator = sisa ? '.' : '';
					rupiah += separator + ribuan.join('.');
				}

				rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
				return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
			}

			price.addEventListener('keyup', function(e) {
				price.value = formatRupiah(this.value);
			});
		</script>
