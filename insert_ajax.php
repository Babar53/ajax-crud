<?php

$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];

$conn=mysqli_connect("localhost","root","","jqajax") or die("you can't connect dB");
$outut="";
$sql="insert into students(name,email,password) values ('{$name}','{$email}','{$password}'";
// $result=mysqli_query($conn,$sql)or die("Sql connection failed");
if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}
?>