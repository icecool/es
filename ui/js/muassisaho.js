$(document).ready(function(){

	function add_muassisa(){
		var xnamud = $('#Namud').val();
		var xname_ru = $('#NameRu').val();
		var xname_tj = $('#NameTj').val();
		var xdirector = $('#Director').val();
		var xaddress = $('#Address').val();
		var xphone = $('#Phone').val();
		var xcellphone = $('#Cellphone').val();
		$.post('./?c=muassisaho&act=ajax&do=add', {
			namud: xnamud,
			name_ru: xname_ru,
			name_tj: xname_tj,
			director: xdirector,
			address: xaddress,
			phone: xphone,
			cellphone: xcellphone,
			}, function(data){
				if(data=='ok'){
					window.location='./?c=muassisaho';
				} else {
					$('#myModal1Body').html(data);
				}
		});
	}

	$('#add_new_muassisa').click(function(){
		add_muassisa();
	});
});