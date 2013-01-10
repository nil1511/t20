<?
require_once('../config.php');
session_start();
if(!empty($_SESSION['name']))
{		$me = $_SESSION['name'];	
		$q = mysql_query("SELECT `user` FROM `chat` WHERE `user`='$me'");
		//add user
		if(mysql_num_rows($q)==0)
		mysql_query("INSERT INTO `chat`(`user`, `Time`) VALUES ('$me',now())");
	//update user
	else
		mysql_query("UPDATE `chat` SET `Time`=now() WHERE `user`='$me'");
		//remove offline users
		$now = date('Y-m-d G:i:s');
		$q= mysql_query('SELECT `Time` FROM `chat` WHERE `user`!= "ShoutAtMe"');
		while($d =mysql_fetch_row($q))
		{	//removes user if offline for more than 10 sec.
			if(strtotime($now)-strtotime($d[0])>10)
			{
				mysql_query("DELETE FROM `chat` WHERE `Time`='$d[0]'");
			}			
		}	
	echo $me;	
}
?>