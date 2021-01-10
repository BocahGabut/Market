var cleave = new Cleave('.wa-number', {
	delimiter: ' ',
	blocks: [2, 3, 3, 3, 3],
	uppercase: true
});

const load_phone = () => {
	$.ajax({
		url: "https://restcountries.eu/rest/v2/regionalbloc/ASEAN ",
		type: "get",
		dataType: 'json',
		success: function (response) {
			let city = response;
			$.each(city, function (i, data) {
				$('#phone_code').append(`
					<option value="( + ` + data.callingCodes + ` )" > ( + ` + data.callingCodes + ` )</option>
				`);
				// console.log(data.nama)
			});
		}
	});
}

function load_province() {
	$.ajax({
		url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
		type: "get",
		dataType: 'json',
		success: function (response) {
			let city = response.provinsi;
			$.each(city, function (i, data) {
				$('#province-id').append(`
					<option value="` + data.id + `" >` + data.nama + `</option>
				`);
				// console.log(data.nama)
			});
		}
	});
}

function load_city(id) {
	$.ajax({
		url: "https://dev.farizdotid.com/api/daerahindonesia/kota?",
		type: "get",
		data: {
			id_provinsi: id
		},
		dataType: 'json',
		success: function (response) {
			let city = response.kota_kabupaten;
			$.each(city, function (i, data) {
				// var str = data.nama
				// var res = str.replace(/kota|Kabupaten /g, '')
				$('#city-id').append(`
					<option value="` + data.id + `" >` + data.nama + `</option>
				`);
				// console.log(res)
			});
		}
	});

}

function detail_provincy(id){
	$.ajax({
		url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi/" + id,
		dataType: 'json',
		success: function (response) {
			$('#province-id').append(`
					<option value="` + response.id + `" >` + response.nama + `</option>
				`);
			// console.log(response.nama)
			// });
		}
	});
}

function detail_city(id) {
	$.ajax({
		url: "https://dev.farizdotid.com/api/daerahindonesia/kota/" + id,
		dataType: 'json',
		success: function (response) {
			$('#city-id').append(`
					<option value="` + response.id + `" >` + response.nama + `</option>
				`);
			// console.log(response.nama)
			// });
		}
	});

}

function detail_district(id) {
	$.ajax({
		url: "http://dev.farizdotid.com/api/daerahindonesia/kecamatan/" + id,
		dataType: 'json',
		success: function (response) {
			$('#sub-id').append(`
					<option value="` + response.id + `" >` + response.nama + `</option>
				`);
			// console.log(response.nama)
			// });
		}
	});
}

function convert_district(id) {
	$.ajax({
		url: "http://dev.farizdotid.com/api/daerahindonesia/kecamatan/" + id,
		dataType: 'json',
		success: function (response) {
			$('#convert-sub').val(response.nama)
			// console.log(response.nama)
			// return response.id
		}
	});
}

function load_distric(id) {
	$.ajax({
		url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?",
		type: "get",
		data: {
			id_kota: id
		},
		dataType: 'json',
		success: function (response) {
			let city = response.kecamatan;
			$.each(city, function (i, data) {
				// var str = data.id + ' ' + data.nama;
				// var res = str.substring(5, 0);
				$('#sub-id').append(`
					<option value="` + data.id + `" >` + data.nama + `</option>
				`);
				// console.log(str)
			});
		}
	});

}

function load_zip(id) {
	$.ajax({
		url: "account/get_poscode/" + id,
		type: "get",
		dataType: 'json',
		success: function (response) {
			let pos = response.data;
			$.each(pos, function (i, data_zip) {
				$('#zip-id').append(`
					<option value="` + data_zip.postalcode + `" >` + data_zip.urban + ` -> ` + data_zip.postalcode + `</option>
				`);
				// console.log(data_zip.postalcode)
			});
		}
	});
}

load_province()
load_phone()

$('#province-id').on('change', function () {
	var id = document.getElementById('province-id').value;
	$('#city-id').html('');
	load_city(id)
});

$('#city-id').on('change', function () {
	var id = document.getElementById('city-id').value;
	$('#sub-id').html('');
	load_distric(id)
});
