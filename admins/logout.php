<?php
include('../config/db.php');
session_destroy();//Unset user and $_SESSION
header('Location:'.SITEURL.'admins/login.php'); 
?>