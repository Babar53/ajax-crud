<?php
$student_id=$_POST['id'];

$conn=mysqli_connect("localhost","root","","jqajax")or die("you can't connect dB");
$sql="delete from students where id = {$student_id}";
if(mysqli_query($conn, $sql)){
		echo 1;
}else{
	echo 0;
}

?>