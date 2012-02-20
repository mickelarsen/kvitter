<?php
session_start();
include 'Kvitter.class.php';

if(isset($_SESSION['failure'])){
	echo $_SESSION['failure'];
}
if(isset($_SESSION['success'])){
	echo $_SESSION['success'];
}
session_destroy();
?>
Kvitter
<div id="login">
Log in
<form action="login_validate.php" method="post">
Username:<input type="text" name="username" />
Password:<input type="password" name="password"/>
<input type="submit" value="Log in" />
</form>
</div>

<div id="search">
<form action="search.php" method="post">
Search:<input type="text" name="searchword" />
<input type="hidden" name="search_type" value="tweet" />
<input type="submit" value="Search" />
</form>
</div>

<div id="reg_link">
<a href="register.php">Register!</a>
</div>

<a href="about.php">About</a>