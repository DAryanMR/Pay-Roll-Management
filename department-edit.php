<?php
include('conn.php');
?>


<?php
// Assuming you have a database connection established
// Replace 'your_database_connection' with your actual connection variable

if (isset($_GET['did'])) {
    $deptId = $_GET['did'];

    $sql = "SELECT * FROM department WHERE dept_id = $deptId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Company found, perform further processing or display the data
        $deptData = $result->fetch_assoc();
    } else {
        echo "Department not found.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Department</title>

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
        <h3 class="text-center">Edit Department</h3>
        <form action="" method="POST">
            <div class="form-group">
                <input class="form-control" value="<?php echo $deptData['dept_name']; ?>" placeholder="Department Name:" type="text" id="dept_name" name="dept_name">
                <br>
            </div>

            <input type="submit" value="Submit" class="btn btn-primary">

        </form>
    </div>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form values
        $deptName = $_POST["dept_name"];

        $sql = "UPDATE department SET dept_name = '$deptName' WHERE dept_id = $deptId";

        if ($conn->query($sql) === TRUE) {
            echo "Department Updated";
            // Redirect to departments.php
            echo '<script>window.location.href = "departments.php";</script>';
            exit(); // Ensure the script stops executing after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>


    <?php include('footer.php'); ?>
</body>

</html>