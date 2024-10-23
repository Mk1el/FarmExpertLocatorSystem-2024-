<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add categories of farm experts</h1>
        <br><br>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <br><br>
        <form action ="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
        <?php
        if(isset($_POST['submit']))
        {
           $title = $_POST['title'];
           if(isset($_POST['featured']))
           {
            $featured = $_POST['featured'];
           }
           else{
            $featured = "No";
           }
           if(isset($_POST['active']))
           {
            $active = $_POST['active'];
           }
           else{
            $active = "No";

           }
           //Check whether the image is selected and its value is correctly set
          if(isset($_FILES['image']['name']))
          {
              //upload the image
              $image_name = $_FILES['image']['name'];
              $source_path = $_FILES['image']['tmp_name'];
              $destination_path = "../images/category/".$image_name;
          }
          else{
            //Don't upload the image and set the image_name value as blank
            $image_name = "";
          }
           $sql = "INSERT INTO expert_category_table SET
           title='$title',
           featured='$featured',
           active='$active'";
           $res = mysqli_query($conn, $sql);
           if($res==TRUE)
           {//Query executed and category added
            $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
            header('location:'.SITEURL.'admins/manage_categories.php');
           }
        else{
            //Failed to add category
            $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
            header('location:'.SITEURL.'admins/add_category.php');
        }
    }
        ?>
    </div>
</div>
<?php include('partials/footer.php');?>