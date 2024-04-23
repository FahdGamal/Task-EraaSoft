<?php

require_once './Connection.php';
// Create Category
function createCategory($name) {
    global $conn;
    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    return $conn->query($sql);
}

// Read Categories
function getCategories() {
    global $conn;
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    return $categories;
}

// Update Category
function updateCategory($id, $name) {
    global $conn;
    $sql = "UPDATE categories SET name='$name' WHERE id=$id";
    return $conn->query($sql);
}

// Delete Category
function deleteCategory($id) {
    global $conn;
    $sql = "DELETE FROM categories WHERE id=$id";
    return $conn->query($sql);
}
?>
