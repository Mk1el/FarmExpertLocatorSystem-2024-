<?php include('partials/menu.php');?>
<?php
// Assuming you have a database connection already established

// Function to insert a new notification
function createNotification($type, $message, $user_id) {
    global $pdo; // Assuming $pdo is your database connection

    $stmt = $pdo->prepare("INSERT INTO notify (type, message, user_id, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$type, $message, $user_id]);
}

// Function to fetch notifications for a user
function getNotifications($user_id) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM notify WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Example usage to create a notification
// Assuming an event occurs, like a new expert registration
$newExpertId = 123; // ID of the new expert
$message = "A new expert with ID $newExpertId has registered.";
$user_id = 1; // ID of the admin user
createNotification('new_expert_registration', $message, $user_id);

// Example usage to display notifications
$user_id = 1; // ID of the admin user
$notifications = getNotifications($user_id);

// Display notifications in your admin panel interface
foreach ($notifications as $notification) {
    echo "<div>";
    echo "<strong>" . $notification['created_at'] . "</strong>: ";
    echo $notification['message'];
    echo "</div>";
}
?>

