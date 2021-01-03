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

    // // // Insert some values
    //     $sql="SELECT email , password FROM users WHERE username='$uname' and password='$pwd'";
    //     $result=mysqli_query($db,$sql);
    //     $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    //     if(mysqli_num_rows($result) == 1)
    //     {
    //     $_SESSION['email'] = $uname; // Initializing Session
    //     header("location: ../account.php"); // Redirecting To Other Page
    //     }else
    //     {
    //     $error = "Incorrect username or password.";
    //     }
    // Perform query
    $result = $mysqli -> query("SELECT * FROM users Where email='".$uname."' and password='".$pwd."');
    if($result -> num_rows == 1){
        $_SESSION ['email'] = $uname;
        header('location: ../account.php');
    }


    $mysqli -> close();
    
    
}

?>