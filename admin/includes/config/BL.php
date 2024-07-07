<?php
include('../../functions.php');
include('DAL.php');

session_start();
// Categories
if (isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    $path = "../../images/";
    $file_name = getImage($image);

    $result = addCategory($name, $description, $file_name);

    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . $file_name);

        redirect('../../category.php', "Category Added!");
    } else {
        redirect('../../addCategory', "Category Not Added!");
    }
}
if (isset($_POST['update_category'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $update_image;
    $file_name;
    if ($image  != null) {
        $update_image = $image;
        $path = "../../images/";
        $file_name = getImage($update_image);
    } else {
        $update_image = $old_image;
        $file_name = $old_image;
    }


    $result = updateCategory($id, $name, $description, $file_name);

    if ($result) {
        if ($_FILES['image']['name'] != '') {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . $file_name);
            if (file_exists($path . $old_image)) {
                unlink($path . $old_image);
            }
        }

        redirect('../../category.php', "Category Updated!");
    } else {
        redirect('../../editCategory.php', "Category Not Updated!");
    }
}
if (isset($_POST['delete_category'])) {
    $id = $_POST['id'];

    deleteId("categories", $id);

    redirect('../../category.php', "Category Deleted!");
}

// Brands
if (isset($_POST['add_brand'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $category_id = $_POST['category_id'];

    $result = addBrand($name, $slug, $category_id);

    if ($result) {
        redirect('../../brand.php', "Brand Added!");
    } else {
        redirect('../../addBrand.php', "Brand Not Added!");
    }
}
if (isset($_POST['update_brand'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $category_id = $_POST['category_id'];

    echo $id . '  ' . $name . ' ' . $slug . ' ' . $category_id;

    $result = updateBrand($id, $name, $slug, $category_id);

    if ($result) {
        redirect('../../brand.php', "Brand Updated!");
    } else {
        redirect('../../editBrand.php', "Brand Not Added!");
    }
}
if (isset($_POST['delete_brand'])) {
    $id = $_POST['id'];

    deleteId("brands", $id);

    redirect('../../brand.php', "Brand Deleted!");
}

// Products
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image']['name'];
    $file_name = getImage($image);
    $popular = (isset($_POST['popular'])) ? 1 : 0;
    $featured = (isset($_POST['featured'])) ? 1 : 0;
    $result = addProduct(

        $name,
        $description,
        $brand,
        $price,
        $quantity,
        $file_name,
        $popular,
        $featured
    );

    if ($result) {
        $path = "../../images/";
        move_uploaded_file($_FILES['image']['tmp_name'], $path . $file_name);

        redirect('../../product.php', "Product Added!");
    } else {
        redirect('../../addProduct.php', "Product Not Added!");
    }
}
if (isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $popular = (isset($_POST['popular'])) ? 1 : 0;
    $featured = (isset($_POST['featured'])) ? 1 : 0;

    $image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $file_name;

    if ($image  != null) {
        $file_name = getImage($image);
    } else {
        $file_name = $old_image;
    }


    $result = updateProduct(

        $id,
        $name,
        $description,
        $brand,
        $price,
        $quantity,
        $file_name,
        $popular,
        $featured
    );

    if ($result) {
        if ($_FILES['image']['name'] != '') {
            $path = "../../images/";
            move_uploaded_file($_FILES['image']['tmp_name'], $path . $file_name);
            if (file_exists($path . $old_image)) {
                unlink($path . $old_image);
            }
        }

        redirect('../../product.php', "Product Updated!");
    } else {
        redirect('../../editProduct.php', "Product Not Updated!");
    }
}
if (isset($_POST['delete_product'])) {
    $id = $_POST['id'];

    deleteId("products", $id);

    redirect('../../product.php', "Product Deleted!");
}


// Users
if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $email_exists = emailExists($email);

    if ($email_exists) {
        redirect("../../../register.php", "Email Already Exists!");
    } else {
        if ($password != $confirm_password) {
            redirect("../../../register.php", "Passwords does not match!");
        } else {
            $result = register($name, $email, $password);

            if (!$result) {
                redirect("../../../register.php", "Something went wrong!");
            } else {
                $user = mysqli_fetch_array(userExists($email, $password));

                $_SESSION['auth'] = true;

                $_SESSION['auth_user'] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
                redirect("../../../index.php", "Registered Successfully!");
            }
        }
    }
}
if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = userExists($email, $password);
    if (!$user) {
        redirect("../../../login.php", "Invalid info!");
    } else {
        $_SESSION['auth'] = true;
        $user = mysqli_fetch_array($user);
        $_SESSION['auth_user'] = [
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role']
        ];

        redirect("../../../index.php", "Login Successfully!");
    }
}
if (isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $email_exists = emailExists($email);

    if ($email_exists) {
        redirect('../../addUser.php', "Email already exists");
    } else {
        $result = register($name, $email, $password, $role);
        if (!$result) {
            redirect("../../addUser.php", "User not Added!");
        } else {
            redirect("../../user.php", "User Added !");
        }
    }
}
if (isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $user = getId('users', $id);
    $user = mysqli_fetch_array($user);

    if ($user['email'] != $email) {
        $email_exists = emailExists($email);
        if ($email_exists) {
            redirect('../../editUser.php?id=' . $id, "Email already exists");
        }
    }
    $result = updateUser($id, $name, $email, $password, $role);
    if (!$result) {
        redirect("../../editUser.php?id=" . $id, "User not Updated!");
    } else {
        redirect("../../user.php", "User Updated !");
    }
}
if (isset($_POST['delete_user'])) {
    $id = $_POST['id'];

    deleteId("users", $id);

    redirect('../../user.php', "User Deleted!");
}
