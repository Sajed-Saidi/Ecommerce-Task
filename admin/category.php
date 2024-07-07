<?php include('includes/header.php');
include('includes/config/DAL.php');
$categories = getAll('categories');
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Categories
                <a href="addCategory.php" class="btn btn-primary text-white">
                    Add Category
                </a>
            </h4>

            <?php

            if (!$categories)
                echo "No categories found.";
            else {
                echo '<table class="table table-bordered bg-white">
                <thead class="font-weight-bolder">
                    <td>ID</td>
                    <td>Name</td>
                    <td style="text-wrap: balance;">Description</td>
                    <td>Image</td>
                    <td>Action</td>
                </thead>
                <tbody>';
                while ($row = $categories->fetch_assoc()) {

                    echo '
                <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td>
                        <img width="60px" height="60px" src="images/' . $row['image'] . '" alt="">
                    </td>
                    <td>
                        <a href="editCategory.php?id=' . $row['id'] . '" class="btn btn-success text-white btn-sm">
                            Edit
                        </a>
                        <form class="d-inline" action="includes/config/BL.php" method="POST" >
                            <input type="hidden" name="id" value="' . $row['id'] . '" />
                            <button type="submit" class="btn btn-danger text-white btn-sm" name="delete_category">
                                    Delete
                            </button>
                        </form> 
                    </td>
                        </tr>';
                }
                echo "</tbody>
            </table>";
            }
            ?>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>