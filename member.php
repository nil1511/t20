<? require('config.php');
session_start(); 
if(!empty($_SESSION['name']))
{$name=$_SESSION['name'];
$id=$_SESSION['id'];}
else
die('not able to get session var in member.php line 6');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/member.css" media="all"  />
<script type="text/javascript" src="script/jquery.js" ></script>
<script type="text/javascript" src="script/chat.js" ></script>
<title>Welcome <? echo $name; ?></title>
<div id="chat_div" >
<button value="Chat" id="chat" name="Chat" onclick="cb_click()" />
<label style="cursor:pointer;">Chat With Users</label></div>
<table id="chatbox" hidden="hidden">
<tr><td id="user_title" onclick="toggle()">Online</td></tr>
<tr id="chatblock"><td>Loading user</td></tr>
</table>
</body>
</html>