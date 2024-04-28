<?php

include('conn.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee - Home</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include('navbar-emp.php'); ?>

    <div class="jumbotron text-center">
        <!-- <h1>Payroll Management</h1> -->
        <?php
        echo "<h1>Welcome, $empName!</h1>";
        ?>
        <!-- <p>Manage payrolls easily</p> -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3> <?php echo "<a href='employee-edit.php?eid=" . $empId . "'>Profile</a>"; ?> </h3>

                <p>Manage profile info</p>
            </div>
            <div class="col-sm-4">
                <h3> <?php echo "<a href='payrolls-view.php?eid=" . $empId . "'>Payrolls</a>"; ?> </h3>
                <p>View Payrolls</p>
            </div>
            <div class="col-sm-4">
                <h3> <?php echo "<a href='employee-pf.php?eid=" . $empId . "'>Provident Fund</a>"; ?> </h3>
                <p>View Profident Funds</p>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>