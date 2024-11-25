<?php include('partials/menu.php'); ?>
<?php 
require_once('../config/db.php');
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com" >
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fonts Links (Roboto 400, 500 and 700 included) -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">

  <!-- CSS Files Links -->
  
  <!-- Title -->
  <title>View Users</title>
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
 <div class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="text-center text-white">Welcome to the User Page</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <tr class="bg-dark">
                                <td>id</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                                <?php
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <td><?php echo $row['user_id'];?></td>
                                    <td><?php echo $row['username'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    
                                    
                    
                                   <td align="center">
                                    <a href="delete_users.php?id=<?php echo $row["user_id"]; ?>"class="btn-danger">Delete</a>
                                   </td>
                                    
                                </tr>
                                    <?php
                                }
                                ?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</body>
</html>