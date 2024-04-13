<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // Connect to MySQL

    $hostname= 'localhost';
    $username = 'root';
    $password= '';
    $database='test';
    $mysqli = mysqli_connect($hostname, $username, $password, $database);   

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    // Insert new category into database
    $mysqli->query("INSERT INTO categories (name, description, image) VALUES ('$name', '$description', '$image')");

    // Redirect to index page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Category</title>
</head>
<body>
    <h1>Add New Category</h1>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>
        <label>Image URL:</label><br>
        <input type="text" name="image" required><br><br>
        <button type="submit">Add Category</button>
    </form>
</body>
</html>
