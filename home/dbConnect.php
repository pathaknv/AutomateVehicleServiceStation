<?php
$mysql_host= "localhost" ;
	$mysql_user = "root" ;
	$mysql_pass ="" ;
	$con_error ="could not connect";
	$db= "iot" ;
	$con= mysqli_connect($mysql_host,$mysql_user,$mysql_pass) or die($con_error);

	if(!$con || !mysqli_select_db($con, $db))
	{
		echo "Not connectio";
		die($con_error);
	}	
?>