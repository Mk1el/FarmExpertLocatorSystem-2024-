
<?php include('partials/menu.php'); ?>
        <div class="main-content text-center">
         <div class="wrapper">
                
                <br><br>
                <?php
                if(isset($_SESSION['login']))
                {
                 echo $_SESSION['login'];
                unset($_SESSION['login']);
                }
                ?>
                <br><br>
                <?php


// Get count of users
$query_users = "SELECT COUNT(*) as user_count FROM users";
$result_users = mysqli_query($conn, $query_users);
$user_count = mysqli_fetch_assoc($result_users)['user_count'];

// Get count of experts
$query_experts = "SELECT COUNT(*) as expert_count FROM tbl_experts";
$result_experts = mysqli_query($conn, $query_experts);
$expert_count = mysqli_fetch_assoc($result_experts)['expert_count'];

// Get count of requests (if you have a requests table)
$query_requests = "SELECT COUNT(*) as request_count FROM tbl_requests";
$result_requests = mysqli_query($conn, $query_requests);
$request_count = mysqli_fetch_assoc($result_requests)['request_count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Welcome to the Admin Dashboard</h1>
    <div>
        <h2>Statistics:</h2>
        <ul>
            <li>Total Users: <?php echo $user_count; ?></li>
            <li>Total Experts: <?php echo $expert_count; ?></li>
            <li>Total Requests: <?php echo $request_count; ?></li>
        </ul>
    </div>
</body>
</html>

                
                <div class="clearfix"></div>
</div>

        </div>
      <?php include('partials/footer.php'); ?>  