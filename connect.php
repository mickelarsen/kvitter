<?php
if(mysql_connect('localhost', 'root', 'root')){
	mysql_select_db('kvitter');
}else die(mysql_error());
?>