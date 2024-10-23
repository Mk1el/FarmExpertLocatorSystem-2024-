<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "experts";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the search query
if(isset($_GET['query'])) {
    $search_query = $_GET['query'];

    // Construct the SQL query
    $sql = "SELECT * FROM products WHERE name LIKE '%$search_query%' OR description LIKE '%$search_query%'";

    // Execute the query
    $result = $conn->query($sql);

    // Display the search results
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Product: " . $row["name"]. " - Description: " . $row["description"]. "<br>";
        }
    } else {
        echo "No results found";
    }
}

// Close the connection
$conn->close();
?>

<style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="text"] {
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
   
        </form>
    </div>
</body>
     <head>   
    <title>Categories of Farm Experts</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}
.btn-primary {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Categories of Farm Experts</h1>
        <table>
            <tbody>
            <tr>
               
                <tr>
                <h><b><u>Crop Managers</u></b></h>
                    <td>
                    
                     <img src="images/Crop Management.jpg" alt="Crop manager">
                     <p>Deals with crops.</p>
                     <a href="request.php" class="btn-primary">Request an expert</a>
                     </td>   
                </tr>
                <tr>
                  <td>
                    <img src="images/Cow Specialist.jpg" alt="Cow Specialist"><br><br>
                    <h><b><u>Livestock Experts</u></b></h>
                    <p>Deals with livestock problems.<br><br>Experts in animal husbandry and livestock management</p>
                    <a href="request.php" class="btn-primary">Request an expert</a>
                  </td>
                </tr>
                
                <tr>
                   <td>
                    <img src="images/Soil scientist.jpg" alt="Soil Scientist"><br><br>
                    <h><b><u>Soil Scientists</u></b></h>
                    <p>Analyzes characteristics of soil, the different soil types, and<br><br> research the ability of crops to survive in differentiated soil conditions</p>
                    <a href="request.php" class="btn-primary">Request an expert</a>
                   </td>
                </tr>
                
                <tr>
                   <td>
                    <img src="images/Agri Engineer.jpg" alt="Agri Engineer"><br><br>
                    <h><b><u>Agricultural Engineers</u></b></h>
                    <p> Solving problems found in agricultural production.<br><br> Goals may include designing safer equipment for food processing or reducing erosion.</p>
                    <a href="request.php" class="btn-primary">Request an expert</a>
                   </td>
                </tr>

                <tr>
                
                   <td>
                    
                    <img src="images/Ecomonics.jpg" alt="Economics"><br><br>
                    <h><b><u>Agricultural Economics</u></b></h>
                    <p>Solve challenges in business context which involves where products are being consumed, developed, financed, grown, marketed, processed, regulated, researched, taxed and transported.</p>
                    <a href="request.php" class="btn-primary">Request an expert</a>
                   </td>
                </tr>
          
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>
</body>
</html>