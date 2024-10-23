<?php include('partials/menu.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Farm Expert</title>
    <style>
        body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

h2 {
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Add Farm Expert</h2>
        <form id="expertForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" required>
            </div>
            <input type="submit" name="submit" value="Add Expert" >
        </form>
    </div>
    <?php
//Process the form value and save it in a database
if(isset($_POST['submit']))
{
    //echo "Button clicked";
    //Get data from form
    $name=$_POST['name'];
    $specialization=$_POST['specialization'];
    $contact=$_POST['contact'];
    $location = $_POST['location'];

    $sql = "INSERT INTO  tbl_regexpert SET
    name='$name',
    specialization='$specialization',
    contact='$contact',
    location='$location'";
    //Save in database
    

    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    if($res==TRUE)
    {
        //data inserted successfully
        $_SESSION['add'] = "Farm Expert added successfully";
        //redirect page to manage admin page
        header('location:'.SITEURL.'admins/manage_requests.php');
        
    }
    else{
        $_SESSION['add'] = "Failed to add a farm expert";
        //redirect page to manage admin page
        header('location:'.SITEURL.'admins/add_expert.php');
        
        ;
    }
}

?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('expertForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent form submission

        // Fetch form values
        const name = document.getElementById('name').value;
        const specialization = document.getElementById('specialization').value;
        const contact = document.getElementById('contact').value;

        // Validate form values (you can add more validation logic here if needed)

        // Create an object with the form data
        const expertData = {
            name: name,
            specialization: specialization,
            contact: contact
        };

        // Here you can send the expertData object to your backend for processing (e.g., via AJAX)

        // For demonstration purposes, let's log the data to the console
        console.log('New Farm Expert:', expertData);

        // Clear the form fields after submission
        form.reset();
    });
});

    </script>
</body>
</html>
