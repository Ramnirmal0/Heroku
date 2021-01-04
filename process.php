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
        $query = "SELECT email , password FROM users WHERE email = 'user@mail.com' AND password = '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8' FOR UPDATE";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        if(!$stmt->store_result())
            throw new Exception("Store failed: {$mysqli->error}");
        echo "Got {$stmt->num_rows} for $name\n";

        // Commit transaction
        if (!$mysqli -> commit()) {
        echo "Commit transaction failed";
        exit();
        }

        $mysqli -> close();
    }
?>