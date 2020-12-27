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


	$db = new PDO('mysql:host=remotemysql.com;dbname=QExKt8jTh3','QExKt8jTh3','XqrylbkApz');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
		$uname= $_POST['username'];
		$email = $_POST['emailid'];
		$pwd = sha1($_POST['passwords']);

		$sql = "INSERT INTO accounts (username, email, passwords) VALUES (:uname, :email, :pwd)";

      	$stmt = $pdo->prepare($sql);
      
		$stmt->execute(['uname' => $uname, 'email' => $email, 'pwd' => $pwd]);
		if($stmt){
			echo "sucessfully saved";
		}else{
			echo "failed to saved";
		}

		  




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