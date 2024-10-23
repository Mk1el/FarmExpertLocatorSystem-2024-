<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Already Submitted Form</title>
  <style>
    .container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.success-message {
  background-color: #28a745;
  color: #fff;
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 10px;
  display: none;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>

  <div class="container">
    <h1>Submit Form</h1>
    <form id="submitForm" method="POST" action="submit_form.php">
      <div id="successMessage" class="success-message" style="display: none;">You have already submitted the form.</div>
      
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
  // Check if form has already been submitted (you can replace this with your logic)
  var alreadySubmitted = true; // Set to true if the form has already been submitted

  if (alreadySubmitted) {
    document.getElementById('successMessage').style.display = 'block';
    document.getElementById('submitButton').disabled = true;
  }
});

  </script>
</body>
</html>
