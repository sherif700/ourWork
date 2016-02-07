
//var htmltxt;
var lastid;
$(function() {	
	$('span').hover(function() {
			    $('[data-toggle="tooltip"]').tooltip();
			/* Stuff to do when the mouse leaves the element */
	});


		$.ajax({
			url: 'server.php',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			console.log(response);
			
			
			var htmltxt = "<table border='2' class='table'>";
			 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	htmltxt += "<tr id='"+response[i].product_id+"'><td>"+response[i].product_id+"</td><td>"+response[i].product_name+"</td><td>"+response[i].product_desc+"</td><td>"+response[i].price+"</td><td>"+response[i].quantity+"</td><td>"+response[i].sub_cat_id+"</td><td>"+response[i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' class='btn btn-warning' value='Delete' name='"+response[i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' class='btn btn-primary' value='Edit' name='"+response[i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
			 htmltxt +="</table>";
			 htmltxt +="<input type='button' class='btn btn-primary col-md-6 col-md-offset-3' value='insert'/>";
			$('#data').html(htmltxt);
		})
		.fail(function() {
			console.log("error");
		});
	

	 $('body').on('click',"input[value='Delete']",function(event){
	 //body...
	    var mksure =  confirm("Are you sure you want to delete this item ?");
	    if(mksure)
	    {
	    		 	console.log(1);
	 	$.ajax({
	 		url: 'server.php?id='+$(this).attr("name")+'&value='+$(this).val()+'',
	 		type: 'GET',
	 		dataType: 'json'
	 	})
	 	.done(function(response) {
	 		//var htmltxt = "<table border='2' class='table'>";
			var htmltxt = "<table border='2' class='table'>";
			 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	htmltxt += "<tr id='"+response[i].product_id+"'><td>"+response[i].product_id+"</td><td>"+response[i].product_name+"</td><td>"+response[i].product_desc+"</td><td>"+response[i].price+"</td><td>"+response[i].quantity+"</td><td>"+response[i].sub_cat_id+"</td><td>"+response[i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' class='btn btn-warning' value='Delete' name='"+response[i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' class='btn btn-primary' value='Edit' name='"+response[i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
			 htmltxt +="</table>";
			 htmltxt +="<input type='button' class='btn btn-primary col-md-6 col-md-offset-3' value='insert'/>";
			$('#data').html(htmltxt);
	 	})
	 	.fail(function() {
	 		console.log("error");
	 	})
	    }

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
			 	htmltxt += "<td><input type='button' class='btn btn-warning' value='Delete' name='"+response.product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' class='btn btn-primary' value='Edit' name='"+response.product_id+"'/></td>";
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
		
	 	$('#'+$(this).attr("name")+' td:eq(1)').html('<input type="text" name="name" class="form-control" value="'+name+'"/>        <span data-toggle="tooltip"></span>');
	 	$('#'+$(this).attr("name")+' td:eq(2)').html('<input type="text" name="desc" class="form-control" value="'+desc+'"/>        <span data-toggle="tooltip"></span>');
	 	$('#'+$(this).attr("name")+' td:eq(3)').html('<input type="text" name="price" class="form-control" value="'+price+'"/>      <span data-toggle="tooltip"></span>');
	 	$('#'+$(this).attr("name")+' td:eq(4)').html('<input type="text" name="quantity" class="form-control" value="'+quantity+'"/><span data-toggle="tooltip"></span>');
	 	$('#'+$(this).attr("name")+' td:eq(5)').html('<select id="subcat" class="form-control"></select>'           );
	 	$('#'+$(this).attr("name")+' td:eq(6)').html('<select id="cat" class="form-control"></select>'              );
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
		lastid = '';
		var name=$('input[name="name"]').val();
	

		var desc=$('input[name="desc"]').val();
		

		var price=$('input[name="price"]').val();
		//var pat = '^([0-9]*.[0-9]+|[0-9]+)$';
		
		var quantity=$('input[name="quantity"]').val();
		//var pat1 = '^[0-9]$';
		
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
			console.log(response);
			var htmlrow ='';
			var htmltxt = "<table border='2' class='table'>";
			 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response[0])
			 {

			 	htmltxt += "<tr id='"+response[0][i].product_id+"'><td>"+response[0][i].product_id+"</td><td>"+response[0][i].product_name+"</td><td>"+response[0][i].product_desc+"</td><td>"+response[0][i].price+"</td><td>"+response[0][i].quantity+"</td><td>"+response[0][i].sub_cat_id+"</td><td>"+response[0][i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' class='btn btn-warning' value='Delete' name='"+response[0][i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' class='btn btn-primary' value='Edit' name='"+response[0][i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
			 htmltxt +="</table>";
			 htmltxt +="<input type='button' class='btn btn-primary col-md-6 col-md-offset-3' value='insert'/>";
			$('#data').html(htmltxt);

			//errors
			if(response[1]!='')
			{
			htmlrow ="<tr><td colspan='9'><div class='alert alert-danger'>";
			var anding = '';
			for(var i in response[1])
			 {
				 htmlrow +="<span class='btn'>"+anding+"<span>";
				 htmlrow +="<span class='btn'>"+response[1][i]+"<span>";
				 anding = "&";
			 }
			 htmlrow +="</div></td><tr>";
			 $('tr[id="'+response[1][response[1].length-1]+'"]').after(htmlrow);
			}
		})
		.fail(function() {
			console.log("error");
		})
	});

	



	$('body').on('click',"input[value='insert']",function(event){
		// body...
		$(this).prop('disabled',true);
		$('table').append('<tr><td colspan="2"><input type="text" class="form-control" name="in_name"/></td><td><input type="text" class="form-control" name="in_description"/></td><td><input type="text" class="form-control" name="in_price"/></td><td><input type="text" class="form-control" name="in_quantity"/></td><td><select id="subcat" class="form-control"></select></td><td><select id="cat" class="form-control"></select></td><td><input type="button" class="btn btn-warning" value="Cancel"/></td><td><input type="button" class="btn btn-primary" value="Add_Item"/></td></tr>');

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
		var htmltxt = "<table border='2' class='table'>";
			 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	htmltxt += "<tr id='"+response[i].product_id+"'><td>"+response[i].product_id+"</td><td>"+response[i].product_name+"</td><td>"+response[i].product_desc+"</td><td>"+response[i].price+"</td><td>"+response[i].quantity+"</td><td>"+response[i].sub_cat_id+"</td><td>"+response[i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' class='btn btn-warning' value='Delete' name='"+response[i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' class='btn btn-primary' value='Edit' name='"+response[i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
			 htmltxt +="</table>";
			 htmltxt +="<input type='button' class='btn btn-primary col-md-6 col-md-offset-3' value='insert'/>";
			$('#data').html(htmltxt);
		})
		.fail(function() {
			console.log("error");
		});
})

	$('body').on('click','input[value="Add_Item"]',function(event){
		// body...
		$('input[name="insert"]').prop('disabled',false);
		var name=$('input[name="in_name"]').val();
		var desc=$('input[name="in_description"]').val();
		var price=$('input[name="in_price"]').val();
		var quantity=$('input[name="in_quantity"]').val();
		var sub=$('#subcat').val();
		var cat=$('#cat').val();
		$.ajax({
			url: 'server.php?value='+$(this).val()+'&name='+name+'&desc='+desc+'&price='+price+'&quantity='+quantity+'&sub='+sub+'&cat='+cat+'',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
	        var htmltxt = "<table border='2' class='table'>";
			 htmltxt += "<tr><th>ID</th><th>product name</th><th>product description</th><th>product price</th><th>product quantity</th><th>sub id</th><th>cat id</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response[0])
			 {
			 	htmltxt += "<tr id='"+response[0][i].product_id+"'><td>"+response[0][i].product_id+"</td><td>"+response[0][i].product_name+"</td><td>"+response[0][i].product_desc+"</td><td>"+response[0][i].price+"</td><td>"+response[0][i].quantity+"</td><td>"+response[0][i].sub_cat_id+"</td><td>"+response[0][i].category_id+"</td>";	
			 	htmltxt += "<td><input type='button' class='btn btn-warning' value='Delete' name='"+response[0][i].product_id+"'/></td>";
			 	htmltxt += "<td><input type='button' class='btn btn-primary' value='Edit' name='"+response[0][i].product_id+"'/></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Delete</a></td>";
			 	// htmltxt += "<td><a href='#' name='"+response[i].id+"'>Update</a></td>";
			 	htmltxt += "</tr>";
			 }
			 htmltxt +="</table>";
			 htmltxt +="<input type='button' class='btn btn-primary col-md-6 col-md-offset-3' value='insert'/>";
			$('#data').html(htmltxt);


			if(response[1]!='')
			{
			var htmlrow ="<tr><td colspan='9'><div class='alert alert-danger'>";
			var anding = '';
			for(var i in response[1])
			 {
				 htmlrow +="<span class='btn'>"+anding+"<span>";
				 htmlrow +="<span class='btn'>"+response[1][i]+"<span>";
				 anding = "&";
			 }
			 htmlrow +="</div></td><tr>";
			 $('table').append(htmlrow);
			}
		})
		.fail(function() {
			console.log("error");
		})
	});




});