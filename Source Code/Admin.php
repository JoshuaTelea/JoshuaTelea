<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   
   <head>
      <title>Tutorialspoint.com</title>
	  <link rel="stylesheet" href="Admin.css">
      
      
      
   </head>
	
   <body>
      
    
      <div class = "container form-signin">
         
         <?php
		 
			include('conn.php');  
			
            $msg = '';
            
			
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				$query = "SELECT * FROM Admin where Username ='".$_POST['username']."' and Password = '".$_POST['password']."';";
				$result = mysqli_query($connection, $query);
        
				$count = mysqli_num_rows($result);  
               if ($count > 0) {
				  $_SESSION['user'] = $_POST['username'];
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  
                  header("Location: http://jot0501website.zapto.org/AdminPage.php");
					exit();
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      <form action="index.html">
		<input type="submit" value="Back to website">
	  </form>
         <form class = "form" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
			<h1>Admin Log-in</h1>
            <p class = "error"><?php echo $msg; ?></p>
            <input type = "text"  
               name = "username" placeholder = "username..." 
               required autofocus></br>
            <input type = "password" name = "password" placeholder = "password..." required>
            <input  type = "submit" 
               name = "login" value="Log In">
         </form>
			
         
         
      </div> 
      
   </body>
</html>