<?php
$conn_error = 'Could not connect to database.';

$mysql_host = '172.16.100.4';
$mysql_user = 'ignus';
$mysql_pass = 'ignus9876';

$mysql_db = 'ignus';

if(!@mysql_connect($mysql_host,$mysql_user,$mysql_pass) || 
	!@mysql_select_db($mysql_db)) {
	die($conn_error);
}
?>
