<!DOCTYPE html>
<html>
<style>
  /* Style the <ul> element */
ul {
  list-style-type: none; /* Remove bullet points */
  margin: 0; /* Remove default margin */
  padding: 0; /* Remove default padding */
}

/* Style the <li> elements */
ul li {
  display: inline-block; /* Display list items horizontally */
}

/* Style the <a> elements */
ul li a {
  display: block;
  color: green; /* Set link color */
  text-decoration: none; /* Remove underline */
  padding: 10px 20px; /* Add padding */
  transition: background-color 0.3s; /* Add transition effect */
}

/* Change link color on hover */
ul li a:hover {
  background-color: #ddd; /* Change background color on hover */
  color: #000; /* Change text color on hover */
}


    </style>
<ul>
              <li><a href="index.php">Home</a></li>
<li><a href="user.php">Search Experts</a></li>
 <li><a href="update_profile.php">My Profile</a></li>
 <li><a href="message.php">Messages</a></li>
 <li><a href="notification.php">Notification</a></li>
 <li><a href="login.php">Logout</a></li>
            </ul>
</html>