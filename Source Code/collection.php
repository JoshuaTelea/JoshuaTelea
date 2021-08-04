<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<head><link href="https://fonts.googleapis.com/css?family=Crimson+Text|Work+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" href="Style.css">
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
<title>Philatelic Foundation</title>
</head>
<body class="colbody">
<header>
<img src="Postimg.png">
<div>
<h1>Philatelic Foundation INC.</h1>
<p>Christchurch</p>
</div>

<button onclick="nav()"id="menu">
<script>
	function nav(){
		var x = document.getElementById("navid");
		var y = document.getElementById('menu');
		  if (x.style.display === "none") {
			x.style.display = "inline-block";
			y.background = "http://jot0501website.zapto.org/placeholder.png";
		  } else {
			x.style.display = "none";
		  }
	}
</script>
</button>

</header>
<div>
<nav id="navid">
	<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="history.html">Foundations History</a></li>
		
		<li><a href="aboutus.html">Contact Details</a></li>
		<li><a href="news.html">News</a></li>
		<li><a href="meetings.html">Meetings</a></li>
		</ul>
</nav>

<form action="collection.php?search=<?php echo $_POST['search']?>">
<span style="font-size:2em;">search for an item: </span>
	<input type="text" name="search" placeholder="put what your looking for here!">
	<input type="submit" value="Search">
</form>
</div>
<div id="searchq" >
<?php if(isset($_GET['search'])){echo '<h2> search: '.$_GET["search"].'</h2>';}?>
</div>
<aside>
<h1>
	Our Collection
</h1>
<button onclick="window.location.href='catagories.php'"> Catagories </button>
<style>
	aside button{width:20em;height:5em;
	margin-top:10em;border:none;background-color:#A01821;color:white; border-radius:1em;}
</style> 
</aside>
<main>

<div id="viewitem">
			
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
					echo '<p><span>Catagory:</span> '.$field1name.'</p>';
					echo '<p><span>Name:</span> '.$field2name.'</p>';
					echo '<p><span>Description:</span><br>';
					echo ''.$field3name.'</p></div>';
					
				}

				/* free result set */
				$result->free();
			}
		?>
			</div>
</main>

<footer>
<p>Copyright </p><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a>
<p>Contact Us</p>
<p>About Us</p>
</footer>
</html>
</body>
