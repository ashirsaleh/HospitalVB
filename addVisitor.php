<?php require 'includes/header.php' ?>
<?php
if (isset($_GET['id'])) {
    // $patient_id = $_GET['patient_id'];
    $statement = $db->prepare("SELECT * FROM `patients` WHERE `patient_id`=?");
    $statement->execute(array($_GET['id']));
    $patient = $statement->fetch(PDO::FETCH_ASSOC);
    if ($statement->rowCount() < 0) {
        $_SESSION['errror'] = "Patient not Found";
    }
}
if (isset($_POST['addVisitor'])) {
    $p_id = $_POST['p_id'];
    $visitor_fname = $_POST['visitor_fname'];
    $visitor_mdname = $_POST['visitor_mdname'];
    $visitor_lname = $_POST['visitor_lname'];
    $visitor_id_type = $_POST['visitor_id_type'];
    $visitor_id_number = $_POST['visitor_id_number'];
    $visitor_relationship = $_POST['visitor_relationship'];

    $addvisitor = $db->prepare("INSERT INTO `visitors` (`p_id`, `visitor_fname`, `visitor_mdname`, `visitor_lname`, `visitor_id_type`, `visitor_id_number`, `visitor_relationship`) VALUES (?,?,?,?,?,?,?)");
    if ($addvisitor->execute(array($p_id, $visitor_fname, $visitor_mdname, $visitor_lname, $visitor_id_type, $visitor_id_number, $visitor_relationship))) {
        header('location: visitors.php');
        $_SESSION['success'] = "Visitor Was Added";
    }
}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add Visitor</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Visitor</li>
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
                            <h4 class="card-title">Add Visitor to:
                                <?php echo $patient['patient_fname'] . " " . $patient['patient_lname']; ?></h4>
                            <hr>
                            <p class="card-category">Add visitor details</p>
                        </div>
                        <div class="card-body">
                            <form action="addVisitor.php" method="post">
                                <div class="row">
                                    <input type="hidden" name="p_id" value="<?php echo $patient['patient_id'] ?>">
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">First Name</label>
                                            <input type="text" name="visitor_fname" class="form-control"
                                                required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Midle Name</label>
                                            <input type="text" name="visitor_mdname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Last Name</label>
                                            <input type="text" name="visitor_lname" class="form-control"
                                                required="true">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ID Type</label>
                                            <select class="form-control" name="visitor_id_type" id="">
                                                <option value="NIDA">NIDA</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ID Number</label>
                                            <input type="number" name="visitor_id_number" class="form-control"
                                                required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Relationship</label>
                                            <input type="text" name="visitor_relationship" class="form-control"
                                                required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="reset" class="btn btn-danger pull-right">Reset</button>
                                    <button type="submit" name="addVisitor" class="btn btn-primary pull-left">Add
                                        Visitor</button>
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


<?php require 'includes/footer.php' ?>