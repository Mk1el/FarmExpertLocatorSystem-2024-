<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Form</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Booking Form</h2>
    <form id="bookingForm" method="POST" action="process_booking.php">
        <label for="expert">Expert:</label>
        <input type="text" id="expert" name="expert" readonly> <!-- Display selected expert's name -->
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        <input type="hidden" id="selectedExpertId" name="selectedExpertId"> <!-- Hidden input to store selected expert's ID -->
        <button type="submit">Book</button>
    </form>
</div>

<script>
// JavaScript to set the selected expert's name and ID in the form
document.addEventListener("DOMContentLoaded", function() {
    const expertLinks = document.querySelectorAll(".expert-link");

    expertLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            const expertId = this.getAttribute("data-expert-id");
            const expertName = this.textContent.trim();
            document.getElementById("expert").value = expertName;
            document.getElementById("selectedExpertId").value = expert_Id;
        });
    });
});
</script>
</body>
</html>
