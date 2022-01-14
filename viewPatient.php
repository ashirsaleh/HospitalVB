<?php require 'includes/header.php' ?>
<?php
if (isset($_GET['id'])) {
    $statement = $db->prepare("SELECT * FROM `patients` JOIN `visitors` ON patients.patient_id = visitors.p_id  WHERE patients.patient_id=?");
    $statement->execute(array($_GET['id']));
    $patient = $statement->fetch(PDO::FETCH_ASSOC);
    if ($statement->rowCount() < 0) {
        echo "User not found";
    }
} else {
    header('location: ./');
}


?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Patient</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Patient</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="card card-body printableArea">
                <h3>
                    <b>PATIENT ID Number: </b> <span
                        class="pull-right text-danger"><?php echo $patient['patient_fname']; ?></span>
                </h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <h4 class=>Full Name:
                                <b><?php echo $patient['patient_fname'] . " " . $patient['patient_lname'] ?></b>
                                <br /><?php echo $patient['patient_fname'] ?>
                                <br /><?php echo $patient['patient_fname'] ?>
                                <br /><?php echo $patient['patient_fname'] ?>
                                </p>
                        </div>
                        <div class="pull-right text-end">
                            <h3>To,</h3>
                            <h4 class="font-bold">Gaala & Sons,</h4>
                            <p class="text-muted ms-4">E 104, Dharti-2,
                                <br /> Nr' Viswakarma Temple,
                                <br /> Talaja Road,
                                <br /> Bhavnagar - 364002
                            </p>
                            <p class="mt-4"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 23rd
                                Jan 2018</p>
                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2018</p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="table-responsive mt-5" style="clear: both;">
                            <div class="p-2">
                                <h4 class="card-title mb-0">
                                    <span
                                        class="text-danger"><?php echo $patient['patient_fname'] . " " . $patient['patient_lname'] ?></span>
                                    Visitors</h5>
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Full Name</th>
                                        <th class="text-start">Visit Day</th>
                                        <th class="text-start">Time In</th>
                                        <th class="text-start">Time Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    $statement = $db->prepare("SELECT * FROM `patients` JOIN `visitors` ON patients.patient_id = visitors.p_id  WHERE patients.patient_id=?");
                                    $statement->execute(array($_GET['id']));
                                    while ($visitor = $statement->fetch(PDO::FETCH_ASSOC)) {


                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $counter ?></td>
                                        <td><?php echo $visitor['visitor_fname'] . " " . $visitor['visitor_mdname'] ?>
                                        </td>
                                        <!-- <td><?php echo $patient[''] ?></td> -->
                                        <!-- <td><?php echo $patient[''] ?></td> -->
                                        <!-- <td><?php echo $patient[''] ?></td> -->
                                    </tr>
                                    <?php
                                        $counter++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div class="text-end">
                            <button class="btn btn-danger text-white" type="submit"> <i class="mdi mdi-printer"></i>
                                Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'includes/footer.php' ?>