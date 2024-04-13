<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    // Process form submission
    $id = $_GET['id'];
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

    // Update category in database
    $mysqli->query("UPDATE categories SET name='$name', description='$description', image='$image' WHERE id='$id'");

    // Redirect to index page
    header("Location: index.php");
    exit();
}

// Fetch category details
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    // Connect to MySQL
    $hostname= 'localhost';
    $username = 'root';
    $password= '';
    $database='test';
    $mysqli = mysqli_connect($hostname, $username, $password, $database);
    // Fetch category details
    $result = $mysqli->query("SELECT * FROM categories WHERE id='$id'");
    $category = $result->fetch_assoc();
} else {
    // Redirect to index page if no ID provided
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $category['name']; ?>" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required><?php echo $category['description']; ?></textarea><br><br>
        <label>Image URL:</label><br>
        <input type="text" name="image" value="<?php echo $category['image']; ?>" required><br><br>
        <button type="submit">Update Category</button>
    </form>
</body>
</html>
