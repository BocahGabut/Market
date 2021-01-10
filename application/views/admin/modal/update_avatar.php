<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="<?= base_url() . 'admin/account/upload/'; ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 mb-2">
							<div id="preview_image">
								<div class="">
									<img id="img_preview" class="img-db" src="https://cdn.pixabay.com/photo/2017/01/10/03/54/icon-1968246_960_720.png" alt="gallery-img">
								</div>
							</div>
						</div>
						<div class="col-md-12 form-grup">
							<div class="input-group mb-3">
								<div class="custom-file">
									<input required onchange="previewImage();" id="image-source" type="file" class="form-control" name="file" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Upload</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url() . 'admin/account/password/' ?>" method="POST">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 form-grup mb-2">
							<label>Password Old</label>
							<input class="form-control" required name="old_pass" type="password" />
						</div>
						<div class="col-md-12 form-grup">
							<label>New Password</label>
							<input class="form-control" required name="new_pass" type="password" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Upload</button>
				</div>
			</form>
		</div>
	</div>
</div>
