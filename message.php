<?php
include 'db.php';
if (isset($_POST['sender_id']) && isset($_POST['receiver_id']) && isset($_POST['message'])) {
    // Access form data
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];
 // Include your database connection

 


// Insert the message into the database
$sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
echo "Message sent successfully";
$stmt = $con->prepare($sql);
$stmt->bind_param("iis", $sender_id, $receiver_id, $message);
$stmt->execute();

$stmt->close();
$conn->close();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Farmers Messaging App</title>
<style>
    body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

.message-container {
    max-height: 300px;
    overflow-y: scroll;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
}

textarea {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    resize: none;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    border-radius: 5px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
</head>
<body>
<div class="container">
    <h1>Farmers Messaging App</h1>
    <div class="message-container" id="message-container">
        <!-- Display messages here -->
    </div>
    <form id="message-form" action="message.php" method="post">
        <textarea name="message" id="message" placeholder="Type your message..."></textarea>
        <input type="submit" value="Send">
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // Load messages initially
        loadMessages();
        // Auto-refresh messages every 5 seconds
        setInterval(function(){
            loadMessages();
        }, 5000);
    });

    // Function to load messages
    function loadMessages() {
        $('#message-container').load('getMessages.php');
    }
</script>
</body>
</html>
