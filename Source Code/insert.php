<?php 
include 'conn.php';
$sql = "insert into Items (Catagory,Name,Description,FileLocation,FileLocation2,Filename,Filename2) Values('".$_POST['Catagory']."','".$_POST['Name']."','".$_POST['Description']."','http://jot0501website.zapto.org/',' ','Upload".$_FILES['file']['name']."',' ');";
		
		if ($connection->mysqli_query($sql) === TRUE) {
			echo "New record created successfully";
			header("Location: http://jot0501website.zapto.org/AdminPage.php");
			
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>