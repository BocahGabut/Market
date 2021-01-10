var keyword = document.getElementById('zxce');
var container = document.getElementById('res__');

keyword.addEventListener('keyup', function () {

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            container.innerHTML = ajax.responseText;
			console.log(keyword.value)
		}
    }
	
    ajax.open('GET', 'get_data/' + keyword.value, true);
    ajax.send();
	
	// console.log(keyword.value)
});
