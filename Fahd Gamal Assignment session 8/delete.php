<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Process deletion
    $id = $_GET['id'];

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

    // Delete category from database
    $mysqli->query("DELETE FROM categories WHERE id='$id'");

    // Redirect to index page
    header("Location: index.php");
    exit();
} else {
    // Redirect to index page if no ID provided
    header("Location: index.php");
    exit();
}
?>
