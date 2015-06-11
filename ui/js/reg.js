$(document).ready(function(){

	function show_muassisalist(){
		var xrayon = $('#rayon').val();
		var xnamud = $('#namud').val();
		$.get('./?c=reg&act=ajax&do=muassisalist&rayon='+xrayon+'&namud='+xnamud,function(data){
			$('#xmuassisalist').html(data);
		});
	}

	$('#rayon').change(function(){ show_muassisalist();	});

	$('#namud').change(function(){ show_muassisalist(); });

	function show_days(){
		var xmonth = $('#month').val();
		var xyear = $('#year').val();
		$.get('./?c=reg&act=ajax&do=monthdays&month='+xmonth+'&year='+xyear,function(data){
			$('#xdayslist').html(data);
		});
	}

	$('#month').change(function(){ show_days();	});

	$('#year').change(function(){ show_days(); });

});