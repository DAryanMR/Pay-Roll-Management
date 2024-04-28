<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees</title>

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

    <div class="container">
        <h2>Employees</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>DOJ</th>
                    <th>Company</th>
                    <th>Dept</th>
                    <th>Post</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Assuming you have a database connection established
                // Replace 'your_database_connection' with your actual connection variable
                $sql = "SELECT * FROM employee";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["emp_name"] . "</td>";
                        echo "<td>" . $row["emp_email"] . "</td>";
                        echo "<td>" . $row["emp_mobile_no"] . "</td>";
                        echo "<td>" . $row["emp_address"] . "</td>";
                        echo "<td>" . $row["emp_doj"] . "</td>";

                        // Fetch company name
                        $compId = $row["comp_id"];
                        $compQuery = "SELECT company_name FROM company WHERE company_id = $compId";
                        $compResult = $conn->query($compQuery);
                        $compName = ($compResult->num_rows > 0) ? $compResult->fetch_assoc()["company_name"] : "";
                        echo "<td>" . $compName . "</td>";

                        // Fetch department name
                        $deptId = $row["dept_id"];
                        $deptQuery = "SELECT dept_name FROM department WHERE dept_id = $deptId";
                        $deptResult = $conn->query($deptQuery);
                        $deptName = ($deptResult->num_rows > 0) ? $deptResult->fetch_assoc()["dept_name"] : "";
                        echo "<td>" . $deptName . "</td>";

                        // Fetch grade name
                        $gradeId = $row["grade_id"];
                        $gradeQuery = "SELECT grade_name FROM paygrade WHERE grade_id = $gradeId";
                        $gradeResult = $conn->query($gradeQuery);
                        $gradeName = ($gradeResult->num_rows > 0) ? $gradeResult->fetch_assoc()["grade_name"] : "";
                        echo "<td>" . $gradeName . "</td>";

                        echo "<td>";
                        echo "<a class='btn btn-primary' href='employee-pay.php?eid=" . $row["emp_id"] . "'>Pay</a>";
                        echo " | ";
                        echo "<button class='btn btn-danger' data-toggle='modal' data-target='#myModal" . $row["emp_id"] . "'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";

                        // Modal for each department
                        echo "<div class='modal' id='myModal" . $row["emp_id"] . "'>";
                        echo "<div class='modal-dialog'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h4 class='modal-title'>Delete Employee</h4>";
                        echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                        echo "<p>Are you sure you want to delete the employee: " . $row["emp_name"] . "?</p>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        echo "<a href='employee-delete.php?eid=" . $row["emp_id"] . "' class='btn btn-danger'>Delete</a>";
                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No Employees found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>