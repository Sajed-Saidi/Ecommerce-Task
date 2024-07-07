<?php include('includes/header.php');
include "includes/config/DAL.php";
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Edit User
                <a href="user.php" class="btn btn-primary text-white">
                    Back
                </a>
            </h4>
            <?php if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $user = getId('users', $id);

                if (mysqli_num_rows($user) > 0) {
                    $user = mysqli_fetch_array($user);
            ?>
                    <form action="includes/config/BL.php" method="POST" class="px-3 py-1" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class=" px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <input type="text" name="name" value="<?= $user['name'] ?>" required class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Name</label>
                            </div>
                        </div>
                        <div class=" px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <input type="text" name="email" value="<?= $user['email'] ?>" required class="form-control" id="floatingInpute" placeholder="name@example.com">
                                <label for="floatingInpute">Email</label>
                            </div>
                        </div>
                        <div class=" px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <input type="text" name="password" value="<?= $user['password'] ?>" required class="form-control" id="floatingInputee" placeholder="name@example.com">
                                <label for="floatingInputee">Password</label>
                            </div>
                        </div>
                        <div class="px-3 py-1 bg-white mb-3 ">
                            Role
                            <div class="form-floating">
                                <select required class="form-select" name="role" id="floatingSelect">
                                    <option value="user" <?php if ($user['role'] == "user") {
                                                                echo "selected";
                                                            } ?>>User</option>
                                    <option value="admin" <?php if ($user['role'] == "admin") {
                                                                echo "selected";
                                                            } ?>>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-secondary text-white float-end" name="update_user">
                                Update
                            </button>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <h4>User not Found!</h4>
                <?php
                }
            } else {
                ?>
                <h4>Id missing.</h4>
            <?php
            } ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>