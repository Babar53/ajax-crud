<?php
$conn=mysqli_connect("localhost","root","","jqajax")or die("you can't connect dB");
$outut="";
$sql="select * from students";
$result=mysqli_query($conn,$sql)or die("Sql connection failed");

if(mysqli_num_rows($result) > 0 ){
$output='<table class="table">
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>email</th>
		<th>password</th>
		<th>Action</th>
		<th>Action</th>
		</tr>';

		while($row = mysqli_fetch_assoc($result)){
			$output.="<tr><td>{$row["id"]}</td><td>{$row["name"]}</td><td>{$row["email"]}</td><td>{$row["password"]}</td><td><button class='delete-btn btn btn-danger' data-id='{$row["id"]}'>Delete</button></td><td><button class='edit-btn btn btn-primary' data-eid='{$row["id"]}'>Edit</button></td></tr>";
		}
		$output.="</table>";

		mysqli_close($conn);

		echo $output;
}else{

echo "NO record found";
}
?>