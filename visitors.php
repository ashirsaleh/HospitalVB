<?php require 'includes/header.php' ?>
<?php if ($_SESSION['user']['role'] == 'Admin') { ?>
<?php

    $statement = $db->prepare('SELECT * FROM `patients` JOIN `visitors` ON visitors.p_id = patients.patient_id');
    $statement->execute(array());
}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Visitors</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['success'])) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully!</strong> <?= $_SESSION['success']; ?>
</div>
<?php endif; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Visitors</h5>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Full Name</th>
                            <!-- <th>Visit Day</th> -->
                            <th>To</th>
                            <th>ID Type and ID Number</th>
                            <th>Relationship to Patient</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 1;
                        while ($visitor = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td class="text-center"><?php echo $counter ?></td>
                            <td><?php echo $visitor['visitor_fname'] . " " . $visitor['visitor_mdname'] ?></td>
                            <!-- <td><?php echo $visitor['visitor_date'] ?></td> -->
                            <td><?php echo $visitor['patient_fname'] . " " .  $visitor['patient_lname'] ?>
                            </td>
                            <td><?php echo $visitor['visitor_id_type'] .  " : " . $visitor['visitor_id_number'] ?></td>
                            <td><?php echo $visitor['visitor_relationship'] ?></td>
                            <td class="text-center">
                                <a href="viewVisitor.php?id=<?php echo $visitor['id'] ?>" class="btn btn-sm btn-primary"
                                    data-bs-toggle="modal">
                                    <i class="fas fa-file-alt" aria-hidden="true"></i> View</a>
                                <a type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#edit-modal">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                <a href="visitors.php?del=<?php echo $visitor['id'] ?>" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                            </td>
                        </tr>
                        <?php $counter++;
                        } ?>
                        <?php if ($statement->rowCount() < 1) {
                            echo "<tr><td colspan='9'><center><h2 style='color:red';>There are no Visitor.";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="viewModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $visitor['fname'] . " " . $visitor['mdname'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Do you want to save changes to this document before closing?</p>
                <p class="text-secondary"><small>If you don't save, your changes will be
                        lost.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php' ?>