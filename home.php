<?php
session_start();
include 'Kvitter.class.php';
	
?>
Kvitter
<?php

$username = $_SESSION['username'];

	$tweets = Kvitter::getTweets($username);
	$my_tweets = Kvitter::getMyTweets($username);
	$followers = Kvitter::getFollowers($username);
	$birds = Kvitter::getBirds($username);
?>

Post a kvitter!
<form action="create_tweet.php" method="post">
	<input type="text" name="tweet">
	<input type="submit" value="Kvitt">
</form>
<br />

Kvitters

<br />

My kvitters

<br />
<?php
if(!empty($my_tweets)){
	foreach($my_tweets as $my_tweet){
		echo '<a href="profile.php/"'.$my_tweet['username'].'>'.$my_tweet['username'].'</a>';
		echo ': ';
		echo $my_tweet['tweet'];
		echo '<br />';
	}
}else{
	echo 'No tweets found.';
}
?>
<br />

Friend's kvitters
<br />
<?php

if(!empty($tweets)){
	foreach($tweets as $tweet){
		echo '<a href="profile.php/"'.$tweet['username'].'>'.$tweet['username'].'</a>';
		echo ': ';
		echo $tweet['tweet'];
		echo '<br />';
	}
}else{
	echo 'No tweets found.';
}
?>

<div id="right_side">
	<div>
		<a href="profile.php"><?php echo $username ?></a>
		<br />
		<a href="logout.php">Log out</a>
	</div>
	
	You are listening to the birdsong of the following folks:
	<br />
	<?php
	if(!empty($birds)){
		foreach($birds as $bird){
			echo '<div>';
			echo $bird['username'];
			echo '</div>';
			}
	}else{
		echo 'You are not following anyone.';
	}
	?>
	<br />
	<br />
	You are being followed by:
	<br />
	<?php
	if(!empty($followers)){
		foreach($followers as $follower){
			echo '<div>';
			echo $follower['follower'];
			echo '</div>';
			}
	}else{
		echo 'No one is following your birdsong.';
	}
	?>
	<br />
	Search kvitters
	<form action="search.php" method="post">
		<input type="text" name="searchword" />
		<input type="hidden" name="search_type" value="tweets" />
		<input type="submit" value="Search" />
	</form>
	
	Search users
	<form action="search.php" method="post">
		<input type="text" name="searchword" />
		<input type="hidden" name="search_type" value="users" />
		<input type="submit" value="Search" />
	</form>
	
</div>