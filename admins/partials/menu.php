<?php 
include('../config/db.php');

//Authorization/access control
//if(isset($_SESSION['user']))
//{
    //$_SESSION['no-login-message'] ="<div class='error text-center'>Please Login to Access Admin Panel</div>";
  //  header('location:'.SITEURL.'admins/login.php');

//}
?> 


<html>
    <head>
    <title> Farm Experts Order Site</title>
    <link rel="stylesheet" href="../css/admin.css">

    </head>
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="new.php">Home</a></li>
                    <li><a href="manage_admin.php">Admin</a></li>
                    <li><a href="manage_users.php">Users</a></li>
                    <li><a href="manage_requests.php">Requests</a></li>
                    <li><a href="manage_experts.php">Experts</a></li>
                    <li><a href="manage_reviews.php">Reviews</a></li>
                    <li><a href="manage reports.php">Reports</a></li>
                    <li><a href="logout.php">Logout</a></li>
                   
                </ul>
                

            </div>

        </div>