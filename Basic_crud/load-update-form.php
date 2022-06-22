<?php
$id = $_POST['id'];
$output="";
$conn=mysqli_connect("localhost","root","","jqajax")or die("you can't connect dB");

$sql="select * from students where id = {$id}";
$result=mysqli_query($conn,$sql)or die("Sql connection failed");

if(mysqli_num_rows($result) > 0 ){


		while($row = mysqli_fetch_assoc($result)){
			$output.="<tr>
			<td>Name</td>
					<td><input type='text' id='edit-id' hidden value='{$row["id"]}'></td>
					<td><input type='text' id='edit-name' value='{$row["name"]}'></td>
				</tr>
			<tr>
				<td>Email</td>
					<td><input type='text' id='edit-email' value='{$row["email"]}'></td>
				</tr>
			<tr>
				<td>password</td>
					<td><input type='text' id='edit-password' value='{$row["password"]}'></td>
				</tr>
			<tr>
				<td><input type='submit' id='edit-submit' value='Update' class='btn btn-secondary'></td>
			
			</tr>";




		}
		
		mysqli_close($conn);

		echo $output;
}else{

echo "NO record found";
}
?>