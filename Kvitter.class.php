<?php
include 'connect.php';

class Kvitter{
		
	public function createUser($username, $password){
		
		$sql = "INSERT INTO users(username, pass)
				VALUES('$username', '$password')
				";
		$query = mysql_query($sql);
		if($query){
			return true;
		}
		die(mysql_error());
	}
	
	public function createTweet($username, $tweet){
		$sql = "INSERT INTO tweets (username, tweet)
				VALUES('$username', '$tweet')
				";
		$query = mysql_query($sql);
		if($query){
			return true;
		}
		return false;
	}
	
	public function createFollowing($username, $follower){
		$sql = "INSERT INTO user_follows_user(username, follower)
				VALUES('$username', '$follower')
				";
		$query = mysql_query($sql);
		if($query){
			return true;
		}
		return false;
	}
	
	public static function countAllTweets(){
		$sql = 'SELECT COUNT(*)
				FROM tweets
				';
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row;
		
	}
	
	public static function countAllUsers(){
		$sql = 'SELECT COUNT(*)
				FROM users
				';
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row;
	}
	
	public static function search($searchword, $search_type){
		if($search_type == "users"){
			$column = 'username';
		}else if($search_type == "tweets"){
			$column = 'tweet';
		}else{
			$sql = 'SELECT *
					FROM users, tweets
					WHERE users.username LIKE "%'.$searchword.'%"
						OR tweets.tweet LIKE "%'.$searchword.'%"
					';	
			$results = mysql_query($sql);
			if($results){
				while($row = mysql_fetch_assoc($result)){
				$cool[] = $row;
			}
			return $cool;
			}
			return false;
		}
		
		$sql = 'SELECT *
				FROM '.$search_type.'
				WHERE '.$column.'
				LIKE "%'.$searchword.'%"
				';
		$results = mysql_query($sql);
		if($results){
				while($row = mysql_fetch_assoc($results)){
				$cool[] = $row;
			}
			return $cool;
		}else{
			echo mysql_error();
		}
	}
	
	public static function login($username, $password){
		$sql = 'SELECT *
				FROM users
				WHERE username ="'.$username.'"
				AND pass ="'.$password.'"
				';
		$login = mysql_query($sql);
		
		if($login){
			return true;
		}
		return false;
	}
	
	public static function getTweets($username){
		$sql = 'SELECT *
				FROM tweets, user_follows_user
				WHERE user_follows_user.follower ="'.$username.'"
					AND tweets.username = user_follows_user.username
				ORDER BY tweets.id DESC
				';
		$result = mysql_query($sql);
		if($result){
			while($row = mysql_fetch_assoc($result)){
				$cool[] = $row;
			}
			return $cool;
		}
		$result = "No tweets found.";
		return false;
	}
	
	public static function getMyTweets($username){
		$sql = 'SELECT *
				FROM tweets
				WHERE username ="'.$username.'"
				ORDER BY id DESC
				';
		$result = mysql_query($sql);
		if($result){
			while($row = mysql_fetch_assoc($result)){
				$cool[] = $row;
			}
			return $cool;
		}
		return false;
	}
	
	public static function getFollowers($username){
		$sql = 'SELECT follower
				FROM user_follows_user
				WHERE username = "'.$username.'"
				';
		$result = mysql_query($sql);
		if($result){
			while($row = mysql_fetch_assoc($result)){
				$cool[] = $row;
			}
			return $cool;
			}
		return false;
		
	}
	
	public static function getBirds($username){
		$sql = 'SELECT *
				FROM user_follows_user
				WHERE follower = "'.$username.'"
				';
		$result = mysql_query($sql);
		if($result){
			while($row = mysql_fetch_assoc($result)){
				$cool[] = $row;
			}
			return $cool;
			}
		return false;
	}
	
}

?>