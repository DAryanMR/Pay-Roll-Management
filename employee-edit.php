<?php
include('conn.php');
?>


<?php
// Assuming you have a database connection established
// Replace 'your_database_connection' with your actual connection variable

if (isset($_GET['eid'])) {
    $empId = $_GET['eid'];

    $sql = "SELECT * FROM employee WHERE emp_id = $empId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Company found, perform further processing or display the data
        $empData = $result->fetch_assoc();
        $deptId = $empData['dept_id'];
        $compId = $empData['comp_id'];
        $gradeId = $empData['grade_id'];

        // Query the department table to select the department name
        $deptQuery = "SELECT dept_name FROM department WHERE dept_id = '$deptId'";
        $deptResult = $conn->query($deptQuery);

        $compQuery = "SELECT company_name FROM company WHERE company_id = '$compId'";
        $compResult = $conn->query($compQuery);

        $gradeQuery = "SELECT grade_name FROM paygrade WHERE grade_id = '$gradeId'";
        $gradeResult = $conn->query($gradeQuery);

        if ($deptResult && $deptResult->num_rows > 0) {
            $deptData = $deptResult->fetch_assoc();
        }
        if ($compResult && $compResult->num_rows > 0) {
            $compData = $compResult->fetch_assoc();
        }
        if ($gradeResult && $gradeResult->num_rows > 0) {
            $gradeData = $gradeResult->fetch_assoc();
        }
    } else {
        echo "Employee not found.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee - Edit Profile</title>

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
        <h3 class="text-center">Edit Profile</h3>

        <div class="form-group">
            <form id="register-form" action="" method="post" role="form">
                <!-- <input type="hidden" name="form_id" value="register-form" /> -->
                <div class="form-group row">
                    <div class="col-sm-4">
                        <input value="<?php echo $empData['emp_name']; ?>" required type="text" name="username" id="username" class="form-control" placeholder="Username" value="">
                    </div>
                    <div class="col-sm-4">
                        <input value="<?php echo $empData['emp_mobile_no']; ?>" required type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No" value="">
                    </div>
                    <div class="col-sm-4">
                        <input value="<?php echo $empData['emp_address']; ?>" required type="text" name="address" id="address" class="form-control" placeholder="Address" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <input value="<?php echo $empData['emp_email']; ?>" required type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="row">
                            <label for="dob" class="col-sm-3 col-form-label">DOB</label>
                            <div class="col-sm-9">
                                <input value="<?php echo $empData['emp_dob']; ?>" required type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <label for="doj" class="col-sm-3 col-form-label">DOJ</label>
                            <div class="col-sm-9">
                                <input value="<?php echo $empData['emp_doj']; ?>" required type="date" name="doj" id="doj" class="form-control" placeholder="Date of Joining" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <select required name="department" id="department" class="form-control">
                            <?php
                            // Assuming you have a database connection established
                            $query = "SELECT * FROM department";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $deptId = $row['dept_id'];
                                $deptName = $row['dept_name'];

                                // Check if the current department is selected
                                $selected = ($deptId == $empDID) ? 'selected' : '';

                                echo '<option value="' . $deptId . '" ' . $selected . '>' . $deptName . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <select required name="company" id="company" class="form-control">
                            <?php
                            // Assuming you have a database connection established
                            $query = "SELECT * FROM company";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $compId = $row['company_id'];
                                $compName = $row['company_name'];

                                // Check if the current company is selected
                                $selected = ($compId == $empCID) ? 'selected' : '';

                                echo '<option value="' . $compId . '" ' . $selected . '>' . $compName . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <select required name="grade" id="grade" class="form-control">
                            <?php
                            // Assuming you have a database connection established
                            $query = "SELECT * FROM paygrade";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $gradeId = $row['grade_id'];
                                $gradeName = $row['grade_name'];

                                // Check if the current company is selected
                                $selected = ($gradeId == $empGID) ? 'selected' : '';

                                echo '<option value="' . $gradeId . '" ' . $selected . '>' . $gradeName . '</option>';
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" value="Update" class="form-control btn btn-primary">

                    </div>
            </form>
        </div>


    </div>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form values
        $empName = $_POST["username"];
        $empEmail = $_POST["email"];
        $empMob = $_POST["mobile"];
        $empAddress = $_POST["address"];
        $empDOB = $_POST["dob"];
        $empDOJ = $_POST["doj"];
        $empDID = $_POST["department"];
        $empCID = $_POST["company"];
        $empGID = $_POST["grade"];

        // Update query with prepared statement
        $sql = "UPDATE employee SET emp_name=?, emp_email=?, emp_mobile_no=?, emp_address=?, emp_dob=?, emp_doj=?, dept_id=?, comp_id=?, grade_id=? WHERE emp_id=?";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ssssssiiii", $empName, $empEmail, $empMob, $empAddress, $empDOB, $empDOJ, $empDID, $empCID, $empGID, $empId);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Employee details updated successfully.";
            echo '<script>window.location.href = "employee-home.php";</script>';
        } else {
            echo "Error updating employee details: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
    ?>

</body>

</html>