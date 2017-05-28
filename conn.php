<?php
$server="localhost";
$username="root";
$password="";
$dbname="registrybook";
$conn=new mysqli($server,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed");
}

?>