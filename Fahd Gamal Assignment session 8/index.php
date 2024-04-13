<?php
$hostname= 'localhost';
$username = 'root';
$password= '';
$database='test';

// Connect to MySQL
$mysqli = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Fetch categories from database
$result = $mysqli->query("SELECT * FROM categories");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category CRUD</title>
</head>
<body>
    <h1>Categories</h1>
    <a href="create.php">Add New Category</a>
    <ul>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <li>
                <strong><?php echo $row['name']; ?></strong>
                <p><?php echo $row['description']; ?></p>
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>

<?php
// Close connection
$mysqli->close();
?>
