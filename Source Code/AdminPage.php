<?php
session_start();
if ($_SESSION['valid'] == false){
	header("Location: http://jot0501website.zapto.org/index.html");
	unset($_POST['done']);
}

?>

<head><link rel="stylesheet" href="adminpage.css"></head>
<body>
	<header>
		<img src="Postimg.png">
		<div>
			<h1>Philatelic Foundation INC.</h1>
			<p>Christchurch</p>
		</div>



	</header>
	<div>
	<form id="xu" action="AdminPage.php?search=<?php echo $_POST['search']?>">
	<input type="text" name="search" placeholder="put what your looking for here!">
	<input type="submit" value="Search">
</form>
</div>
	<div class="content">
	
	<aside>
	
			<?php echo '<p>Welcome '.$_SESSION['user'].'</p>';?>
			
			<button onclick="location.href='AdminPage.php'">Refresh</button>
			<button onclick="showviewitems()">View Items</button>
			<button onclick="showadditems()">Add Items</button>
			<button onclick="showedititems()">Edit Items</button>
			<button onclick="showremoveitems()">Remove Items</button>
			<button onclick="location.href='index.html'">home</button>
			<button onclick="location.href='logout.php'">logout</button>
			
			
		</aside>
		<script>
			function showadditems(){
				var x = document.getElementById("additem");
				var y = document.getElementById("edititem");
				var z = document.getElementById("removeitem");
				var w = document.getElementById("viewitem");
			
				
				  if (x.style.display = "none") {
					x.style.display = "block";
					y.style.display = "none";
					w.style.display = "none";
					z.style.display = "none";
				
				  } else {
					x.style.display = "none";
				  }
			}
			function showedititems(){
				var x = document.getElementById("additem");
				var y = document.getElementById("edititem");
				var z = document.getElementById("removeitem");
				var w = document.getElementById("viewitem");
			
				
				  if (y.style.display = "none") {
					y.style.display = "block";
					x.style.display = "none";
					w.style.display = "none";
					z.style.display = "none";
				  } else {
					y.style.display = "none";
					
				  }
			}
			function showviewitems(){
				var x = document.getElementById("additem");
				var y = document.getElementById("edititem");
				var z = document.getElementById("removeitem");
				var w = document.getElementById("viewitem");
				
				
				  if (w.style.display = "none") {
					w.style.display = "block";
					y.style.display = "none";
					x.style.display = "none";
					z.style.display = "none";
				  } else {
					w.style.display = "none";
					
				  }
			}
			function showremoveitems(){
				var x = document.getElementById("additem");
				var y = document.getElementById("edititem");
				var z = document.getElementById("removeitem");
				var w = document.getElementById("viewitem");
				
				
				  if (z.style.display = "none") {
					z.style.display = "block";
					w.style.display = "none";
					y.style.display = "none";
					x.style.display = "none";
				  } else {
					z.style.display = "none";
					
				  }
			}
		
		</script>
		<main>
	 		<div id="ItemContainer">
				
			
			
			<div id="viewitem">
			<h2 >View Items</h2>
		<?php
		include 'conn.php';
			if(isset($_GET['search'])){
				$query = "SELECT * From Items where Catagory like '%".$_GET['search']."%'";
			}
			else{
				$query = "SELECT * FROM Items";
			}
			if ($result = $connection->query($query)) {

				/* fetch associative array */
				while ($row = $result->fetch_assoc()) {
					$field1name = $row["Catagory"];
					$field2name = $row["Name"];
					$field3name = $row["Description"];
					$field4name = $row["FileLocation"];
					$field5name = $row["Filename"];
					echo '<div class="itemdisplay" ><img src="'.$field4name.$field5name.'">';
					echo '<p><span>Catagory:</span><br> '.$field1name.'</p>';
					echo '<p><span>Name:</span><br> '.$field2name.'</p>';
					echo '<p><span>Description:</span><br>';
					echo ''.$field3name.'</p></div>';
				}

				/* free result set */
				$result->free();
			}
		?>
		</div>
			</div>
			<div id="edititem">
			<h2>Edit Items</h2>
			
			<?php
		include 'conn.php';
			if(isset($_GET['search'])){
				$query = "SELECT * From Items where Name like '%".$_GET['search']."%'";
			}
			else{
				$query = "SELECT * FROM Items";
			}
			if ($result = $connection->query($query)) {

				/* fetch associative array */
				while ($row = $result->fetch_assoc()) {
				
					$field1name = $row["Catagory"];
					$field2name = $row["Name"];
					$field3name = $row["Description"];
					$field4name = $row["FileLocation"];
					$field5name = $row["Filename"];
					
					
					echo '<a href="update.php?id='.$row['ID'].'">Edit</a><div class="itemdisplay" ><img src="'.$field4name.$field5name.'">';
					echo '<p><span>Catagory:</span><br> '.$field1name.'</p>';
					echo '<p><span>Name:</span><br> '.$field2name.'</p>';
					echo '<p><span>Description:</span><br>';
					echo ''.$field3name.'</p></div>';
				}

				/* free result set */
				$result->free();
			}
		?>
			</div>
			<div id="removeitem">
			<h2>Remove Items</h2>

			<?php
		include 'conn.php';
			if(isset($_GET['search'])){
				$query = "SELECT * From Items where Catagory like '%".$_GET['search']."%'";
			}
			else{
				$query = "SELECT * FROM Items";
			}
			if ($result = $connection->query($query)) {

				/* fetch associative array */
				while ($row = $result->fetch_assoc()) {
				
					$field1name = $row["Catagory"];
					$field2name = $row["Name"];
					$field3name = $row["Description"];
					$field4name = $row["FileLocation"];
					$field5name = $row["Filename"];
					
					
					echo '<a href="delete.php?id='.$row['ID'].'">X</a><div class="itemdisplay" ><img src="'.$field4name.$field5name.'">';
					echo '<p><span>Catagory:</span><br> '.$field1name.'</p>';
					echo '<p><span>Name:</span><br> '.$field2name.'</p>';
					echo '<p><span>Description:</span><br>';
					echo ''.$field3name.'</p></div>';
				}

				/* free result set */
				$result->free();
			}
		?>
			</div>
			<div id="additem">
			<h2>Add Items</h2>

    <form action="AdminPage.php?#success" method='post' enctype="multipart/form-data">
		<p>Catagory</p>
		<input type="text" name="Catagory" required/>
		<p>Name</p>
		<input type="text" name="Name" required/>
		<p>Description</p>
		<textarea id="TextBox2" rows = "6" cols = "150" onkeypress="addbr(event);" name = "Description"></textarea>
		<p> Image </p>
		<input type="file" name="file" />

		<input type="submit" name="done" value="Add Item"/>
	</form>
<?php
	include 'conn.php';
 
	$name= $_FILES['file']['name'];

	$tmp_name= $_FILES['file']['tmp_name'];

	$position= strpos($name, ".");

	$fileextension= substr($name, $position + 1);

	$fileextension= strtolower($fileextension);

	if (isset($_POST['done'])){
		
		$sql = "insert into Items (Catagory,Name,Description,FileLocation,FileLocation2,Filename,Filename2) Values('".$_POST['Catagory']."','".$_POST['Name']."','".$_POST['Description']."','http://jot0501website.zapto.org/',' ','Upload".$_FILES['file']['name']."',' ');";
		unset($_POST['done']);
		if ($connection->query($sql) === TRUE) {
			echo "New record created successfully";
			header("Location: http://jot0501website.zapto.org/index.html");
			
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


			</div>
		</main>
		
	</div>
	<footer>
		<p>footer</p>
	</footer>
</body>
<script>
function addbr(ev) {
if (ev.keyCode == 13) {

var obj = document.getElementById('TextBox2');
obj.value = obj.value + '<br>'

}

}
</script>
