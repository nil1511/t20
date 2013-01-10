<?php
require_once("config.php");
require_once("validate_register.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>T20KB Register</title>
<link rel="stylesheet" type="text/css" href="css/register.css" media="all" />
</head>
<body>
	<div id="container">
	  <h1 align="center">Registration</h1>
        		<? if( isset($_POST['send']) && (!validateName($_POST['name']) || !validateEmail($_POST['email']) || !validateNum($_POST['number']) ) ):?>
				<div id="error">
					<ul>
						<? if(!validateName($_POST['name'])):?>
							<li><strong>Error username aleary exist </strong></li>
						<? endif?>
						<? if(!validateEmail($_POST['email'])):?>
							<li><strong>user with given email already exsist</strong></li>
						<? endif?>
						<? if(!validateNum($_POST['number'])):?>
							<li><strong>user with given mobile number already exist</strong></li>
						<? endif?>
					</ul>
				</div>
			<? elseif(isset($_POST['send'])):?>
				<div id="error" class="valid">
					<ul>
						<li><strong>Congratulations!</strong> All fields are OK ;)</li>
					</ul>
				</div>
                <? 
				$name = mysql_real_escape_string($_POST['name']);
				$email = mysql_real_escape_string($_POST['email']);
				$number = mysql_real_escape_string($_POST['number']);
				$password=dechex(crc32(rand(12345,965323)));
	mysql_query('INSERT INTO `user`(`name`, `email`, `password`, `number`) VALUES ("'.$name.'","'.$email.'","'.($password).'","'.$number.'")') or die('Error storing fileds');
				echo $password;
				
				?>
		<? endif?>
        <?  if( !isset($_POST['send'])): ?>
        <form id="form" method="post" action="<? echo $_SERVER['PHP_SELF']; ?>">
        <div>
        <div id="fname">
        <label for="name">Name:</label> <input type="text" name="name" id="name" tabindex="1"/><br />
        <span id="nameInfo">What's your name?</span><br /></div>
        <div id="fmail" >
        <label for="mail">E-mail:</label> <input type="email" name="email" id="email" tabindex="2"/><br />
        <span id="emailInfo">Your E-Mail Address Here</span><br /></div>		
        <div id="fnum" >
        <label for="num" >Mobile No:</label><input type="tel" name="number" id="number" tabindex="3"/><br />
        <span id="numberInfo">Get your password & update on Mobile</span> <br /></div><br />
        <input type="submit" id="send" name="send" value="Register" tabindex="4"/>
        <input type="reset" id="reset" name="reset" value="Reset" tabindex="5"/>
        </div>
        </form>
        <? endif ?>
	</div>  
	<script type="text/javascript" src="script/jquery.js" /></script>
	<script type="text/javascript" src="script/validation.js"></script>
</body>
</html>