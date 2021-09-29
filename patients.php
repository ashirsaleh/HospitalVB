<?php require ('includes/header.php'); ?>
<?php if($_SESSION['user']['role'] == 'Admin'){ ?>

<?php
$prepare = $db->prepare("SELECT * FROM `patients`");
$prepare->execute();

if (isset($_GET['del'])) {
    $del = $db->prepare("DELETE FROM `patients` WHERE `id` =?");
    if ($del->execute(array($_GET['del']))) {
        //    echo 'weeee';
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
                                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-file-alt"
                                        aria-hidden="true"></i>
                                    View</a>
                                <a href="" class="btn btn-warning btn-sm mx-1"><i class="fa fa-user-plus"
                                        aria-hidden="true"></i>
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

        </div>
    </div>
</div>
<?php } ?>










<?php require ('includes/footer.php'); ?>