<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ajax_Crud</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css">
		#modal{
	background:  rgba(0, 0, 0, 0.7);
	position: fixed;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	z-index: 100;
	display:none;

}
#modal-form{
	background: pink;
	width: 40%;
	position: relative;
	top: 20%;
	left: calc(50% - 20%);
	padding: 15px;
	border-radius: 4px;
}
#close-btn{
	background: red;
	color: white;
	width: 30px;
	height: 30px;
	line-height: 30px;
	text-align: center;
	border-radius: 50%;
	position: absolute;
	top: -15px;
	right: -15px;
	cursor: pointer;
	}
	</style>

</head>
<body>
	<div class="container mt-5">
		<h1 class="alert-info text-center md-5 p-3">AJAX CRUD</h1>
		<div id="search-bar">
			<label>Search :</label>
			<input type="text" id="search" autocomplete="off">
		</div>
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
	<div id="modal">
		<div id="modal-form">
		
			<h2>Edit form</h2>
			<table class="table">
			</table>
			<hr>
			
				<div id="close-btn">X</div>
		</div>
	</div>
		


      	</div>
 
    </div>
  </div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		// table load

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

		// inserting Data

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

		// deleting data

		$(document).on("click",".delete-btn",function(){
			if(confirm("do you really want to delete this record?")){
			var studentId = $(this).data("id");
			var element = this;

			$.ajax({
				url : "ajax-delete.php",
				type : "POST",
				data : {id : studentId},
				success : function(data){
					if(data == 1){
						$(element).closest("tr").fadeOut();
					}else{
						$("#error-message").html("Can't deleted").slideDown();
						$("#success-message").slideUp();
					}

				}
			});
		}
		});

		// show modal
			$(document).on("click",".edit-btn",function(){
				$("#modal").show();
				var studentId = $(this).data("eid");
				// alert(studentId);
				$.ajax({
					url : "load-update-form.php",
					type : "POST",
					data : {id : studentId},
					success : function(data){
						$("#modal-form table").html(data);
					}
				});
			});

			// hide modal
			$("#close-btn").on("click",function(){
				$("#modal").hide();
			});

			// update data
		$(document).on("click","#edit-submit",function(){
			var stuid = $("#edit-id").val();
			var sname = $("#edit-name").val();
			var semail = $("#edit-email").val();
			var spassword = $("#edit-password").val();

			$.ajax({
				url : "ajax-update-form.php",
				type : "POST",
				data : {id:stuid , name:sname ,  email:semail , password:spassword},
				success : function(data){
					if(data == 1){
						$("#modal").hide();
						loadTable();
					}else{

					}
				}
			});

				$("#search").on("keyup",function(){
				var search_term = $(this).val();

				$.ajax({
					url : "ajax-live-search.php",
					type : "POST",
					data : {search:search_term},
					success : function(data){
						$("#table-data").html(data);
					}
				});
			
			});
		});


			// $("#table-data").on("click",".btn-edit",function(){
			// 	console.log("edit button clicked");
			// });
		
			});
	
</script>
</body>
</html>