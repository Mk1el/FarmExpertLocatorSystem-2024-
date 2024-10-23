<?php
//START SESSION
session_start();
define('SITEURL','http://localhost/Agriculture/');
$conn = mysqli_connect("localhost", "root", "", "experts");
if(!$conn){
    die("Database connection failed");
}

?>