<?php

include('conn.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee - PF</title>

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
    <?php include('navbar-emp.php'); ?>

    <div class="jumbotron text-center">
        <!-- <h1>Payroll Management</h1> -->
        <?php
        // echo "<h1>Welcome, $empName!</h1>";
        if (isset($_GET['eid'])) {
            $empId = $_GET['eid'];

            $sql = "SELECT emp_doj,grade_id FROM employee WHERE emp_id = $empId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $resData = $result->fetch_assoc();
                $emp_doj = $resData['emp_doj'];
                $grade_id = $resData['grade_id'];

                $sql1 = "SELECT grade_pf FROM paygrade WHERE grade_id = $grade_id";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $resData1 = $result1->fetch_assoc();
                    $emp_pf = $resData1['grade_pf'];
                }
            }
        }

        // Get the current date
        $currentDate = new DateTime();
        $currentDate->setTime(0, 0, 0);  // Set the time to midnight to ignore the time component

        // Create a DateTime object from the employee's date of join
        $dateOfJoin = DateTime::createFromFormat('Y-m-d', $emp_doj);
        $dateOfJoin->setTime(0, 0, 0);  // Set the time to midnight to ignore the time component

        // Calculate the month difference
        $interval = $currentDate->diff($dateOfJoin);
        $months = $interval->y * 12 + $interval->m;

        // Rounded month difference
        $roundedMonths = round($months);

        $totalPF = ($emp_pf * 2) * $roundedMonths;

        echo "<h1>Date of Join: $emp_doj</h1>";
        echo "<h2>Duration (Month): $roundedMonths </h2>";
        echo "<h2>PF Amount (Month): $emp_pf </h2>";
        ?>
        <!-- <p>Manage payrolls easily</p> -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php echo "<h3> Total Profident Fund = (Month * PF * 2) =  $totalPF</h3>";  ?>


            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>