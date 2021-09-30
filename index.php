<?php require('includes/header.php'); ?>
<?php
$statement = $db->prepare('SELECT * FROM `users`');
$statement->execute();


$prepare = $db->prepare("SELECT * FROM `patients`");
$prepare->execute();

?>
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
            <a href="#">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">Dashboard</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="patients.php">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                        <h6 class="text-white">Patients</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="visitors.php">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                        <h6 class="text-white">Visitors</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="users.php">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                        <h6 class="text-white">Users</h6>
                    </div>
                </div>
            </a>
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
            <a href="visitations.php">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                        <h6 class="text-white">Visitations</h6>
                    </div>
                </div>
            </a>
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
                        <?php $counter = 1; while ($patient = $prepare->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $counter ?></td>
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
                        <?php $counter++; } ?>
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
                        <?php $counter = 1; while ($user = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <th scope="row"><?php echo $counter ?></th>
                            <td><?php echo $user['fname'] . " " . $user['mdname'] . " " . $user['lname'] ?></td>
                            <td><?php echo $user['username']  ?></td>
                            <td><?php echo $user['role'] ?></td>
                            <td class="text-center">
                                <a href="viewUser.php?id=<?php echo $user['id']?>" class="btn btn-primary btn-sm"><i
                                        class="fas fa-file-alt" aria-hidden="true"></i> View</a>
                            </td>
                        </tr>
                        <?php $counter++; } ?>
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