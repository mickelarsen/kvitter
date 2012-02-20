<?php
session_start();
include 'Kvitter.class.php';
$username = $_SESSION['username'];
$password = $_POST['password'];

if(Kvitter::createUser($username, $password)){
	session_start();
	$_SESSION['success'] = 'User created successfully.';
	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';
	header("Location: http://$host$uri/$extra");
}else{
	echo '?????';
}



?>