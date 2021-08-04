<!DOCTYPE HTML>
<html>
<head><link href="https://fonts.googleapis.com/css?family=Crimson+Text|Work+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" href="Style.css">
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
<title>Philatelic Foundation</title>
</head>
<body>
<header>
<img src="http://jot0501website.zapto.org/Postimg.png">
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
		<li><a href="history.html">Foundations History</a></li>
		<li><a href="collection.php">Our Collection</a></li>
		<li><a href="aboutus.html">Contact Details</a></li>
		<li><a href="news.html">News</a></li>
		<li><a href="meetings.html">Meetings</a></li>
		</ul>
</nav>

</div>
<style>
main h1{
	margin:0px;
}
	form{
position:relative;
margin:0px;

}
form input[type=submit]{
 width:20em;
font-size:40px;
margin-bottom:20px;
}
footer{
position:absolute;
top:800px;
}
</style>
<main>
	<h1>Catagories</h1>
	<div>
		<form action="collection.php?search=<?php echo $_POST['search']?>">
			<input type="submit" name="search" value="Money Boxes"/>
		<input type="submit" name="search" value="Franking Machines"/>
<input type="submit" name="search" value="Stamp Vending"/>
		</form >
	</div>
</main>
</div>
	
	<aside>
	
	</aside>
	
	
	
	
	
</main>
<footer>
<p>Copyright </p><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a>
<p>Contact Us</p>
<p>About Us</p>
</footer>
</html>
</body>
