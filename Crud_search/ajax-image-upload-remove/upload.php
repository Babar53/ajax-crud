<?php
if($filename = $_FILES['file']['name'] != ''){
	$filename = $_FILES['file']['name'];

	$extension=pathinfo($filename,PATHINFO_EXTENSION);
	$valid_extensions= array("jpeg","jpg","gif","png");
	if(in_array($extension, $valid_extensions)){
		$new_name = rand() . "." . $extension;
		$path = "images/" . $new_name;

		if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){
			echo '<img src="'.$path.'"/><br><br><br>
			<button data-path="'.$path.'" class="btn btn-danger delete-btn">Delete<button>';
		}
	}else{
		echo '<script> alert("invalid file format")</script>';
	}
}else{
	echo '<script> alert("please select file")</script>';
}

?>