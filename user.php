<?php
session_start();
require_once('config.php');
require 'html/user.html';
?>

<?php

if(isset($_POST)){

		$username= $_POST['username'];
		$emailid = $_POST['emailid'];
		$passwords = sha1($_POST['passwords']);
		$_SESSION['username']=$username;
		$_SESSION['emailid']=$emailid;
		$_SESSION['passwords']=$passwords;
		$sql = "INSERT INTO accounts (username, email, passwords ) VALUES(?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$username, $emailid, $passwords]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}

?>