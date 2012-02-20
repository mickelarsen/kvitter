<?php
session_start();
include 'Kvitter.class.php';

$tweets = Kvitter::countAllTweets();
$members = Kvitter::countAllUsers();

?>
Kvitter

<div id="about">
<pre>We are a community consisting of a few members.
We use avatars(profilepictures) from gravatar.com
</pre>

	Members: <?php echo $members['COUNT(*)'] ?>
	Kvitters: <?php echo $tweets['COUNT(*)'] ?>
</div>

<div id="right_side">
<?php
if(isset($_SESSION['username'])){
?>
	<a href="profile.php"><?php echo $_SESSION['username'] ?></a>
	<br />
	<a href="logout.php">Log out</a>
	<?php
	}else{
		echo 'You are not logged in. Perhaps you would like to <a href="register.php">register</a> or '.
			 '<a href="login.php">log in</a>?';
	}
	?>
	<br />
	Search kvitters
	<form action="search.php" method="post">
	<input type="text" name="searchword" />
	<input type="hidden" name="search_type" value="tweet" />
	<input type="submit" value="Search" />
	</form>
	
	Search users
	<form action="search.php" method="post">
	<input type="text" name="searchword" />
	<input type="hidden" name="search_type" value="users" />
	<input type="submit" value="Search" />
	</form>
	
</div>