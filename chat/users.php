<?
session_start();
require('../config.php');
if(isset($_POST))
{	$t = 0;
	$users = $_POST['users'];
	$r='';
	function users(){
	$re = mysql_query('SELECT * FROM `chat`') or die('error');
	$v='';
		//echo $users;
		while($ue=mysql_fetch_row($re))
			{
				if($ue[0]!=$_SESSION['name'])
				$v .='<li onclick="msg(\''.$ue[0].'\');" class="users">'."$ue[0]".'</li>';
			}
			$v = '<div class="users_div">'.$v.'</div>';
	return $v;		
	}

	for($t = 0;$t<5;$t++){
		$r = users();
		if($users!=$r)
		{
		die($r);
		break;
		}
		sleep(4);
	}
echo $r;		
}
?>