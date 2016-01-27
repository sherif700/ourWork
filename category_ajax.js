
var lastid;
$(function() {	

$.ajax({
			url: 'category_server.php',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			console.log(response);
			 var htmltxt = "<table border='2'>";
			 htmltxt += "<tr><th>ID</th><th>cat_name</th><th>cat_description</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	// console.log(response);
			 	htmltxt += "<tr id='"+response[i].category_id+"'><td>"+response[i].category_id+"</td><td>"+response[i].category_name+"</td><td>"+response[i].category_desc+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].category_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].category_id+"'/></td>";
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
	 		url: 'category_server.php?id='+$(this).attr("name")+'&value='+$(this).val()+'',
	 		type: 'GET',
	 		dataType: 'json'
	 	})
	 	.done(function(response) {
	 		var htmltxt = "<table border='2'>";
			 htmltxt += "<tr><th>ID</th><th>cat_name</th><th>cat_description</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	// console.log(response);
			 	htmltxt += "<tr id='"+response[i].category_id+"'><td>"+response[i].category_id+"</td><td>"+response[i].category_name+"</td><td>"+response[i].category_desc+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].category_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].category_id+"'/></td>";
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


	
	$('body').on('click','input[value="Edit"]',function(event) {
		// body...

		 if(lastid!=null)
	 	 {
	 	 	$.ajax({
	 		url: 'category_server.php?id='+lastid+'&value='+$(this).val()+'',
	 		type: 'GET',
	 		dataType: 'json',
	 		async: false
	 		})
	 		.done(function(response) {
	 			console.log(response.id);
			 	var	htmltxt = "<td>"+response.id+"</td><td>"+response.category_name+"</td><td>"+response.category_desc+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response.id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response.id+"'/></td>";
			 	$('#'+lastid).html(htmltxt);
	 		})
	 		.fail(function() {
	 			console.log("error");
	 		});
	 	}

	 	var name =$('#'+$(this).attr("name")+' td:eq(1)').html();
	 	var desc = $('#'+$(this).attr("name")+' td:eq(2)').html();
		$('#'+$(this).attr("name")+' td:eq(1)').html('<input type="text" name="name" value="'+name+'"/><span></span>');
	 	$('#'+$(this).attr("name")+' td:eq(2)').html('<input type="text" name="desc" value="'+desc+'"/><span></span>');
	 	$(this).val('Update');
	 	 lastid = $(this).attr("name");
	});



		$('body').on('click',"input[value='Update']",function(event){
		// body...
		var name=$('input[name="name"]').val();
		var desc=$('input[name="desc"]').val();
		if(name=='')
		{
			$('input[name="name"] + span').html("*");
			return;
		}
		if(desc=='')
		{
			$('input[name="desc"] + span').html("*");
			return;	
		}
		$.ajax({
			url: 'category_server.php?id='+$(this).attr("name")+'&value='+$(this).val()+'&name='+name+'&desc='+desc+'',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
	 		var htmltxt = "<table border='2'>";
			 htmltxt += "<tr><th>ID</th><th>cat_name</th><th>cat_description</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	// console.log(response);
			 	htmltxt += "<tr id='"+response[i].category_id+"'><td>"+response[i].category_id+"</td><td>"+response[i].category_name+"</td><td>"+response[i].category_desc+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].category_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].category_id+"'/></td>";
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
	$('table').append('<tr><td colspan="2"><input type="text" value="name"/><span></span></td><td><input type="text" value="description"/><span></span></td><td><input type="button" value="Add_Item"/></td><td><input type="button" value="Cancel"/></td></tr>');
});


$('body').on('click','input[value="Cancel"]',function(event){
	$.ajax({
			url: 'category_server.php',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			console.log(response);
			 var htmltxt = "<table border='2'>";
			 htmltxt += "<tr><th>ID</th><th>cat_name</th><th>cat_description</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	// console.log(response);
			 	htmltxt += "<tr id='"+response[i].category_id+"'><td>"+response[i].category_id+"</td><td>"+response[i].category_name+"</td><td>"+response[i].category_desc+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].category_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].category_id+"'/></td>";
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
});



$('body').on('click','input[value="Add_Item"]',function(event){
		// body...
		var name=$('input[value="name"]').val();
		var desc=$('input[value="description"]').val();
		if(name=='')
		{
			$('input[value="name"] + span').html("*");
			return;
		}
		if(desc=='')
		{
			$('input[value="description"] + span').html("*");
			return;	
		}
		$.ajax({
			url: 'category_server.php?value='+$(this).val()+'&name='+name+'&desc='+desc+'',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			 var htmltxt = "<table border='2'>";
			 htmltxt += "<tr><th>ID</th><th>cat_name</th><th>cat_description</th><th>Delete</th><th>Edit</th></tr>"
			 for(var i in response)
			 {
			 	// console.log(response);
			 	htmltxt += "<tr id='"+response[i].category_id+"'><td>"+response[i].category_id+"</td><td>"+response[i].category_name+"</td><td>"+response[i].category_desc+"</td>";	
			 	htmltxt += "<td><input type='button' value='Delete' name='"+response[i].category_id+"'/></td>";
			 	htmltxt += "<td><input type='button' value='Edit' name='"+response[i].category_id+"'/></td>";
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
