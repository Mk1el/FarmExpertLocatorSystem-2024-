<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Expert Home</title>
    <style>
		/* Reset styles */
body, h1, h2, h3, p, ul, li {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
}

header {
    background-color: #2ecc71;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

nav ul {
    list-style: none;
    text-align: center;
    background-color: #27ae60;
    padding: 10px 0;
}

nav ul li {
    display: inline;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
}

main {
    max-width: 1200px;
    margin: 20px auto;
    padding: 0 20px;
}

.hero {
    background-image: url('farm.jpg');
    background-size: cover;
    color: #fff;
    text-align: center;
    padding: 100px 0;
}

.hero h2 {
    font-size: 36px;
    margin-bottom: 20px;
}

.hero p {
    font-size: 18px;
    margin-bottom: 30px;
}

.cta-button {
    background-color: #2ecc71;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    font-size: 16px;
}

footer {
    background-color: #34495e;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

	</style>

</head>
<body>
    <header>
        <h1>Welcome to Farm Expert Platform</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <main>
        <section class="hero">
            <h2>Your Partner in Farming Success</h2>
            <p>Find expert advice, resources, and solutions for your farm.</p>
            <a href="register.php" class="cta-button">Get Started</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Produced by Moses Kilonzo</p>
    </footer>
</body>
</html>
