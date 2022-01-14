<?php
session_start();
require ('includes/db.php'); 
unset($_SESSION['user']);
unset($_SESSION['role']);
unset($_SESSION['loggedIn']);

if(isset($_POST['login'])){
     $username = $_POST['username'];
     $password = $_POST['password'];

     $statement = $db->prepare("SELECT * FROM `users` WHERE `username` =?");
     $statement->execute(array($username));
     $result = $statement->fetch(PDO::FETCH_ASSOC);
     
     if ($statement->rowCount() > 0) {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user'] = $result;
            $_SESSION['loggedIn'] = true;
            $_SESSION['role'] = $result['role'];
            header('Location: ./');
            
        }
        $_SESSION['error'] = 'paswodi didi noti machi';
        //  echo 'password didi noti machi';
     }else{
         $_SESSION['error'] = 'user not found';
        //  echo 'user not found';
     }
    }
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Visitors Book</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/libs/flot/css/float-chart.css">
    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.css">
    <link href="assets/dist/css/style.min.css" rel="stylesheet">
</head>

<body>

    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark pt-5">
        <div class="auth-box bg-dark border-top border-secondary">
            <div id="loginform">
                <div class="text-center pt-3 pb-3">
                    <span class="db"><img src="assets/images/logo.png" alt="logo" /></span>
                </div>
                <!-- Form -->
                <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $_SESSION['error']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <form class="form-horizontal mt-3" id="loginform" method="POST" action="login.php">
                    <div class="row pb-4">

                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                            class="ti-user"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control form-control-lg"
                                    placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                    required="">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i
                                            class="ti-pencil"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"
                                    required="">
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="form-group ">
                            <div class="d-flex justify-content-center pt-3">
                                <button type="submit" name="login" value="login"
                                    class="btn btn-success float-end text-white mb-3">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['error']);

    ?>

    <?php require ('includes/footer.php'); ?>