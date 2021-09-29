<?php require('includes/header.php'); ?>
<?php
if (isset($_POST['updateProfile'])) {
    $password = $_POST['password'];
    $pnumber = $_POST['pnumber'];
    $email = $_POST['email'];
    $poaddress = $_POST['poaddress'];
    $address = $_POST['address'];
    $region = $_POST['region'];
    $city = $_POST['city'];
    $about = $_POST['about'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    $updateProfile = $db->prepare('UPDATE `users` SET `pnumber` = ?, `email` = ?, `poaddress` = ?, `address` = ?, `region` = ?, `city` = ?, `about` = ? WHERE id = ?');
    if ($updateProfile->execute(array($pnumber, $email, $poaddress, $address, $region, $city, $about, $_SESSION['user']['id']))) {
        echo 'passes';
    }
}
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Profile</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <hr>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form action="profile.php" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- <div class="form-group"> -->
                                    <div>
                                        <label class="bmd-label-floating">Staff ID Number</label>
                                        <h4>
                                            <?php echo $_SESSION['user']['username'] ?>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- <div class="form-group"> -->
                                    <div>
                                        <label class="bmd-label-floating">Full Name</label>
                                        <h4>
                                            <?php echo $_SESSION['user']['fname'] . " " .  $_SESSION['user']['mdname'] . " " . $_SESSION['user']['lname'] ?>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Change Password</label>
                                            <input type="password" name="password" class="form-control phone-inputmask"
                                                id="phone-mask" placeholder="Enter Your New Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Phone <small class="text-muted">0xxx xxx xxx</small></label>
                                            <input type="number" name="pnumber" class="form-control phone-inputmask"
                                                id="phone-mask" value="<?php echo $_SESSION['user']['pnumber'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email Address <small
                                                class="text-muted">one@domain.com</small></label>
                                        <input type="email" name="email" class="form-control"
                                            value="<?php echo $_SESSION['user']['email'];?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Postal Address </label>
                                        <input type="address" name="poaddress" class="form-control"
                                            value="<?php echo $_SESSION['user']['poaddress'];?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Physical Adress</label>
                                        <input type="text" name="address" class="form-control"
                                            value="<?php echo $_SESSION['user']['address'];?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Region</label>
                                        <input type="text" name="region" class="form-control"
                                            value="<?php echo $_SESSION['user']['region'];?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">City</label>
                                        <input type="text" name="city" class="form-control"
                                            value="<?php echo $_SESSION['user']['city'];?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="about"
                                                rows="5"><?php echo $_SESSION['user']['pnumber'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="updateProfile" class="btn btn-primary pull-right">Update
                                Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar d-flex justify-content-center mt-2">
                        <a href="javascript:;">
                            <img class="img" style="width: 120px; height: 120; border-radius: 50%;"
                                src="assets/images/users/7.jpg" />
                        </a>
                    </div>

                    <div class="card-body">
                        <h6 class="card-category text-gray">
                            <?php echo $_SESSION['user']['role'] ?>
                        </h6>
                        <h5 class="card-title">
                            <?php echo $_SESSION['user']['email'] ?>
                        </h5>

                        <h4 class="card-title">
                            <?php echo $_SESSION['user']['fname'] . " " . $_SESSION['user']['lname'] ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('includes/footer.php'); ?>