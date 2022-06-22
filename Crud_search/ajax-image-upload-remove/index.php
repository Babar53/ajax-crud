<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css">
		#preview{
			border: 1px solid darkseagreen;
			padding: 10px;
			display: none;
		}
	</style>
	<title>image upload</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-9">
				<form id="submit_form">
	<label>Select image</label>
	<input type="file" name="file" id="upload_file" class="form-control"><br>
	<input type="submit" name="upload_button" id="upload_btn" value="save" class="btn btn-success">
	</form>
	<div id="preview">
		<h3>image preview</h3>
			<div id="image_preview">
			
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#submit_form").on("submit",function(e){
				e.preventDefault();

				var formData = new FormData(this);

				$.ajax({
					url : "upload.php",
					type : "POST",
					data : formData,
					contentType : false,
					processData : false,
					success:function(data){
						$("#preview").show();
						$("#image_preview").html(data);
						$("#upload_file").val('');

					}
				});
			});
			$(document).on("click",".delete-btn"function(){
				if(confirm("are you sure you want to delete this image ?")){
					var path = $(".delete-btn").data("path");

					$.ajax({
						url : "delete.php",
						type : "POST",
						data : {path: path},
						success:function(data){
							if(data !=""){
								$("#preview").hide();
						$("#image_preview").html('');
							}
						}
					});
				}
			});
		});
</script>
</body>
</html>