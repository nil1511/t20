<?php
require_once("config.php");
if(isSet($_POST['name'])){
$username = mysql_real_escape_string($_POST['name']);
if(mysql_num_rows(mysql_query('SELECT * FROM `user` WHERE  `name`= "'.$username.'"')))
echo 'invalid';
else
echo 'valid';
}
if(isSet($_POST['email'])){
$email = mysql_real_escape_string($_POST['email']);
if(mysql_num_rows(mysql_query('SELECT * FROM `user` WHERE  `email`= "'.$email.'"')))
echo 'invalid';
else
echo 'valid';
}
if(isSet($_POST['number'])){
$number = mysql_real_escape_string($_POST['number']);
if(mysql_num_rows(mysql_query('SELECT * FROM `user` WHERE  `number`= "'.$number.'"')))
echo 'invalid';
else
echo 'valid';
}
?>