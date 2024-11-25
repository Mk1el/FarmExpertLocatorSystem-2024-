<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add user</h1>
        <br><br>
        <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30" >
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" placeholder="Enter name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Your password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add user" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php');?>
<?php
//Process the form value and save it in a database
if(isset($_POST['submit']))
{
    //echo "Button clicked";
    //Get data from form
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);//password encryption with md5
    //sql query to save the value in the database table
    $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'";
    //Save in database
    

    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    if($res==TRUE)
    {
        //data inserted successfully
        $_SESSION['add'] = "Admin added successfully";
        //redirect page to manage admin page
        header('location:'.SITEURL.'admins/manage_users.php');
        
    }
    else{
        $_SESSION['add'] = "Failed to add admin";
        //redirect page to manage admin page
        header('location:'.SITEURL.'admins/manage_admin.php');
        
        ;
    }
}

?>