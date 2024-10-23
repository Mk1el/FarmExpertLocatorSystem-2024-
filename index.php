<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
}

header {
    background-color: #2ecc71;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

nav ul {
    list-style: none;
    text-align: center;
    background-color: #27ae60;
    padding: 10px 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
}

nav ul li a:hover {
    background-color: #2ecc71;
}

main {
    max-width: 1200px;
    margin: 20px auto;
    padding: 0 20px;
}

footer {
    background-color: #34495e;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}
.container {
  text-align: center;
  margin: 20px auto;
}

h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

input[type="text"] {
  padding: 8px 12px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  width: 250px;
  margin-bottom: 10px;
}

input[type="submit"] {
  padding: 8px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}


    </style>
</head>




<?php 
        include('functions.php');
        if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
        if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header("location: login.php");
}
}
?>

<head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
</head>
<body>
                    
 <h1>Dashboard</h1>
 <br>
 
         <nav>
            <ul>
              <li><a href="index.php">Home</a></li>
<li><a href="user.php">Request Experts</a></li>
 <li><a href="update_profile.php">My Profile</a></li>
 <li><a href="message.php">Messages</a></li>
 <li><a href="notification.php">Notification</a></li>
 <li><a href="login.php">Logout</a></li>
            </ul>
         </nav>
       
         <button class="button">
        <a href="experts/home.php" class="btn-primary">See all available expert</a>
        </button>
        <br><br>
         <main>
<section class="welcome">
   <h2>Welcome, <?php echo $_SESSION['user']['username'];?></h2>
 <p>Find experts, manage your profile, and stay connected.</p>
</section>
         </main>
      
        
        
</body>
</html>
<body>
        <div class="header">
                <h2>Home Page</h2>
        </div>
        <div>
            
        </div>
        <div class="content">
                
                <?php if (isset($_SESSION['success'])) : ?>
                        <div class="error success" >
                                <h3>
                                        <?php 
                                                echo $_SESSION['success']; 
                                                unset($_SESSION['success']);
                                        ?>
                                </h3>
                        </div>
                <?php endif ?>
                
                <div class="profile_info">
                        <img src="images/user_profile.png"  >

                        <div>
                                <?php  if (isset($_SESSION['user'])) : ?>
                                        <strong><?php echo $_SESSION['user']['username']; ?></strong>

                                        <small>
                                                <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                                                <br>
                                                <a href="index.php?logout='1'" style="color: red;">logout</a>
                                        </small>
                                        

                                <?php endif ?>
                                
                        </div>
                </div>
         </div>
 </body>
 <br><br>
 
 <footer>
        <p>&copy; 2024 Farm Expert</p>
    </footer>






