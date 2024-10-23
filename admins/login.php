<?php include('../config/db.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page for Admin</title>
  
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .login-form button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .login-form button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login Admin</h2>
    <br><br>
    <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    ?>
    <form action="" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required><br><br>
      <input type="submit" name="submit" value="Login">
      
    </form>
  </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  
  $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
  $res = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($res);
  if($count==1){
    $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
    $_SESSION['user'] = $username;//Check whether the user is logged in or not

    header('location:'.SITEURL.'admins/new.php');

  }else{
    $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
    header('location:'.SITEURL.'admins/login.php');
    //Users not availble
  }
}
?>
