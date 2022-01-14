<?php
require 'includes/header.php';

if (isset($_POST['addUser'])) {
    $fname = $_POST['fname'];
    $mdname = $_POST['mdname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    $check = $db->prepare("SELECT `username` FROM `users` WHERE `username` =? ");
    $check->execute(array($username));
    $check->fetch(PDO::FETCH_ASSOC);
    if ($check->rowCount() < 1) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`fname`,`mdname`, `lname`, `username`, `role`, `password`) VALUE  (?,?,?,?,?,?)";
        $addUser = $db->prepare($sql);
        if ($addUser->execute(array($fname, $mdname, $lname, $username, $role, $password))) {
            header('Location: users.php');
            $_SESSION['success'] = "User has been added";
        } else {
            echo 'Jamaa hajaadiwa';
        }
    } else {
        $_SESSION['error'] = 'Username is already taken';
    }
} else {
    // echo 'field can\'t be empty';
}

?>
<?php if (isset($_SESSION['success'])) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully!</strong> <?= $_SESSION['success'];
                                        unset($_SESSION['success'])
                                        ?>
</div>
<?php endif; ?>
<?php if (isset($_SESSION['error'])) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> <?= $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
</div>
<?php endif; ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add User</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>



<div class="card-body col-md-8">
    <div class="container-fluid">
        <div class="card">
            <div class="content pt-3">
                <div class="row">
                    <div class="">
                        <div class="card-header card-header-primary mx-2">
                            <h4 class="card-title">Add User</h4>
                            <hr>
                            <p class="card-category">Add user details</p>
                        </div>
                        <div class="card-body">
                            <form action="addUser.php" method="post">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">First Name</label>
                                            <input type="text" name="fname" class="form-control" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Midle Name</label>
                                            <input type="text" name="mdname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Last Name</label>
                                            <input type="text" name="lname" class="form-control" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Username</label>
                                            <input type="text" name="username" class="form-control" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">email</label>
                                            <input type="text" name="email" class="form-control" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Role</label>
                                            <select class="form-control" name="role" id="">
                                                <option value="Admin">Admin</option>
                                                <option value="Guardian">Guardian</option>
                                                <option value="Nurse">Nurse</option>
                                            </select>
                                            <!-- <input type="text" class="form-control" required="true"> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <div>
                                                <input type="password" name="password" class="form-control" required="">
                                                <!-- <span onclick="hideshow()">
                                                    <i class="fa fa-eye-slash"></i>
                                                    <i class="fa fa-eye"></i>
                                                </span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="reset" class="btn btn-danger pull-right">Reset</button>
                                    <button type="submit" name="addUser" class="btn btn-primary pull-left">Add
                                        User</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['success']);
unset($_SESSION['error']);
?>


<?php require 'includes/footer.php'; ?>