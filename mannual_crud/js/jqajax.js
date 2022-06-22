$(document).ready(function(){
//ajax requesst for show mydata

function showadata(){
	$.ajax({
		url:"show.php",
		method:"GET",
		dataType:"json",
		success:function(data){
			output="";
			//console.log(data);
			if(data){
				x=data;
			}else{
				x="";
			}
			for(i= 0; i < x.length; i++){
				//console.log(x[i]);
			//	console.log(x[i].name);
				output+="<tr><td>" + x[i].id + "</td><td>" + x[i].name + "</td><td>"
				 + x[i].email+ "</td><td>" + x[i].password + "<td></td>" +
				 "</td><td><button class='btn btn-warning btn-sm btn-edit'data-sid="+x[i].id +">edit</button><button class='btn btn-danger btn-sm btn-delete' data-sid="+x[i].id +">delete</button></td></tr>";
				 $("#tbody").html(output);

			}
	}
	});
}
showadata()
//ajax request for insert
$("#btnadd").click(function(e){
	e.preventDefault();
	
	console.log("save button clicked");
	let stuid=$("#stuid").val();
	let name=$("#name").val();
	let email=$("#email").val();
	let password=$("#password").val();
	//console.log("name");
//	console.log("email");
	//console.log("password");
	mydata={stuid:stuid, name:name, email:email, password:password};
	//console.log(mydata);
	$.ajax({
		url:"insert.php",
		method:"POST",
		data:JSON.stringify(mydata),
		success:function(data){
			//console.log(data);
			msg="<div class='alert alert-danger mt-3'>"+ data +"</data>";
			$("#msg").html(msg);
			$("#myform")[0].reset();
			showadata();
		},

	});
});
//ajax request for deleting data
$("#tbody").on("click",".btn-delete",function(){
	console.log("delete button clicked");
	let id=$(this).attr("data-sid");
	//console.log(id);
	mydata={sid:id};
	$.ajax({
		url:"delete.php",
		method:"POST",
		data: JSON.stringify(mydata),
		success:function(data){
			//console.log(data);
			msg="<div class='alert alert-danger mt-3'>"+ data +"</data>";
			$("#msg").html(msg);
			showadata();
		},
	});
});

//ajax request for edit data
$("tbody").on("click",".btn-edit",function(){
	//console.log("edit button clicked");
	let id=$(this).attr("data-sid");
	//console.log(id);
	mydata= {sid:id};
	$.ajax({
		url:"edit.php",
		method:"POST",
		dataType:"json",
		data: JSON.stringify(mydata),
		success:function(data){
			console.log(data);
			$("#stuid").val(data.id);
			$("#name").val(data.name);
			$("#email").val(data.email);
			$("#password").val(data.password);
		},
	});


});
});
