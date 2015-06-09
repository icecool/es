$(document).ready(function(){

	function group_add(){
		var xgroupname = $('#groupname').val();
		$.post('./?c=user&act=ajax&do=addgroup', {
			groupname: xgroupname,
			}, function(data){
				if(data=='ok'){
					window.location='./?c=user&act=groups';
				} else {
					alert('При добавлении возникла ошибка');
					alert(data);
				}
		});
	}

	$('#group_add').click(function(){
		group_add();
	});

	$('.del').click(function(){
		var xid = $(this).parent('td').attr('rel');
		if(confirm('Вы действительно хотите удалить данный элемент?')){
			$.post('./?c=user&act=ajax&do=delgroup', { id: xid }, function(data){
					if(data=='ok'){
						window.location='./?c=user&act=groups';
					} else {
						//alert(data);
						alert('Возникла ошибка при удалении');
					}
			});
		}
	});

	$('.edit').click(function(){
		alert('edit =)');
	});


});