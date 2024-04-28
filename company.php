<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Companies</title>

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
    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3><a href="company-create.php">Create</a></h3>
                <p>Create new company</p>
            </div>
            <div class="col-sm-4">
                <h3><a href="companies.php">Manage</a></h3>
                <p>Edit, update, delete existing companies</p>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>