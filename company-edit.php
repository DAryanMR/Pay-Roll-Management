<?php
include('conn.php');
?>


<?php
// Assuming you have a database connection established
// Replace 'your_database_connection' with your actual connection variable

if (isset($_GET['cid'])) {
    $companyId = $_GET['cid'];

    $sql = "SELECT * FROM company WHERE company_id = $companyId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Company found, perform further processing or display the data
        $companyData = $result->fetch_assoc();
    } else {
        echo "Company not found.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Company</title>

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
        <h3 class="text-center">Edit Company</h3>
        <form action="" method="POST">
            <div class="form-group">
                <input class="form-control" value="<?php echo $companyData['company_name']; ?>" placeholder="Company Name:" type="text" id="company_name" name="company_name">
                <br>
                <input class="form-control" value="<?php echo $companyData['comp_address']; ?>" placeholder="Company Address:" type="address" id="comp_address" name="comp_address">
                <br>
                <input class="form-control" value="<?php echo $companyData['contact_no']; ?>" placeholder="Company Number:" type="tel" id="contact_no" name="contact_no">
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

        $sql = "UPDATE company SET company_name = '$companyName', comp_address = '$companyAddress', contact_no = '$contactNo' WHERE company_id = $companyId";

        if ($conn->query($sql) === TRUE) {
            echo "Company Updated";
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