<?php

$server="localhost";
$user="root";
$pass="";
$database="login _register";

$conn=mysqli_connect($server,$user,$pass,$database);

if(!$conn){

	die("<script>alert('Connection failed!')</script>");

}

?>