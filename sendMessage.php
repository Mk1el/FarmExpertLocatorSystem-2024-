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
<html>
    <body>
        <script>
            $(document).ready(function() {
    $('#chatForm').submit(function(e) {
        e.preventDefault();
        
        var formData = {
            sender_id: $('input[name="sender_id"]').val(),
            receiver_id: $('input[name="receiver_id"]').val(),
            message: $('textarea[name="message"]').val()
        };
        
        $.ajax({
            type: 'POST',
            url: 'sendMessage.php',
            data: formData,
            success: function(response) {
                // Handle success
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Log any errors for debugging
            }
        });
    });
});

        </script>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <style>
       

    </style>
</head>
<body>

    <form id="chatForm">
    <input type="hidden" name="sender_id" value="?"> <!-- Replace "1" with the actual sender's ID -->
    <input type="hidden" name="receiver_id" value="?"> <!-- Replace "2" with the actual receiver's ID -->
    <textarea name="message" required></textarea>
    <input type="submit">
</form>

    </body>
</html>
