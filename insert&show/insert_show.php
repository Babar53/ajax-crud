<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ajax_Crud</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container mt-5">
		<h1 class="alert-info text-center md-5 p-3">AJAX CRUD</h1>
		<div class="row">
			<form class="col-sm-5" id="addForm">
				<h3 class="alert-warning text-center p-2">Add/update</h3>
			<div>
				<label for="name" class="form-label">name</label>
			<input type="text"  id="sname" class="form-control">
		</div>
		<div>
			<label for="email" class="form-label">Email</label>
			<input type="text"  id="semail" class="form-control">
		</div>
		<div>
			<label for="password" class="form-label">Password</label>
			<input type="text"  id="spassword" class="form-control">
		</div>
		<div class="mt-5">
			<button type="submit" class="btn btn-primary" id="save-button">Save
			</button>
		</div>
		<div id="msg"></div>
	</form>
	<div class="col-sm-7 text-center">
		<h3 class="alert-warning p-2">Show student information</h3>
		<table class="table" id="main">
			<tr>
				<td id="table-data">
				
				</td>
			</tr>
		
		
	</table>
	<div id="error-message" class="alert-danger"></div>
	<div id="success-message"class="alert-success"></div>
</div>
</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		function loadTable(){
			$.ajax({
				url : "ajax.php",
				type : "POST",
				success : function(data){
					$("#table-data").html(data);
				}
			});
		}
		loadTable();

		$("#save-button").on("click",function(e){
			e.preventDefault();
			var sname = $("#sname").val();
			var semail = $("#semail").val();
			var spassword = $("#spassword").val(); 

				$.ajax({
				url : "ajax-load.php",
				type : "POST",
				data : {name:sname , email:semail , password:spassword},
				success : function(data){
					if(data == 1){
						loadTable();
						$("#addForm").trigger("reset");
						$("#success-message").html("data inserted successfuly").slideDown();
						$("#error-message").slideUp();
					}else{
						$("#error-message").html("Can't save records").slideDown();
						$("#success-message").slideUp();
					}
				}
			});
			

			
		});
			});
	
</script>
</body>
</html>