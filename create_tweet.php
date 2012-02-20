<?php
include 'Kvitter.class.php';

session_start();

$username = $_SESSION['username'];
$tweet = $_POST['tweet'];

$create_tweet = Kvitter::createTweet($username, $tweet);

if($create_tweet){
	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'home.php';
	header("Location: http://$host$uri/$extra");
}
?>