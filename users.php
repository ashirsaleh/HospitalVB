<?php require 'includes/header.php'; ?>
<?php if($_SESSION['user']['role'] == 'Admin'){ ?>
<?php

$statement = $db->prepare('SELECT * FROM `users`');
$statement->execute();

if (isset($_GET['del'])) {
    $del = $db->prepare("DELETE FROM `users` WHERE `id` =?");
    if ($del->execute(array($_GET['del']))) {
        $_SESSION['success'] = "User has been deleted";
        // header('Location: users.php');
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
<?php if (isset($_SESSION['success'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully!</strong> <?=$_SESSION['success'];?>
</div>
<?php endif;?>
<div class="container-fluid">
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
                            <th scope="col">User Name</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i < $i;) {;
                        }
                        ?>
                        <?php while ($user = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <?php //$_SESSION('success') 
                                ?>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $user['fname'] . " " . $user['mdname']. " " . $user['lname'] ?></td>
                            <td><?php echo $user['username']  ?></td>
                            <td><?php echo $user['role'] ?></td>
                            <td class="text-center">
                                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-file-alt"
                                        aria-hidden="true"></i>
                                    View</a>
                                <a type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#edit-modal"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                <a href="users.php?del=<?php echo $user['id'] ?>" class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<?php require 'includes/footer.php'; ?>