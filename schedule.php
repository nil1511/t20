<?php require_once('config.php');
require_once('functions.php');
$q = mysql_query('SELECT * FROM `match_schedule`');
?>
<style>
span{cursor:default;}
/**span:hover{color:#FF00FF;font-size:1.2em;}**/
</style>
<script type="text/javascript" src="script/jquery.js" ></script>
<script type="text/javascript">
function gettime(t){
	var d = Math.floor(t/(86400000));  
	var h = Math.floor((t/3600000) - (24*d));
	var m = Math.floor((t/60000) - (1440*d) - (60*h));
	var s = Math.floor((t/1000)-(86400*d)-(3600*h)-(60*m));
	if(d<0 && m<0 && h<0 && s<0)
	return 'Match Over';
	else
	return d+' Days '+h+' Hours '+m+' Min. '+s+' Sec is remaining';
}
var tim;
var diff;
function t(){
	$('#label').html(gettime(diff));
	diff--;
	setTimeout(t,1000);
}
$(document).ready(function(e) {
	$('span').hover(function(e) {
		var s =e.currentTarget.innerHTML;
        var d = new Date();
		var r = new Date(e.currentTarget.id*1000);
		diff =r.valueOf() - d.valueOf(); 
		t();
	},function(e){
		//clearInterval(tim);
		$('#label').html('');
		});
});
</script>
<label id='label'></label><br />
<?
while($v = mysql_fetch_assoc($q)): ?>
<span id='<?= strtotime($v['date'].' '.$v['time']);?>'><?= $v['team1']; ?> Vs <?= $v['team2']; ?> on <?= formatDate($v['date'],$v['time']); ?> at <?= $v['venue']; ?> <?= played($v['date'],$v['time']); ?></span><br />
<? endwhile; ?>