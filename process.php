<?php
session_start();
if(isset($_POST)){
		
    $uname= $_POST['userid'];
    $pwd = sha1($_POST['pwd']);

    $mysqli = new mysqli("remotemysql.com","QExKt8jTh3","XqrylbkApz","QExKt8jTh3");

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }

    // Turn autocommit off
    $mysqli -> autocommit(FALSE);

    // // Insert some values
    $sql = "SELECT * FROM users where email='".$uname."' and password='".$pwd."'";
    if ($result = $mysqli -> query($sql)) {
        $_SESSION["ID"] = $row['email'];
        $_SESSION["PWD"]=$row['password'];
    }
    else{
        exit();
    }


    $mysqli -> close();
    
    
}

?>