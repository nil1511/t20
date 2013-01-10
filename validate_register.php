<?php
require_once("config.php");
function validateName($n){
	if(mysql_fetch_row(mysql_query('SELECT * FROM `user` WHERE  `name`= "'.$n.'"'))==0 & (strlen($n)>3))
	return true;
	else return false;
}
function validateNum($no){
	$re =mysql_query('SELECT * FROM `user` WHERE  `number`= "'.$no.'"');
		if(mysql_num_rows($re)==0 & (strlen($no)==10))
	return true;
	else return false;
}
function validateEmail($m){
		if(mysql_fetch_row(mysql_query('SELECT * FROM `user` WHERE  `email`= "'.$m.'"'))==0)
	return true;
	else return false;
	return true;}

?>