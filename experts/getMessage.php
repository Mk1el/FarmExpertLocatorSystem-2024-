<?php
include 'db.php'; // Include your database connection
if (isset($_POST['sender_id']) && isset($_POST['receiver_id'])) {
    // Access form data
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];

// Retrieve messages from the database
$sql = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp ASC";
$stmt = $con->prepare($sql);
$stmt->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);

$stmt->close();
$conn->close();}
?>
