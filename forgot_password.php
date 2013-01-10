<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
<script type="text/javascript" src="script/login.js"></script>
</head>
<body>
<div id="forgot">
<form method="post" action="<? echo $_SERVER['PHP_SELF']; ?>">
<input type="email" id="email" value="Enter Email" onfocus="this.value=(this.value=='Enter Email')?(''):this.value"/>
<label for="or">OR</label>
<input type="tel" id="number" value="Mobile Number" onfocus="this.value=(this.value=='Mobile Number')?(''):this.value"/>
<input type="submit" name="submit" id="submit" value="Check" />
</form>
</div>
</body>
</html>
<?
require_once('config.php');
if(isset($_POST['submit']))
{
	if(isset($_POST['email'])){
		$email=$_POST['email'];
	if(mysql_num_rows(mysql_query("SELECT `email` FROM `user` WHERE `email`= 'mysql_real_escape_string($email)'")))
	echo 'hi';}
	elseif(isset($_POST['number'])){
		$number=$_POST['number'];
	if(mysql_num_rows(mysql_query("SELECT `number` FROM `user` WHERE `number`= 'mysql_real_escape_string($number)'")))
	echo 'hi number';}
	else
	echo 'enter valid field';
	
}
?>