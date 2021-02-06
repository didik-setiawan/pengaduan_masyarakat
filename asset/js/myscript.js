const trueflash = $('.trueflash').data('trueflash');
if(trueflash){
	Swal.fire({
		icon : 'success',
		title : 'Berhasil',
		text : trueflash
	});
}

const falseflash = $('.falseflash').data('falseflash');
if(falseflash){
	Swal.fire({
		icon : 'error',
		title : 'Gagal',
		text : falseflash
	});
}

const tombol_hapus = $('.tombol-hapus').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title : 'Apakah anda yakin?',
		text : 'Akan menghapus data ini secara permanen?',
		icon : 'warning',
		showCancelButton : true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor : '#d33',
		confirmButtonText : 'Hapus'
 	}).then((result) => {
 		if(result.value){
 			document.location.href = href;
 		}
 	});
});

$('.edit_level_petugas').on('click', function(){
	const idpetugas = $(this).data('id');
	$.ajax({
		url : 'http://localhost/pengaduan/master/getPetugasId/',
		data : {id : idpetugas},
		method : 'POST',
		dataType : 'json',
		success : function(d){
			$('#nama').html(d.nama);
			$('#username').html(d.username);
			$('#level').val(d.level);
			$('#id_petugas').val(d.id_admin);
		}
	});

});

$('.logout').on('click', function(e){
	e.preventDefault();
	const ref = $(this).attr('href');
	Swal.fire({
		title : 'Apakah anda ingin logout?',
		text : 'Jika anda logout maka session akan terhapus',
		icon : 'warning',
		showCancelButton : true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor : '#d33',
		confirmButtonText : 'Logout'
 	}).then((result) => {
 		if(result.value){
 			document.location.href = ref;
 		}
 	});
});