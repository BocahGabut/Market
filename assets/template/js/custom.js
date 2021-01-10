function delete_message(id, url, target) {
	event.preventDefault();
	Swal.fire({
		title: "Anda Yakin ?",
		text: "Akan Menghapus Data Ini !",
		type: "warning",
		showCancelButton: !0,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!",
		confirmButtonClass: "btn btn-primary",
		cancelButtonClass: "btn btn-danger ml-1",
		buttonsStyling: !1
	}).then(function (t) {
		t.value ? Swal.fire({
				type: "success",
				title: "Deleted!",
				text: "Data Berhasil Di Hapus",
				confirmButtonClass: "btn btn-success"
			}).then(function (succ) {
				$.ajax({
					url: url,
					type: "post",
					data: {
						id: id
					}
				});
				window.location.href = target;
			}) :
			t.dismiss === Swal.DismissReason.cancel && Swal.fire({
				title: "Cancelled",
				text: "Data Tidak Dihapus :)",
				type: "error",
				confirmButtonClass: "btn btn-success"
			})
	})
};

function save(url, target) {
	event.preventDefault();
	$.ajax({
		url: url,
		data: $('#form_save').serialize(),
		type: "post",
		cache: false,
		async: false,
		dataType: 'json',
		success: function (response) {
			Swal.fire({
				type: "success",
				title: "Success!",
				text: "Save Data Success",
				confirmButtonClass: "btn btn-success"
			}).then(function (t) {
				window.location.href = target;
			});
		}
	});
};

function update(url, target) {
	event.preventDefault();
	$.ajax({
		url: url,
		data: $('#form_update').serialize(),
		type: "post",
		async: false,
		dataType: 'json',
		success: function (response) {
			Swal.fire({
				type: "success",
				title: "Success!",
				text: "Update Data Success",
				confirmButtonClass: "btn btn-success"
			}).then(function (t) {
				window.location.href = target;
			});
		}
	});
};

function logout_message(target) {
	event.preventDefault();
	Swal.fire({
		title: "Anda Yakin ?",
		text: "Akan Logout ???",
		type: "warning",
		showCancelButton: !0,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, Logout!",
		confirmButtonClass: "btn btn-primary",
		cancelButtonClass: "btn btn-danger ml-1",
		buttonsStyling: !1
	}).then(function (t) {
		t.value ? Swal.fire({
				type: "success",
				text: "Logout Baerhasil :)",
				confirmButtonClass: "btn btn-success"
			}).then(function (succ) {
				window.location.href = target;
			}) :
			t.dismiss === Swal.DismissReason.cancel && Swal.fire({
				title: "Cancelled",
				text: "Logout Gagal :)",
				type: "error",
				confirmButtonClass: "btn btn-success"
			})
	})
};

function previewImage() {
	var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

	oFReader.onload = function (oFREvent) {
		document.getElementById("img_preview").src = oFREvent.target.result;
	};
};


function previewImageEdit() {
	var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("image-source-edit").files[0]);

	oFReader.onload = function (oFREvent) {
		document.getElementById("img_preview_edit").src = oFREvent.target.result;
		document.getElementById("new_image").value = oFREvent.target.result;
	};
};
