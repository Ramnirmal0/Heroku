<?php
session_start();
require_once('config.php');
require 'html/signup.html';
if(isset($_POST['register'])){
    $username 		= $_POST['username'];
    $emailid 		= $_POST['emailid'];
    $password 		= sha1($_POST['password']);
    
    $_SESSION['username'] = $username;
    $_SESSION['emailid'] = $emailid;
    $_SESSION['password'] = $password;

    header('Location:user.php');
}

?>