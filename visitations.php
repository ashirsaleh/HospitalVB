<?php require 'includes/header.php' ?>


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Visitations</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Visitations</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
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

        $prepare = $db->prepare("SELECT * FROM `visitors` WHERE  `vid` = 2");
        $prepare->execute(array());




        ?>
        <?php $counter = 1;
        while ($visitor = $prepare->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td class="text-center"><?php echo $counter ?></td>
            <td><?php echo $visitor['fname'] . " " . $visitor['mdname'] ?></td>
            <td><?php echo $visitor['date'] ?></td>
            <td><?php echo $visitor['tin'] ?></td>
            <td><?php echo $visitor['tout'] ?></td>
        </tr>
        <?php $counter++;
        } ?>
    </tbody>
</table>


<?php require 'includes/footer.php' ?>