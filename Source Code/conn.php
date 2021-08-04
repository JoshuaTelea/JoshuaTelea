
<?php
    // Setting up connection with database Geeks
    $connection = mysqli_connect("localhost", "newuser", "Fuckthots1234!", 
                                                 "PFoundation");
      
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Database connection failed.";
    }
      
    
?>