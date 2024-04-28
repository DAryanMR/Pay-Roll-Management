<?php
include('conn.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payrolls</title>

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

    <?php include('navbar-emp.php'); ?><br>


    <div class="container">
        <h2>Payrolls</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Employee</th>
                    <th>Post</th>
                    <th>Basic</th>
                    <th>DA</th>
                    <th>TA</th>
                    <th>Bonus</th>
                    <th>Provident Fund</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['eid'])) {
                    $empId = $_GET['eid'];

                    $gradeSQ = "SELECT grade_id FROM employee WHERE emp_id = $empId";
                    $gradeResult = $conn->query($gradeSQ);
                    if ($gradeResult->num_rows > 0) {
                        $gradeRow = $gradeResult->fetch_assoc();
                        $gradeId = $gradeRow['grade_id'];

                        $gradeDaata = "SELECT * FROM paygrade WHERE grade_id = $gradeId";
                        $gradeDataResult = $conn->query($gradeDaata);
                        if ($gradeDataResult->num_rows > 0) {
                            $gradeDaataRow = $gradeDataResult->fetch_assoc();
                        }
                    }

                    $sql = "SELECT * FROM payroll WHERE emp_id = $empId";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["reimbursement_date"] . "</td>";
                            // Fetch employee name
                            $empId = $row["emp_id"];
                            $empQuery = "SELECT emp_name FROM employee WHERE emp_id = $empId";
                            $empResult = $conn->query($empQuery);
                            $empName = ($empResult->num_rows > 0) ? $empResult->fetch_assoc()["emp_name"] : "";
                            echo "<td>" . $empName . "</td>";
                            echo "<td>" . $gradeDaataRow["grade_name"] . "</td>";
                            echo "<td>" . $gradeDaataRow["grade_basis"] . "</td>";
                            echo "<td>" . $gradeDaataRow["grade_da"] . "</td>";
                            echo "<td>" . $gradeDaataRow["grade_ta"] . "</td>";
                            echo "<td>" . $gradeDaataRow["grade_bonus"] . "</td>";
                            echo "<td>" . $gradeDaataRow["grade_pf"] . "</td>";
                            echo "<td>" . $row["emp_net_salary"] . "</td>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No payrolls found</td></tr>";
                    }
                }

                ?>
            </tbody>
        </table>
    </div>

    <?php include('footer.php'); ?><br>

</body>

</html>