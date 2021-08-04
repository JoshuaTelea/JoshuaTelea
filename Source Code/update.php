<head><link rel="stylesheet" href="edit.css"></head>

<body>

<button onclick="location.href='AdminPage.php'">back</button>

	<?php
		include 'conn.php';
			
				$query = "SELECT * From Items where ID = '".$_GET['id']."'";
			
			
			if ($result = $connection->query($query)) {

				/* fetch associative array */
				while ($row = $result->fetch_assoc()) {
				
					$field1name = $row["Catagory"];
					$field2name = $row["Name"];
					$field3name = $row["Description"];
					$field4name = $row["FileLocation"];
					$field5name = $row["Filename"];
					$id = $row["id"];
					
					echo ' <form action="" method="post" enctype="multipart/form-data">';
						
						echo '<p>Catagory</p>';
						echo '<input type="text" name="Catagory" placeholder="'.$field1name.'" />';
						echo '<p>Name</p>';
						echo '<input type="text" name="Name" placeholder="'.$field2name.'" />';
						echo '<p>Description</p>';
						echo '<textarea id="TextBox2" rows = "6" cols = "150" onkeypress="addbr(event);" placeholder="'.$field3name.'" name = "Description"></textarea>';
						echo '<p> Image </p>';
						echo '<img src="'.$field4name.$field5name.'"> ';
						echo '<input type="file" name="file" />';

						echo '<input type="submit" name="done" value="Edit"/>';
					echo '</form>';
					
				}

				
			}
		
 
	$name= $_FILES['file']['name'];

	$tmp_name= $_FILES['file']['tmp_name'];

	$position= strpos($name, ".");

	$fileextension= substr($name, $position + 1);

	$fileextension= strtolower($fileextension);

	if (isset($_POST['done'])){
		
		if (isset($_POST['Catagory'])){
			$field1name = $_POST['Catagory'];
		}
		if (isset($_POST['Name'])){
			$field2name = $_POST['Name'];
		}
			
		if (isset($_POST['Description'])){
			$field3name = $_POST['Description'];
		}
		if (isset($_POST['FileLocation'])){
			$field4name = $_POST['FileLocation'];
		}
		if (isset($_POST['Filename'])){
			$field5name = $_POST['Filename'];
		}
				
		
		$sql = "Update Items set Catagory = '".$field1name."', Name = '".$field2name."', Description = '".$field3name."', FileLocation = 'http://jot0501website.zapto.org/', Filename ='Upload".$name."' where ID = '".$_GET['id']."';";
		unset($_POST['done']);
		if ($connection->query($sql) === TRUE) {
			echo "New record edited successfully";
			header("Location: http://jot0501website.zapto.org/AdminPage.php");
			
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
	if (isset($name)) {

	$path= '/var/www/html/Upload';
	if (empty($name))
	{
	echo "Please choose a file";
	}
	else if (!empty($name)){
	if (($fileextension !== "jpg") && ($fileextension !== "jpeg") && ($fileextension !== "png") && ($fileextension !== "bmp"))
	{
	echo "The file extension must be .jpg, .jpeg, .png, or .bmp in order to be uploaded";
	}


	else if (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp"))
	{
	if (move_uploaded_file($tmp_name, $path.$name)) {
	echo 'Uploaded!';
	}
	}
}
}
?>
</body>
<script>
function addbr(ev) {
if (ev.keyCode == 13) {

var obj = document.getElementById('TextBox2');
obj.value = obj.value + '<br>'

}

}
</script>

