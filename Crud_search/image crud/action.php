<?php
if(isset($_POST['action'])){
	$conn=mysqli_connect("localhost","root","","jqajax")or die("you can't connect dB");
	if($_POST['action'] == "fetch"){
		$query= "select * from imageajax";
		$result = mysqli_query($conn,$query);
		$output = '<table class="table">
		<tr>
			<th>id</th>
			<th>image</th>
			<th>change</th>
			<th>Remove</th>
		</tr>
		';
		while($row = mysqli_fetch_array($result))
		{
			$output='
			<tr>
			<td>'.$row["id"].'</td>
			<td>
			<img src="data:image/jpeg;base,'.base64_encode($row['name']).'" height="60" width="60" class="img-thumbnail"/>

			</td>
			<td>
				<button type="button" name="update" class="btn btn-success update" id="'.$row["id"].'">change</button>
			</td>
			<td>
				<button type="button" name="delete" class="btn btn-success delete" id="'.$row["id"].'">Remove</button>
			</td>

			</tr>
			';
		}
		$output .='</table>';
		echo $output;
	}
}

?>