<?php
session_start();
include 'Kvitter.class.php';


$username = $_POST['username'];
$password = $_POST['password'];

$login = Kvitter::login($username, $password);

if($login == true){
	$_SESSION['username'] = $username;
	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'home.php';
	header("Location: http://$host$uri/$extra");
}else{
	$_SESSION['failure'] = 'Invalid username or password.';
	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';
	header("Location: http://$host$uri/$extra");
}
?>