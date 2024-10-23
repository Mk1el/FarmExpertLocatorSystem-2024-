<?php
include('../config/db.php');
//Get the id of admin to be deleted
$id = $_GET['id'];
//Create sql query to delete admin
$sql = "DELETE FROM users WHERE user_id=$id";
//Execute the query
$res = mysqli_query($conn, $sql);
if($res==true){
    //Query executed and admin deleted
    $_SESSION['delete'] = "<div class='success'>User deleted successfully</div>";
    header('localhost: '.SITEURL.' admins/display_users.php');
    
}else{
    //Failed to delete admin
    $_SESSION['delete'] = "<div class='error'>Failed to delete user</div>";
    header('localhost:'.SITEURL.'display_users.php'); 
    

}
//Redirect to manage Admin page with message(success or error)
?>