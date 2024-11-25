<?php
include('../config/db.php');
//Get the id of admin to be deleted
$id = $_GET['id'];
//Create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";
//Execute the query
$res = mysqli_query($conn, $sql);
if($res==true){
    //Query executed and admin deleted
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
    header('localhost: '.SITEURL.' admins/manage_admin.php');
    
}else{
    //Failed to delete admin
    $_SESSION['delete'] = "<div class='error'>Failed to delete admin</div>";
    header('localhost:'.SITEURL.'admins/manage_admin.php'); 
    

}
//Redirect to manage Admin page with message(success or error)
?>