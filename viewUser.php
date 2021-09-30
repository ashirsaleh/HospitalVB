<?php require 'includes/header.php' ?>
<?php
if (isset($_GET['id'])) {
    $statement = $db->prepare("SELECT * FROM `users` WHERE `id`=?");
    $statement->execute(array($_GET['id']));
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if($statement->rowCount() < 0){
        echo "User not found";
    }
}else{
    header('location: ./');
}


?> <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View User</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View User</li>
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
                <h3><b>UserName: </b> <span class="pull-right"><?php echo $user['username']; ?></span></h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <p class="text-muted ms-1">E 104, Dharti-2,
                                    <br /> Nr' Viswakarma Temple,
                                    <br /> Talaja Road,
                                    <br /> Bhavnagar - 364002
                                </p>
                            </address>
                        </div>
                        <div class="pull-right text-end">
                            <address>
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
                            </address>
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