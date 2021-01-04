<?php
    session_start();
    if(isset($_POST)){
    
        $dob= $_POST['dob'];
        $location = $_POST['location'];
        $mob = $_POST['mob'];
        $email = $_SESSION["email"];

        $mysqli = new mysqli("remotemysql.com","QExKt8jTh3","XqrylbkApz","QExKt8jTh3");

        if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }

        // Turn autocommit off
        $mysqli -> autocommit(FALSE);
        $mysqli->query("START TRANSACTION");
        $query = "UPDATE users SET dob='$dob' ,location='$location', mob='$mob' WHERE email='$email' FOR UPDATE";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        
        // Commit transaction
        if (!$mysqli -> commit()) {
        echo "Commit transaction failed";
        exit();
        }

        $mysqli -> close();
    }
?>