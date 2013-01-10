<?php
//database variable for use
$DBPATH = 'localhost';
$DBUSER = 'root';
$DBPASS = '';
$DBNAME = 't20';
$con = mysql_connect($DBPATH,$DBUSER,$DBPASS) or die('Could not connect');
$db = mysql_select_db($DBNAME) or die('DB Not Found');
if(function_exists('date_default_timezone_set'))
date_default_timezone_set('Asia/Kolkata');
mysql_query("SET SESSION time_zone = '+5:30'");
?>