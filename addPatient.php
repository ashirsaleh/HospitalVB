<?php require('includes/header.php'); ?>
<?php
if (isset($_POST['addPatient'])) {
    $patient_fname = $_POST['patient_fname'];
    $patient_mdname = $_POST['patient_mdname'];
    $patient_lname = $_POST['patient_lname'];
    $patient_gender = $_POST['patient_gender'];
    $patient_age = $_POST['patient_age'];
    // $date = date_format() $_POST['date'];
    $patient_id = $_POST['patient_id'];
    $patient_block = $_POST['patient_block'];
    $patient_address = $_POST['patient_address'];
    $patient_ward = $_POST['patient_ward'];

    $check = $db->prepare("SELECT `patient_id` FROM `patients` WHERE `patient_id` =?");
    $check->execute(array($patient_id));
    $check->fetch(PDO::FETCH_ASSOC);
    if ($check->rowCount() < 1) {
        $addPatient = $db->prepare("INSERT INTO `patients` (`patient_fname`, `patient_mdname`, `patient_lname`, `patient_gender`, `patient_age`, `patient_id`, `patient_block`, `patient_address`, `patient_ward`) VALUE (?,?,?,?,?,?,?,?,?)");
        if ($addPatient->execute(array($patient_fname, $patient_mdname, $patient_lname, $patient_gender, $patient_age, $patient_id, $patient_block, $patient_address, $patient_ward))) {
            $_SESSION['success'] = "Patient has been added";
            header('Location: patients.php');
        } else {
            $_SESSION['error'] = "Patient Could not be added.";
        }
    } else {
        $_SESSION['error'] = "Patient ID Found in records, Could not be added";
        //  echo 'available';
    }
}


?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add New Patient</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new patient</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['error'])) { ?>
<!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed!</strong> <?= $_SESSION['error']; ?>
</div>   -->
<?php } ?>

<?php if (isset($_SESSION['success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully!</strong> <?= $_SESSION['success']; ?>
</div>

<?php } ?>
<div class="card-body col-md-8">
    <div class="container-fluid">
        <div class="card">
            <div class="content pt-3">
                <div class="row">
                    <div class="">
                        <div class="card-header card-header-primary mx-2">
                            <h4 class="card-title">Add New Patient</h4>
                            <hr>
                            <p class="card-category">Fill all details about new patient</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="addPatient.php">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">First Name</label>
                                            <input type="text" name="patient_fname" class="form-control"
                                                required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Midle Name</label>
                                            <input type="text" name="patient_mdname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Last Name</label>
                                            <input type="text" name="patient_lname" class="form-control"
                                                required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Gender</label>
                                            <select class="form-control" name="patient_gender" id="">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <!-- <input type="text" class="form-control" required="true"> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Age</label>
                                            <input type="number" name="patient_age" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="form-group">
                                            <label class="bmd-label-floating">Arival Date</label>
                                            <input type="date" name="date" class="form-control" required="true">
                                        </div>
                                    </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Patient ID</label>
                                                <input type="text" name="patient_pid" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Block</label>
                                                <select class="form-control" name="patient_block" id="">
                                                    <option value="A001">A001</option>
                                                    <option value="A002">A002</option>
                                                    <option value="A003">A003</option>
                                                    <option value="A004">A004</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Ward Number</label>
                                                <select class="form-control" name="patient_ward" id="">
                                                    <option value="011">011</option>
                                                    <option value="022">022</option>
                                                    <option value="033">033</option>
                                                    <option value="044">044</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Adress</label>
                                                <input type="text" name="patient_address" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">City</label>
                                                <input type="text" name="patient_city" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Country</label>
                                                <input type="text" name="patient_country" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Postal Code</label>
                                                <input type="text" name="patient_pcode " class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" class="btn btn-danger pull-right">Reset</button>
                                        <button type="submit" name="addPatient" class="btn btn-primary pull-left">Add
                                            Patient</button>
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



<?php require('includes/footer.php'); ?>