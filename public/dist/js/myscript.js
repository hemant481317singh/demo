$('#categorylist').on('change',function(){
	var id= $(this).val();
	$.get("products/create/" + id , function(data){
		$('#producttypelist').empty();
		$.each(data,function(index,producttypelist){
			$('#producttypelist').append('<option value="' + producttypelist.id + '">' + producttypelist.title+ '</option>');
		});
	});
});