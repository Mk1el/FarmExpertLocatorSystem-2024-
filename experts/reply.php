<?php
session_start();
require_once "db.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve user's ID from session
$user_id = $_SESSION['user_id'];

// Check if message ID is provided
if (isset($_GET['id'])) {
    $message_id = $_GET['id'];
    
    // Retrieve message details
    $sql = "SELECT * FROM messages WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $message = $result->fetch_assoc();

        // Display message content and form to reply
        echo "From: " . $message['sender_id'] . "<br>";
        echo "Message: " . $message['message'] . "<br>";
        echo "<form action='sendMessage.php' method='post'>";
        echo "<input type='hidden' name='receiver_id' value='" . $message['sender_id'] . "'>";
        echo "<textarea name='message' placeholder='Type your reply...'></textarea><br>";
        echo "<input type='submit' value='Send'>";
        echo "</form>";
    } else {
        echo "Message not found.";
    }

    $stmt->close();
} else {
    echo "Message ID not provided.";
}

$conn->close();
?>
