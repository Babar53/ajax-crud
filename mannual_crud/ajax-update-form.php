<?php

$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$conn=mysqli_connect("localhost","root","","jqajax")or die("you can't connect dB");
$sql="update students set name='{$name}',email='{$email}',password='{$password}' where id = '{$id}'";
if(mysqli_query($conn, $sql)){
		echo 1;
}else{
	echo 0;
}
?>