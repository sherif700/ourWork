
//var htmltxt;
var lastid;
$(function() {	
		$.ajax({
			url: 'server.php',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			console.log(response);
			 var htmltxt = "<table border='2'>";
			 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	htmltxt += "<tr id='"+response[i].product_id+"'><td>"+response[i].product_id+"</td><td>"+response[i].product_name+"</td><td>"+response[i].product_desc+"</td><td>"+response[i].price+"</td><td>"+response[i].quantity+"</td><td>"+response[i].sub_cat_id+"</td><td>"+response[i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
			 htmltxt +="</table>";
			 htmltxt +="<input type='button' value='insert'/>";
			$('#data').html(htmltxt);
		})
		.fail(function() {
			console.log("error");
		});
	

	 $('body').on('click',"input[value='Delete']",function(event){
	 //body...
	 	console.log(1);
	 	$.ajax({
	 		url: 'server.php?id='+$(this).attr("name")+'&value='+$(this).val()+'',
	 		type: 'GET',
	 		dataType: 'json'
	 	})
	 	.done(function(response) {
	 		 var htmltxt = "<table border='2'>";
	 		 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	htmltxt += "<tr id='"+response[i].product_id+"'><td>"+response[i].product_id+"</td><td>"+response[i].product_name+"</td><td>"+response[i].product_desc+"</td><td>"+response[i].price+"</td><td>"+response[i].quantity+"</td><td>"+response[i].sub_cat_id+"</td><td>"+response[i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
	 		 htmltxt +="</table>";
	 		 htmltxt +="<input type='button' value='insert'/>";
	 		$('#data').html(htmltxt);
	 	})
	 	.fail(function() {
	 		console.log("error");
	 	})
	 });




	 $('body').on('click',"input[value='Edit']",function(event){
	 	 //body...
	 	 var cat_id;
	 	 var sub_cat_id;
	 	 	$.ajax({
			url: 'server.php?id='+$(this).attr("name")+'&value='+$(this).val()+'',
			type: 'GET',
			dataType: 'json',
			async: false
			})
			.done(function(response) {
				console.log(response);
			 	cat_id=response.category_id;
			 	sub_cat_id = response.sub_cat_id;
			 	console.log(cat_id);
			 	console.log(sub_cat_id);
			})
			.fail(function() {
				console.log("error");
			});


	 	 if(lastid!=null)
	 	 {
	 	 	$.ajax({
			url: 'server.php?id='+lastid+'&value='+$(this).val()+'',
			type: 'GET',
			dataType: 'json',
			async: false
		})
		.done(function(response) {
			console.log(response);
			 	var htmltxt = "<td>"+response.product_id+"</td><td>"+response.product_name+"</td><td>"+response.product_desc+"</td><td>"+response.product_price+"</td><td>"+response.product_quantity+
			 	"</td><td>"+response.sub_cat_id+"</td><td>"+response.category_id+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response.product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response.product_id+"'/></td>";
			 	$('#'+lastid).html(htmltxt);
			 	
		})
		.fail(function() {
			console.log("error");
		});
	 	}
	 	//change the data to form 
	 	var name =$('#'+$(this).attr("name")+' td:eq(1)').html();
		var desc = $('#'+$(this).attr("name")+' td:eq(2)').html();
		var price = $('#'+$(this).attr("name")+' td:eq(3)').html();
		var quantity = $('#'+$(this).attr("name")+' td:eq(4)').html();
		
	 	$('#'+$(this).attr("name")+' td:eq(1)').html('<input type="text" name="name" value="'+name+'"/><span></span>');
	 	$('#'+$(this).attr("name")+' td:eq(2)').html('<input type="text" name="desc" value="'+desc+'"/><span></span>');
	 	$('#'+$(this).attr("name")+' td:eq(3)').html('<input type="text" name="price" value="'+price+'"/><span></span>');
	 	$('#'+$(this).attr("name")+' td:eq(4)').html('<input type="text" name="quantity" value="'+quantity+'"/><span></span>');
	 	$('#'+$(this).attr("name")+' td:eq(5)').html('<select id="subcat"></select>'           );
	 	$('#'+$(this).attr("name")+' td:eq(6)').html('<select id="cat"></select>'              );
	 	$(this).val('Update');
	 	 lastid = $(this).attr("name");

	 	 




			 	//category dropdown
			 	$.ajax({
			 		url: 'cat_server.php',
			 		type: 'GET',
			 		dataType: 'json'
			 	})
			 	.done(function(response){
			 		console.log(response);
			 		var htmltxt='';
			 		for(var i in response)
			 		{
			 			console.log(response[i].category_id);
			 			htmltxt+="<option value='"+response[i].category_id+"'>"+response[i].category_name+"</option>"
			 		}
			 		$('#cat').html(htmltxt);
			 		$('#cat option[value="'+cat_id+'"]').attr('selected', true);
			 	
			 	})
			 	.fail(function(){
			 		console.log("error");
			 	});
			 	//sub-category dropdown
			 	$.ajax({
			 		url: 'cat_server.php?cat='+cat_id+'',
			 		type: 'GET',
			 		dataType: 'json',
			 		async:false
			 	})
			 	.done(function(response){
			 		console.log(response);
			 		var htmltxt='';
			 		for(var i in response)
			 		{
			 			htmltxt+="<option value='"+response[i].sub_cat_id+"'>"+response[i].sub_cat_name+"</option>"
			 		}
			 		$('#subcat').html(htmltxt);
			 		$('#subcat option[value="'+sub_cat_id+'"]').attr('selected',true);
			 	})
			 	.fail(function(){
			 		console.log("error");
			 	});



	 });


	$('body').on('change','#cat',function(event){
		// body...
			$.ajax({
			 		url: 'cat_server.php?cat='+$(this).val()+'',
			 		type: 'GET',
			 		dataType: 'json',
			 		async:false
			 	})
			 	.done(function(response){
			 		console.log(response);
			 		var htmltxt='';
			 		for(var i in response)
			 		{
			 			htmltxt+="<option value='"+response[i].sub_cat_id+"'>"+response[i].sub_cat_name+"</option>"
			 		}
			 		$('#subcat').html(htmltxt);
			 		
			 	})
			 	.fail(function(){
			 		console.log("error");
			 	});
	})





	$('body').on('click',"input[value='Update']",function(event){
		// body...
		var name=$('input[name="name"]').val();
		if(name=='')
		{
			$('input[name="name"] + span').html('*');
			return;
		}

		var desc=$('input[name="desc"]').val();
		if(desc=='')
		{
			$('input[name="desc"] + span').html('*');
			return;
		}

		var price=$('input[name="price"]').val();
		var pat = '^([0-9]*.[0-9]+|[0-9]+)$';
		if(!price.match(pat))
		{
			$('input[name="price"] + span').html('*');
			return;
		}
		var quantity=$('input[name="quantity"]').val();
		var pat1 = '^[0-9]$';
		if(!quantity.match(pat1))
		{
			$('input[name="quantity"] + span').html('*');
			return;
		}
		var cat=$('#cat').val();
		var sub=$('#subcat').val();
		//console.log('the value of cat dropdown is'+cat);
		console.log(price);
		$.ajax({
			url: 'server.php?id='+$(this).attr("name")+'&value='+$(this).val()+'&name='+name+'&desc='+desc+'&price='+price+'&quantity='+quantity+'&sub='+sub+'&cat='+cat+'',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			 var htmltxt = "<table border='2'>";
			 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	htmltxt += "<tr id='"+response[i].product_id+"'><td>"+response[i].product_id+"</td><td>"+response[i].product_name+"</td><td>"+response[i].product_desc+"</td><td>"+response[i].price+"</td><td>"+response[i].quantity+"</td><td>"+response[i].sub_cat_id+"</td><td>"+response[i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
			 htmltxt +="</table>";
			 htmltxt +="<input type='button' value='insert'/>";
			$('#data').html(htmltxt);
		})
		.fail(function() {
			console.log("error");
		})
	});

	
	$('body').on('click',"input[value='insert']",function(event){
		// body...
		$('table').append('<tr><td colspan="2"><input type="text" value="name"/><span></span></td><td><input type="text" value="description"/><span></span></td><td><input type="text" value="price"/><span></span></td><td><input type="text" value="quantity"/><span></span></td><td><select id="subcat"></select></td><td><select id="cat"></select></td><td><input type="button" value="Add_Item"/></td><td><input type="button" value="Cancel"/></td></tr>');

		// dropdown for the insert operation
		$.ajax({
			 		url: 'cat_server.php',
			 		type: 'GET',
			 		dataType: 'json'
			 	})
			 	.done(function(response){
			 		console.log(response);
			 		var htmltxt='';
			 		for(var i in response)
			 		{
			 			htmltxt+="<option value='"+response[i].category_id+"'>"+response[i].category_name+"</option>"
			 		}
			 		$('#cat').html(htmltxt);
			 	})
			 	.fail(function(){
			 		console.log("error");
			 	});

		//subcategory dropdown for the insert 
		$.ajax({
			 		url: 'cat_server.php?cat=1',
			 		type: 'GET',
			 		dataType: 'json',
			 		async:false
			 	})
			 	.done(function(response){
			 		console.log(response);
			 		var htmltxt='';
			 		for(var i in response)
			 		{
			 			htmltxt+="<option value='"+response[i].sub_cat_id+"'>"+response[i].sub_cat_name+"</option>"
			 		}
			 		$('#subcat').html(htmltxt);
			 		
			 	})
			 	.fail(function(){
			 		console.log("error");
			 	});
	});




//cancel the insert operation
$('body').on('click','input[value="Cancel"]',function(event){
	// body...
	$.ajax({
			url: 'server.php',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			console.log(response);
			 var htmltxt = "<table border='2'>";
			 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	htmltxt += "<tr id='"+response[i].product_id+"'><td>"+response[i].product_id+"</td><td>"+response[i].product_name+"</td><td>"+response[i].product_desc+"</td><td>"+response[i].price+"</td><td>"+response[i].quantity+"</td><td>"+response[i].sub_cat_id+"</td><td>"+response[i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
			 htmltxt +="</table>";
			 htmltxt +="<input type='button' value='insert'/>";
			$('#data').html(htmltxt);
		})
		.fail(function() {
			console.log("error");
		});
})








	$('body').on('click','input[value="Add_Item"]',function(event){
		// body...
		var name=$('input[value="name"]').val();
		var desc=$('input[value="description"]').val();
		var price=$('input[value="price"]').val();
		var quantity=$('input[value="quantity"]').val();
		if(name=='')
		{
			$('input[value="name"] + span').html('*');
			return;
		}
		if(desc=='')
		{
			$('input[value="description"] + span').html('*');
			return;
		}
		var pat = '^([0-9]*.[0-9]+|[0-9]+)$';
		var pat1 = '^[0-9]$';
		if(!price.match(pat))
		{
			$('input[value="price"] + span').html('*');
			return;
		}
		if(!quantity.match(pat1))
		{
			$('input[value="quantity"] + span').html('*');
			return;
		}
		var sub=$('#cat').val();
		var cat=$('#subcat').val();
		$.ajax({
			url: 'server.php?value='+$(this).val()+'&name='+name+'&desc='+desc+'&price='+price+'&quantity='+quantity+'&sub='+sub+'&cat='+cat+'',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			 var htmltxt = "<table border='2'>";
			 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	htmltxt += "<tr id='"+response[i].product_id+"'><td>"+response[i].product_id+"</td><td>"+response[i].product_name+"</td><td>"+response[i].product_desc+"</td><td>"+response[i].price+"</td><td>"+response[i].quantity+"</td><td>"+response[i].sub_cat_id+"</td><td>"+response[i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
			 htmltxt +="</table>";
			 htmltxt +="<input type='button' value='insert'/>";
			$('#data').html(htmltxt);
		})
		.fail(function() {
			console.log("error");
		})
	});



});