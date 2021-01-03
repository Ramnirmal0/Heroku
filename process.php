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

        $result = $mysqli -> query("SELECT * FROM Persons WHERE email='".$uname."' and password='".$pwd."'");
        $output=$result -> num_rows;
        if(output==1){
            echo "Access granted";
        }
        else{
            echo"Request Denied";
            exit();
        }

        $mysqli -> close(); 
    }
?>