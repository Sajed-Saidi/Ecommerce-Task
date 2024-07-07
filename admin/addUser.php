<?php include('includes/header.php');
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Add User
                <a href="user.php" class="btn btn-primary text-white">
                    Back
                </a>
            </h4>
            <form action="includes/config/BL.php" method="POST" class="px-3 py-1" enctype="multipart/form-data">
                <div class=" px-3 py-1 bg-white mb-3">
                    <div class="form-floating">
                        <input type="text" name="name" required class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Name</label>
                    </div>
                </div>
                <div class=" px-3 py-1 bg-white mb-3">
                    <div class="form-floating">
                        <input type="text" name="email" required class="form-control" id="floatingInpute" placeholder="name@example.com">
                        <label for="floatingInpute">Email</label>
                    </div>
                </div>
                <div class=" px-3 py-1 bg-white mb-3">
                    <div class="form-floating">
                        <input type="text" name="password" required class="form-control" id="floatingInputee" placeholder="name@example.com">
                        <label for="floatingInputee">Password</label>
                    </div>
                </div>
                <div class="px-3 py-1 bg-white mb-3 ">
                    Role
                    <div class="form-floating">
                        <select required class="form-select" name="role" id="floatingSelect">
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary text-white float-end" name="add_user">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>