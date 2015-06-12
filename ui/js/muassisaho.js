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

    $("#namudi_muassisa").change(function(){
        var namud=$(this).val();
        $.post("./?c=map&act=getmuassisabynamud",{ namud: namud}, function(data){
            var data = jQuery.parseJSON(data);
            console.log("data "+data.name_ru);
            $("#muassisa_list").empty();
            var html="";
            var markers = new Array();
            //$mks.='[ '.$v['geo_lng'].','.$v['geo_lat'].', "'.$v['name_ru'].'", "'.$v['director'].'", "'.$v['address'].'", "'.$v['phone'].'", "'.$v['namud'].'", "'.$v['muassisa_photo'].'"]';
            for(i=0;i<data.lat.length;i++) {
                markers[i] = new Array(data.lng[i], data.lat[i], data.name[i], data.director[i], data.address[i], data.phone[i], data.namud[i], data.muassisa_photo[i]);
                //console.log("name="+data.name[i]);
                html=html+'<li class="list-group-item"><a class="jump_to_location" data='+data.lat[i]+'~'+data.lng[i]+' href="#">'+data.name[i]+'</a></li>';
            }
            //console.log("our markerss :"+markers);
            $("#muassisa_list").html(html);

            map.remove();



                //[
                //[ 68.7438154220581,38.5791881170775, "Гимназияи кафолат", "Комил Рачабов", "NULL", "+992 92 707 84 14", "2", ""],
                //[ 68.75498414039612,38.526127656494396, "Гимназияи назди Донишгохи сохибкори ва хизмат", "", "NULL", "", "2", ""],
                //]

            init(markers, true);
        });

    });

    $("#muassisa_list").on("click",".jump_to_location",function(){
        var data = $(this).attr("data");
        console.log("clicked="+data);
        if (data.indexOf("~")!=-1){
            var lng = data.substr(0,data.indexOf("~"));
            var lat = data.substr(data.indexOf("~")+1);
            jump(lat, lng)
        }
    });

});