<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Home</title>

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

    <?php include('navbar.php'); ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3><a href="company.php">Company</a></h3>
                <p>Manage companies</p>
            </div>
            <div class="col-sm-6">
                <h3><a href="department.php">Department</a></h3>
                <p>Manage departments</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-6">
                <h3><a href="pay.php">Payments</a></h3>
                <p>Manage Pay grades/Pay rolls</p>
            </div>
            <div class="col-sm-6">
                <h3><a href="employees.php">Employee</a></h3>
                <p>Manage Employees</p>
            </div>
        </div>
    </div>


    <?php include('footer.php'); ?>
</body>

</html>