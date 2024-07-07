<?php include('includes/header.php');
include('includes/config/DAL.php');
$users = getAll('users');
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Users
                <a href="addUser.php" class="btn btn-primary text-white">
                    Add User
                </a>
            </h4>
            <?php
            if (!$users)
                echo "No users found.";
            else {
                echo '<table class="table table-bordered bg-white">
                <thead class="font-weight-bolder">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Action</td>
                </thead>
                <tbody>';
                while ($row = $users->fetch_assoc()) {
                    echo '
                <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['role'] . '</td>
                    <td>
                        <a href="editUser.php?id=' . $row['id'] . '" class="btn btn-success text-white btn-sm">
                            Edit
                        </a>
                        <form class="d-inline" action="includes/config/BL.php" method="POST" >
                            <input type="hidden" name="id" value="' . $row['id'] . '" />
                            <button type="submit" class="btn btn-danger text-white btn-sm" name="delete_user">
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