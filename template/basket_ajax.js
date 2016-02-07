$(function() {
	// body...
	$('input[type="number"]').on('input',function(event){
		// body...
		var quantity = $(this).val();
		var aaa = $(this).attr('name');
		if(quantity<=0)
		{
			$(this).value=1;
		}

		$.ajax({
			url: 'cart_server.php?one_product='+$(this).attr('name')+'&q='+$(this).val()+'',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			console.log(response);
			
			$("."+aaa+"").html(quantity*response['price']);	
		})
		.fail(function() {
			console.log("error");
		})
	})
});