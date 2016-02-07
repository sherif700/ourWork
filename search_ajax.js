var arr = [];
$(function() {
	// body...
	
		// body...
		$.ajax({
			url: 'server.php',
			type: 'POST',
			dataType: 'json',
			data: {param: $('#tags').val()},
		})
		.done(function(response) {
			console.log(response);
			var count =0;
			for(var i in response)
			{
				arr[count]=response[i].product_name;
				count++;
			}
		})
		.fail(function() {
			console.log("error");
		})
	
	$( "#tags" ).autocomplete({
		source: arr
	});



});