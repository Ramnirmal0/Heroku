<?php
// session_start();
//require 'html/user.html';
//require_once('config.php');
?>

<?php

if(isset($_POST)){

	$servername = "remotemysql.com";
	$database = "QExKt8jTh3";
	$username = "QExKt8jTh3";
	$password = "XqrylbkApz";


	try {
		$dsn = "mysql:host=" . $servername . ";dbname=" . $database;
		$pdo = new PDO($dsn, $username, $password);
		echo "connection established";
	} catch(PDOException $e) {
		echo "DB Connection Failed: " . $e->getMessage();
	}

	
		$username= $_POST['username'];
		$emailid = $_POST['emailid'];
		$passwords = sha1($_POST['passwords']);

		$sql = "INSERT INTO accounts (username, email, passwords) VALUES (:uname, :email, :pwd)";

      	$stmt = $pdo->prepare($sql);
      
		$stmt->execute(['uname' => $username, 'email' => $emailid, 'pwd' => $passwords]);

		  
		echo "data entered";




		// $_SESSION['username']=$username;
		// $_SESSION['emailid']=$emailid;
		// $_SESSION['passwords']=$passwords;
		// $sql = "INSERT INTO accounts (username, email, passwords ) VALUES(?,?,?)";
		// $stmtinsert = $db->prepare($sql);
		// $result = $stmtinsert->execute([$username, $emailid, $passwords]);
		// if($result){
		// 	echo 'Successfully saved.';
		// }else{
		// 	echo 'There were erros while saving the data.';
		// }
}
else{
	echo 'No data';
}

?>