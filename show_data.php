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
		<h1 class="alert-info text-center md-5 p-3">AJAX-Crud</h1>
		<div class="row">
			<form class="col-sm-5" id="myform">
				<h3 class="alert-warning text-center p-2">Inserting</h3>
			<div>
				<input type="text" id="stuid" class="form-control">
			<label for="name" class="form-label">name</label>
			<input type="text" name="name" id="name" class="form-control">
		</div>
		<div>
			<label for="email" class="form-label">Email</label>
			<input type="text" name="email" id="email" class="form-control">
		</div>
		<div>
			<label for="password" class="form-label">Password</label>
			<input type="text" name="password" id="password" class="form-control">
		</div>
		<div class="mt-5">
			<button type="submit" class="btn btn-primary" id="btnadd">Save
			</button>
		</div>
		<div id="msg"></div>
	</form>
	<div class="col-sm-7 text-center">
		<h3 class="alert-warning p-2">Show student information</h3>
		<table class="table" id="main">
			<tr>
				<td id="header"><h1>PHP Ajax Crud</h1></td>
			</tr>
			<tr>
				<td id="table-load">
					<input type="button" id="load-button" value="show">
				</td>
			</tr>
			<tr>
				<td id="table-data">
				
			</td>
			</tr>
		
		
	</table>
</div>
</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#load-button").on("click",function(e){
			$.ajax({
				url : "ajax.php",
				type : "POST",
				success : function(data){
					$("#table-data").html(data);
				}
			});
		});
	});
</script>
</body>
</html>