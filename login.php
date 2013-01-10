<?php
require_once('config.php');

if(isset($_POST['login']))
{
$name = mysql_real_escape_string($_POST['username']);
$pass = mysql_real_escape_string(($_POST['password']));
if($i = mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `name`='$name' AND `password`='$pass'")))
{session_start();
$_SESSION['name']=$name;
$_SESSION['id'] = $i['ID'];
header('Location: member');
}
else
header('Location: forgot_password');
}
?>