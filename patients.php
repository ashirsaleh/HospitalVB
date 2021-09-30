<?php require ('includes/header.php'); ?>
<?php if($_SESSION['user']['role'] == 'Admin'){ ?>

<?php
$prepare = $db->prepare("SELECT * FROM `patients`");
$prepare->execute();

if (isset($_GET['del'])) {
    $del = $db->prepare("DELETE FROM `patients` WHERE `id` =?");
    if ($del->execute(array($_GET['del']))) {
        // $_SESSION['success'] = "Patient has been deleted";
        // header('Location: patients.php');
    } else {
        // echo 'nooo1';
    }
} else {
    // echo 'Noooooo';
}

?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Patients</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Patients</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['success'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully!</strong> <?=$_SESSION['success'];?>
</div>
<?php endif;?>
<div class=" container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Patient ID</th>
                            <th>Ward Number</th>
                            <th>Vistors</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($patient = $prepare->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $patient['fname'] . " " . $patient['mdname'] . " " . $patient['lname']?>
                            </td>
                            <td><?php echo $patient['pid'] ?></td>
                            <td><?php echo $patient['block'] ?></td>
                            <td><?php echo $patient['block'] ?></td>
                            <td class="text-center">
                                <a href="viewPatient.php?id=<?php echo $patient['pid']?>"
                                    class="btn btn-primary btn-sm"><i class="fas fa-file-alt" aria-hidden="true"></i>
                                    View</a>
                                <a href="#addVisitorModal" data-bs-toggle="modal" class="btn btn-warning btn-sm mx-1"><i
                                        class="fa fa-user-plus" aria-hidden="true"></i>
                                    Add Visitor</a>
                                <a href="patients.php?del=<?php echo $patient['id'] ?>" class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php 
                            if ($prepare->rowCount() < 1) {
                                echo "<tr><td colspan='9'><center><h2 style='color:red';>There are no patients.</h2></center></td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="addVisitorModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Visitor to: </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="patient.php" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div>
                                            <label class="bmd-label-floating">First Name</label>
                                            <input class="form-control" type="text" name="fname" id="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label class="bmd-label-floating">Middle Name</label>
                                            <input class="form-control" type="text" name="mdname" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label class="bmd-label-floating">Last Name</label>
                                            <input class="form-control" type="text" name="lname" id="" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="number" name="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ID Card Type</label>
                                            <select class="form-control" name="" id="">
                                                <option value="">NIDA</option>
                                                <option value="">Votting Card</option>
                                                <option value="">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ID Number</label>
                                            <input type="number" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Time In</label>
                                            <input type="time" name="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Add Visitor</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php } ?>










<?php require ('includes/footer.php'); ?>