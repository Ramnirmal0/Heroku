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
        $mysqli->query("START TRANSACTION");
        $query = "SELECT email , password FROM users WHERE email = '$uname' AND password = '$pwd' FOR UPDATE";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        if(!$stmt->store_result())
            throw new Exception("Store failed: {$mysqli->error}");
        $output=$stmt->num_rows;
        if($output==1){
            echo "1";
            $_SESSION["email"] = $uname;
        }
        else{
            echo "Invalid Username and Password";
        }

        // Commit transaction
        if (!$mysqli -> commit()) {
        echo "Commit transaction failed";
        exit();
        }

        $mysqli -> close();
    }
?>