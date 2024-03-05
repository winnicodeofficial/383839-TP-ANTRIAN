var currency = document.querySelectorAll('.currency');
currency.forEach(function(element) {
	element.addEventListener('keyup', function(e) {
		element.value = angkaKeRupiah(this.value);
	});
});

function rupiahKeAngka(angka) {
    var number = Number(angka.replace(/[.,\s]+/g,""));
	return number;
}

function angkaKeRupiah(angka, prefix) {
    var number_string = angka.toString().replace(/[^,\d]/g, ''),
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