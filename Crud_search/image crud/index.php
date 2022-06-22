<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title></title>
</head>
<body>
	<div class="container">
		<div align="right">
			<button class="btn btn-info" id="add" name="add">insert new</button>
		</div>
		<br>
		<div id="image-data">
		</div>
	</div>
	


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		fetchData();
		function fetchData(){
		var action =  "fetch";
		$.ajax({
			url : "action.php",
			type : "POST",
			data : {action:action},
			success : function(data){
				$("#image-data").html(data);
			}
		});
	}
		fetchData();
		// body...
		$("#add").click(function(){
			$("#imageModal").modal("show");
			$("#image-form")[0].reset();
			$(".modal-title").text("Add image");
			$("#image_id").val();
			$("#action").val("insert");
			$("#insert").val("insert");

		});
	});
</script>
</body>
</html>
<div id="imageModal" class="modal-fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times</button>
				<h4 class="modal-title">Add image</h4>
			</div>
			<div class="modal-body">
				<form id="image_form" method="POST" enctype="mulyipart/form-data">
					<label></label>
					<input type="file" name="image" id="image"><br>
					<input type="hidden" name="action" id="action" value="insert"><br>
					<input type="hidden" name="image_id" id="image_id" value="insert"><br>
					<input type="submit" name="insert" id="insert" value="insert" class="btn btn-primary"><br>


				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
			</div> 
		</div>
	</div>