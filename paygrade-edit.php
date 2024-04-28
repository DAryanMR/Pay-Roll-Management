<?php
include('conn.php');
?>


<?php
// Assuming you have a database connection established
// Replace 'your_database_connection' with your actual connection variable

if (isset($_GET['gid'])) {
    $gradeId = $_GET['gid'];

    $sql = "SELECT * FROM paygrade WHERE grade_id = $gradeId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Company found, perform further processing or display the data
        $gradeData = $result->fetch_assoc();
    } else {
        echo "Grade not found.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Grade</title>

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

    <?php include('navbar.php'); ?><br>
    <div class="jumbotron container">
        <h3 class="text-center">Edit Grade</h3>
        <form action="" method="POST">
            <div class="form-row">
                <div class="col">
                    <input class="form-control" value="<?php echo $gradeData['grade_name']; ?>" placeholder="Grade Name:" type="text" id="grade_name" name="grade_name">
                </div>
                <div class="col">
                    <input class="form-control" value="<?php echo $gradeData['grade_basis']; ?>" placeholder="Grade Basis:" type="number" id="grade_basis" name="grade_basis">
                </div>
                <div class="col">
                    <input class="form-control" value="<?php echo $gradeData['grade_da']; ?>" placeholder="Grade DA:" type="number" id="grade_da" name="grade_da">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col">
                    <input class="form-control" value="<?php echo $gradeData['grade_ta']; ?>" placeholder="Grade TA:" type="number" id="grade_ta" name="grade_ta">
                </div>
                <div class="col">
                    <input class="form-control" value="<?php echo $gradeData['grade_bonus']; ?>" placeholder="Grade Bonus:" type="number" id="grade_bonus" name="grade_bonus">
                </div>
                <div class="col">
                    <input class="form-control" value="<?php echo $gradeData['grade_pf']; ?>" placeholder="Grade PF:" type="number" id="grade_pf" name="grade_pf">
                </div>
            </div>
            <br>
            <input type="submit" value="Update" class="btn btn-success">

        </form>
    </div>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form values
        $gradeName = $_POST["grade_name"];
        $gradeBasis = $_POST["grade_basis"];
        $gradeDA = $_POST["grade_da"];
        $gradeTA = $_POST["grade_ta"];
        $gradeBonus = $_POST["grade_bonus"];
        $gradePF = $_POST["grade_pf"];

        $sql = "UPDATE Paygrade SET grade_name = '$gradeName', grade_basis = '$gradeBasis', grade_da = '$gradeDA',
                grade_ta = '$gradeTA', grade_bonus = '$gradeBonus', grade_pf = '$gradePF'
                WHERE grade_id = $gradeId";

        if ($conn->query($sql) === TRUE) {
            echo "Grade Updated";
            // Redirect to paygrades.php
            echo '<script>window.location.href = "paygrades.php";</script>';
            exit(); // Ensure the script stops executing after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>


    <?php include('footer.php'); ?>
</body>

</html>