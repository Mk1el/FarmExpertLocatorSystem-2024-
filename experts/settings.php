<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Settings</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    select, input[type="color"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Settings</h2>
        <label for="font-family">Font Style:</label>
        <select id="font-family">
            <option value="Arial, sans-serif">Arial</option>
            <option value="Verdana, Geneva, sans-serif">Verdana</option>
            <option value="Georgia, serif">Georgia</option>
        </select>

        <label for="page-color">Page Color:</label>
        <input type="color" id="page-color">

        <button onclick="applySettings()">Apply Settings</button>
    </div>

    <script>
        function applySettings() {
            var selectedFont = document.getElementById("font-family").value;
            var selectedColor = document.getElementById("page-color").value;

            document.body.style.fontFamily = selectedFont;
            document.body.style.backgroundColor = selectedColor;
        }
    </script>
</body>
</html>
