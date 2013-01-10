<?php
if(isset($_POST)){
	require_once('../config.php');
	session_start();
	if(isset($_POST['user']))
	{	$m='';
		$n=$_SESSION['name'];
		$u=$_POST['user'];
		if($u!='ShoutAtMe')
		{
		$r=mysql_query("SELECT * FROM `message` WHERE (`from`='$n' AND `to`='$u') OR (`from`='$u' AND `to`='$n')");
			while($a=mysql_fetch_row($r)){
				if($a[0]==$n)
			$m.='<tr><td><b><div id="Chatfrom" class="chat_me">'.$a[1].'</div></b><div class="chat_message">'.$a[3].'</div></td></tr>';
				else
				$m.='<tr><td><b><div id="Chatfrom" class="chat_other">'.$a[1].'</div></b><div class="chat_message">'.$a[3].'</div></td></tr>';
			}
		mysql_query("UPDATE `message` SET `status`=1 WHERE (`from`='$u' AND `to`='$n');");
		}
	
	else{
		$r=mysql_query("SELECT * FROM `shouter_message`");
		while($a=mysql_fetch_row($r)){
			if($a[1]==$n)
		$m.='<tr><td><b><div id="Chatfrom" class="chat_me">'.$a[1].'</div></b><div class="chat_message">'.$a[2].'</div></td></tr>';
		else
		$m.='<tr><td><b><div id="Chatfrom" class="chat_other">'.$a[1].'</div></b><div class="chat_message">'.$a[2].'</div></td></tr>';
		}
		}
	
	echo $m;
	}
	
	}
?>