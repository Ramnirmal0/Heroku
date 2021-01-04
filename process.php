<?php
    session_start();
    if(isset($_POST)){
    
        $uname= $_POST['userid'];
        $pwd = sha1($_POST['pwd']);

        // $conn = mysqli_connect("remotemysql.com","QExKt8jTh3","XqrylbkApz","QExKt8jTh3") ;
        $conn = new mysqli("remotemysql.com","QExKt8jTh3","XqrylbkApz","QExKt8jTh3");

        if ($conn -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
            }

            // Turn autocommit off
            $conns -> autocommit(FALSE);
 
        // if (!$conn)
        // {
        // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        // }

        $stmt = $conn->prepare("SELECT `email`, `password` FROM` users` WHERE `email`='$uname' and `password` = '$pwd'");
        
            /* execute statement */
            $stmt->execute();
        
            /* bind result variables */
            $stmt->bind_result($user, $pass);
        
            /* fetch values */
            while ($stmt->fetch()) 
            {
                
            }
        
        if($user == $uname)
                {
                $_SESSION['name'] = $user;
                // Redirect user to index.php
                header("Location: account.php");
                }
                else
                {
                    echo "Your username or password is wrong";
                }
        
        
        $stmt->close();

        // $mysqli = new mysqli("remotemysql.com","QExKt8jTh3","XqrylbkApz","QExKt8jTh3");

        // if ($mysqli -> connect_errno) {
        // echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        // exit();
        // }

        // // Turn autocommit off
        // $mysqli -> autocommit(FALSE);

        // $result = $mysqli -> query("SELECT * FROM Persons WHERE email='user@mail.com' and password='5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8
        // '");
        // $output=$result -> num_rows;
        // if($output==1){
        //     header('Location: ../account.php');
        // }
        // else{
        //     echo "error finding . output is $result ";
        // }

        // $mysqli -> close(); 
    }
?>