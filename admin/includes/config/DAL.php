<?php
require_once "dbcon.php";

// global
function getId($table, $id)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function deleteId($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "Deleted Successfully.";
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

function getAll($table)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function getPopulars()
{
    global $conn;
    $sql = 'SELECT * FROM `products` WHERE popular = 1';
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        return $result;
    } else {
        return false;
    }
}

function getBrandsOfCategory($id)
{
    global $conn;
    $sql = "SELECT * FROM brands WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        return $result;
    } else {
        return false;
    }
}

function getProductsOfCategory($id)
{
    global $conn;
    $sql = "SELECT products.* FROM `products` INNER JOIN brands WHERE products.brand = brands.name AND brands.category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        return $result;
    } else {
        return false;
    }
}

function getQuery($sql)
{
    global $conn;
    if ($result = $conn->query($sql)) {
        return $result;
    } else {
        return false;
    }
}

// Categories
function addCategory($name, $description, $image)
{
    global $conn;
    $sql = "INSERT INTO categories (name, description, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $name, $description, $image);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

function updateCategory($id, $name, $description, $image)
{
    global $conn;
    $sql = "UPDATE categories SET name = ?, description = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $name, $description, $image, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

function get3Categories()
{
    global $conn;
    $sql = 'SELECT * FROM `categories` LIMIT 3';
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        return $result;
    } else {
        return false;
    }
}

// Brands
function addBrand($name, $slug, $category_id)
{
    global $conn;
    $sql = "INSERT INTO brands (name, slug, category_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $name, $slug, $category_id);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

function updateBrand($id, $name, $slug, $category_id)
{
    global $conn;
    $sql = "UPDATE brands SET name = ?, slug = ?, category_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssii', $name, $slug, $category_id, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

// Products
function addProduct($name, $description, $brand, $price, $quantity, $image, $popular, $featured)
{
    global $conn;
    $sql = "INSERT INTO `products` (`name`, `description`, `brand`, `price`, `quantity`, `image`, `popular`, `featured`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssdissi', $name, $description, $brand, $price, $quantity, $image, $popular, $featured);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

function updateProduct($id, $name, $description, $brand, $price, $quantity, $image, $popular, $featured)
{
    global $conn;
    $sql = "UPDATE products SET name = ?, description = ?, brand = ?, price = ?, quantity = ?, image = ?, popular = ?, featured = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssdissii', $name, $description, $brand, $price, $quantity, $image, $popular, $featured, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

// Users
function register($name, $email, $password, $role = 'user')
{
    global $conn;
    $sql = "INSERT INTO users(name,email,password,role) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $name, $email, $password, $role);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

function emailExists($email)
{
    global $conn;
    $sql = "SELECT id from users where email=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0)
            return true;
        else return false;
    } else {
        return false;
    }
}

function userExists($email, $password)
{
    global $conn;
    $sql = "SELECT * from users where email=? and password=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function updateUser($id, $name, $email, $password, $role)
{
    global $conn;
    $sql = "UPDATE users SET name=?, email=?, password=?, role=? where id=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $name, $email, $password, $role, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}
