<?php
include('conn.php');
?>


<?php

if (isset($_GET['eid'])) {
    $empId = $_GET['eid'];

    $sql = "SELECT emp_name,grade_id FROM employee WHERE emp_id = $empId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $resData = $result->fetch_assoc();
        $empName = $resData['emp_name'];
        $gradeId = $resData['grade_id'];


        $gradeSql = "SELECT * FROM paygrade WHERE grade_id = $gradeId";
        $gradeResult = $conn->query($gradeSql);

        if ($gradeResult->num_rows > 0) {
            $gradeData = $gradeResult->fetch_assoc();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Payroll</title>

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
        <!-- <h3 class="text-center">Pay Employee</h3> -->
        <?php
        echo "<h3>Pay Employee - $empName</h3>";
        ?>
        <form action="" method="POST">
            <div class="form-row">
                <div class="col">
                    <input class="form-control" placeholder="Reimbursement Date:" type="date" id="r_date" name="r_date">
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
                    <input type="hidden" class="form-control" value="<?php echo $gradeData['grade_pf']; ?>" placeholder="Grade PF:" type="number" id="grade_pf" name="grade_pf">
                </div>
                <div class="col">
                    <input class="form-control" value="<?php echo $gradeData['grade_bonus']; ?>" placeholder="Grade Bonus:" type="number" id="grade_bonus" name="grade_bonus">
                </div>
                <div class="col">
                    <label for="total_amount">Total: </label>
                    <span id="total_amount"></span>
                    <input type="hidden" name="total_amount" id="total_amount_input">
                </div>
            </div>
            <br>
            <input type="submit" value="Update" class="btn btn-success">

        </form>
    </div>


    <script>
        // Function to calculate the total amount
        function calculateTotalAmount() {
            var grade_basis = parseFloat(document.getElementById("grade_basis").value) || 0;
            var grade_da = parseFloat(document.getElementById("grade_da").value) || 0;
            var grade_ta = parseFloat(document.getElementById("grade_ta").value) || 0;
            var grade_bonus = parseFloat(document.getElementById("grade_bonus").value) || 0;
            var grade_pf = parseFloat(document.getElementById("grade_pf").value) || 0;

            var total = grade_basis + grade_da + grade_ta + grade_bonus - grade_pf;
            return total.toFixed(2);
        }

        // Function to update the total amount and hidden input field when any input field is modified
        function updateTotalAmount() {
            var total_amount = document.getElementById("total_amount");
            var total_amount_input = document.getElementById("total_amount_input");

            var total = calculateTotalAmount();

            total_amount.innerText = total;
            total_amount_input.value = total;
        }

        // Add event listeners to input fields to update the total amount
        document.getElementById("grade_basis").addEventListener("input", updateTotalAmount);
        document.getElementById("grade_da").addEventListener("input", updateTotalAmount);
        document.getElementById("grade_ta").addEventListener("input", updateTotalAmount);
        document.getElementById("grade_bonus").addEventListener("input", updateTotalAmount);

        // Update the total amount initially
        updateTotalAmount();
    </script>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form values
        $rDate = $_POST["r_date"];
        $totalAmount = $_POST["total_amount"];


        // Create a prepared statement
        $stmt = $conn->prepare("INSERT INTO Payroll (reimbursement_date, emp_net_salary, emp_id) 
                                VALUES (?, ?, ?)");

        // Bind the parameters with the corresponding values
        $stmt->bind_param("sss", $rDate, $totalAmount, $empId);

        // Execute the statement
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->affected_rows > 0) {
            echo "Payroll record inserted successfully.";
            echo '<script>window.location.href = "payrolls.php";</script>';
        } else {
            echo "Error inserting payroll record: " . $conn->error;
        }

        // Close the statement
        $stmt->close();
    }
    ?>


    <?php include('footer.php'); ?>
</body>

</html>