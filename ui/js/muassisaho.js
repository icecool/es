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
					//$('#myModal1Body').html(data);
					alert(data);
				}
		});
	}

	$('#muassisa_add').click(function(){
		add_muassisa();
	});

	$('.muassisa_del').click(function(){
		var xid = $(this).parent('td').attr('rel');
		//alert('Заглушка для удаления элемента '+xid);
		if(confirm('Вы действительно хотите удалить данный элемент?')){
			$.post('./?c=muassisaho&act=ajax&do=del', { id: xid }, function(data){
					if(data=='ok'){
						window.location='./?c=muassisaho';
					} else {
						//alert(data);
						alert('Возникла ошибка при удалении');
					}
			});
		}
	});

	$('.muassisa_edit').click(function(){
		alert('Заглушка для редактирования элемента');
	});

});