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

    <?php include('navbar.php'); ?><br>

    <div class="container">
        <h2>Payrolls</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Employee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM payroll";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["reimbursement_date"] . "</td>";
                        echo "<td>" . $row["emp_net_salary"] . "</td>";

                        // Fetch employee name
                        $empId = $row["emp_id"];
                        $empQuery = "SELECT emp_name FROM employee WHERE emp_id = $empId";
                        $empResult = $conn->query($empQuery);
                        $empName = ($empResult->num_rows > 0) ? $empResult->fetch_assoc()["emp_name"] : "";
                        echo "<td>" . $empName . "</td>";


                        echo "<td>";
                        echo "<a class='btn btn-primary' href='payroll-edit.php?rid=" . $row["transaction_id"] . "'>Edit</a>";
                        echo " | ";
                        echo "<button class='btn btn-danger' data-toggle='modal' data-target='#myModal" . $row["transaction_id"] . "'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";

                        // Modal for each company
                        echo "<div class='modal' id='myModal" . $row["transaction_id"] . "'>";
                        echo "<div class='modal-dialog'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h4 class='modal-title'>Delete Payroll</h4>";
                        echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                        echo "<p>Are you sure you want to delete the payroll of: " . $empName . "?</p>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        echo "<a href='payroll-delete.php?rid=" . $row["transaction_id"] . "' class='btn btn-danger'>Delete</a>";
                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No payrolls found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>