<?php      
    include('conn.php');  
	session_start();
    $username = $_SESSION['user'];  
    $password = $_SESSION['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $query = "SELECT * FROM Admin where Username ='$username' and Password = '$password';";
      
		// Execute the query and store the result set
		$result = mysqli_query($connection, $query);
        
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username: $username or password: $password .</h1>";  
        }    

?>  