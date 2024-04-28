<?php
include('conn.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Create Company</title>

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
    <div class="jumbotron container">
        <h3 class="text-center">Create Company</h3>
        <form action="" method="POST">
            <div class="form-group">
                <input class="form-control" placeholder="Company Name:" type="text" id="company_name" name="company_name">
                <br>
                <input class="form-control" placeholder="Company Address:" type="address" id="comp_address" name="comp_address">
                <br>
                <input class="form-control" placeholder="Company Number:" type="tel" id="contact_no" name="contact_no">
                <br>
            </div>

            <input type="submit" value="Submit" class="btn btn-primary">

        </form>
    </div>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form values
        $companyName = $_POST["company_name"];
        $companyAddress = $_POST["comp_address"];
        $contactNo = $_POST["contact_no"];

        $sql = "INSERT INTO Company (company_name, comp_address, contact_no) VALUES ('$companyName', '$companyAddress', '$contactNo')";

        if ($conn->query($sql) === TRUE) {
            echo "New company created successfully";
            // Redirect to company.php
            echo '<script>window.location.href = "companies.php";</script>';
            exit(); // Ensure the script stops executing after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>


    <?php include('footer.php'); ?>
</body>

</html>