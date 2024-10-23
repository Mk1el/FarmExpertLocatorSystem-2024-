<?php include('partials/menu.php');

require_once('../config/db.php');
$query = "SELECT * FROM tbl_experts";
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
    /* Basic table styling */
table {
  width: 100%;
  border-collapse: collapse;
}

/* Table header */
th {
  background-color: #f2f2f2;
  text-align: left;
  padding: 8px;
}

/* Table rows */
tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Table data cells */
td {
  border-bottom: 1px solid #ddd;
  padding: 8px;
}

/* Hover effect */
tr:hover {
  background-color: #ddd;
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
                        <h1 class="text-center text-white">Welcome to the Enrolled expert Page</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <tr class="bg-dark">
                                <td>id</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Email</td>
                                <td>Expertise</td>
                                <td>Location</td>
                                <td>Description</td>
                                <td>Active</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                                <?php
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <td><?php echo $row['expert_id'];?></td>
                                    <td><?php echo $row['f_name'];?></td>
                                    <td><?php echo $row['l_name'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['expertise'];?></td>
                                    <td><?php echo $row['location'];?></td>
                                    <td><?php echo $row['description'];?></td>
                                    
                                    <td>
                                        <a href="available_experts.php?id=<?php echo $row["expert_id"]; ?>"class="btn-primary">Active</a>
                                    </td>
                    
                                   <td align="center">
                                    <a href="delete_requests.php?id=<?php echo $row["expert_id"]; ?>"class="btn-danger">Delete</a>
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