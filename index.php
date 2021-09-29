<?php require('includes/header.php'); ?>
<?php
$statement = $db->prepare('SELECT * FROM `users`');
$statement->execute();

if (isset($_GET['del'])) {
    $del = $db->prepare("DELETE FROM `users` WHERE `id` =?");
    if ($del->execute(array($_GET['del']))) {
        //    echo 'weeee';
        // header('Location: users.php');
    } else {
        echo '';
    }
} else {
    echo '';
}

$prepare = $db->prepare("SELECT * FROM `patients`");
$prepare->execute();

if (isset($_GET['del'])) {
    $del = $db->prepare("DELETE FROM `patients` WHERE `id` =?");
    if ($del->execute(array($_GET['del']))) {
        //    echo 'weeee';
        // header('Location: users.php');
    } else {
        echo '';
    }
} else {
    echo '';
}
?>

<!-- <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full"> -->
<!-- Page wrapper  -->
<!-- <div class="page-wrapper"> -->

<?php if (isset($_SESSION['success'])) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully!</strong> <?= $_SESSION['success']; ?>
    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button> -->
</div>
<?php endif; ?>

<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->

<!-- Container fluid  -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                    <h6 class="text-white">Dashboard</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                    <h6 class="text-white">Charts</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                    <h6 class="text-white">Widgets</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                    <h6 class="text-white">Tables</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                    <h6 class="text-white">Full Width</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                    <h6 class="text-white">Calnedar</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <?php if($_SESSION['user']['role'] == 'Admin'){ ?>

    <div class="row">
        <div class="col-16">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Patients</h5>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5px;">#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Problem</th>
                            <th>Age</th>
                            <th>Patient ID</th>
                            <th>Ward Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i < $i;) {;
                        } ?>
                        <?php while ($patient = $prepare->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $patient['fname'] . " " . $patient['mdname'] . " " . $patient['lname'] ?>
                            </td>
                            <td><?php echo $patient['gender'] ?></td>
                            <td><?php echo $patient['lname'] ?></td>
                            <td><?php echo $patient['age'] ?></td>
                            <td><?php echo $patient['pid'] ?></td>
                            <td><?php echo $patient['block'] ?></td>
                            <td>
                                <a href="viewPatient.php?id=<?php echo $patient['pid']; ?>" class="btn btn-primary
                            btn-sm"><i class="fas fa-file-alt" aria-hidden="true"></i> View</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php } ?>
                        <?php
                        if ($prepare->rowCount() < 1) {
                            echo "<tr><td colspan='9'><center><h2 style='color:red';>There are no patients.</h2></center></td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if($_SESSION['user']['role'] == 'Admin'){ ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Users</h5>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">UserName</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i < $i;) {;
                        }
                        ?>
                        <?php while ($user = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $user['fname'] . " " . $user['mdname'] . " " . $user['lname'] ?></td>
                            <td><?php echo $user['username']  ?></td>
                            <td><?php echo $user['role'] ?></td>
                            <td class="text-center">
                                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-file-alt"
                                        aria-hidden="true"></i> View</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php
unset($_SESSION['success']);
?>
<?php require('includes/footer.php'); ?>