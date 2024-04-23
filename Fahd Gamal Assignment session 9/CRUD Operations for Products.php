<?php

require_once './Connection.php';

// Create Product
function createProduct($name, $description, $image, $price, $category_id) {
    global $conn;
    $sql = "INSERT INTO products (name, description, image, price, category_id) 
            VALUES ('$name', '$description', '$image', $price, $category_id)";
    return $conn->query($sql);
}

// Read Products
function getProducts() {
    global $conn;
    $sql = "SELECT products.*, categories.name AS category_name 
            FROM products 
            LEFT JOIN categories ON products.category_id = categories.id";
    $result = $conn->query($sql);
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}

// Read Products by Category
function getProductsByCategory($category_id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE category_id=$category_id";
    $result = $conn->query($sql);
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}

// Update Product
function updateProduct($id, $name, $description, $image, $price, $category_id) {
    global $conn;
    $sql = "UPDATE products SET 
            name='$name', description='$description', image='$image', 
            price=$price, category_id=$category_id 
            WHERE id=$id";
    return $conn->query($sql);
}

// Delete Product
function deleteProduct($id) {
    global $conn;
    $sql = "DELETE FROM products WHERE id=$id";
    return $conn->query($sql);
}
?>
