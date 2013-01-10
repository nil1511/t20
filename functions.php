<?php
function formatDate($date='',$time=''){
	return strftime("%d %b,%Y %A at %I:%M %p",strtotime($date.' '.$time));
}

function played($date='',$time=''){
	return (strtotime('now')-strtotime($date.' '.$time))<(14400)?'Not Played':'Played';
}
?>