<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br><br>
        <?php
        if(isset($_GET['id']))
        {
            $id =$_GET['id'];
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Old Password">
                    </td>

                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
</div>
</div>
<?php
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);
    
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
    $res =mysqli_query($conn,$sql);
    if($res==true)
    {
        $count=mysqli_num_rows($res);
        if($count==1)
        {
           //Check whether the new password and confirm password match or not
           if($new_password==$confirm_password)
           {
               //update the password
               $sql2="UPDATE tbl_admin SET password='$new_password' WHERE id=$id";
               $res2=mysqli_query($conn,$sql2);
               if($res2==true)
               {
                   //display message
                   $_SESSION['change-pwd']="<div class='success'>Password Changed Successfully</div>";
                   header('location:'.SITEURL.'admins/manage_admin.php');
               }else{
                   //display message
                   $_SESSION['change-pwd']="<div class='error'>Failed to Change Password</div>";
                   header('location:'.SITEURL.'admins/manage_admin.php');
               }

           }
            //user exists and password can be changed
        }else
        {
            $_SESSION['user not found']="<div class='error'>User not found</div>";
            header('location:'.SITEURL.'admins/manage_admin.php');
        }
        
    }
}

?>
<?php include('partials/footer.php'); ?>