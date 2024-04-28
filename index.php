<?php
include('conn.php');

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <style>
        body {
            padding-top: 90px;
        }

        .panel-login {
            border-color: #ccc;
            -webkit-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
        }

        .panel-login>.panel-heading {
            color: #00415d;
            background-color: #fff;
            border-color: #fff;
            text-align: center;
        }

        .panel-login>.panel-heading a {
            text-decoration: none;
            color: #666;
            font-weight: bold;
            font-size: 15px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }

        .panel-login>.panel-heading a.active {
            color: #029f5b;
            font-size: 18px;
        }

        .panel-login>.panel-heading hr {
            margin-top: 10px;
            margin-bottom: 0px;
            clear: both;
            border: 0;
            height: 1px;
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -ms-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
        }

        .panel-login input[type="text"],
        .panel-login input[type="email"],
        .panel-login input[type="password"] {
            height: 45px;
            border: 1px solid #ddd;
            font-size: 16px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }

        .panel-login input:hover,
        .panel-login input:focus {
            outline: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            border-color: #ccc;
        }

        .btn-login {
            background-color: #59B2E0;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #59B2E6;
        }

        .btn-login:hover,
        .btn-login:focus {
            color: #fff;
            background-color: #53A3CD;
            border-color: #53A3CD;
        }

        .forgot-password {
            text-decoration: underline;
            color: #888;
        }

        .forgot-password:hover,
        .forgot-password:focus {
            text-decoration: underline;
            color: #666;
        }

        .btn-register {
            background-color: #1CB94E;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #1CB94A;
        }

        .btn-register:hover,
        .btn-register:focus {
            color: #fff;
            background-color: #1CA347;
            border-color: #1CA347;
        }
    </style>

</head>

<body>
    

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="" method="post" role="form" style="display: block;">
                                    <input type="hidden" name="form_id" value="login-form" />
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="index-admin.php" tabindex="5" class="forgot-password">Admin Login</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="" method="post" role="form" style="display: none;">
                                    <input type="hidden" name="form_id" value="register-form" />
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <input required type="text" name="username" id="username" class="form-control" placeholder="Username" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <input required type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <input required type="text" name="address" id="address" class="form-control" placeholder="Address" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <label for="dob" class="col-sm-3 col-form-label">DOB</label>
                                                <div class="col-sm-9">
                                                    <input required type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <label for="doj" class="col-sm-3 col-form-label">DOJ</label>
                                                <div class="col-sm-9">
                                                    <input required type="date" name="doj" id="doj" class="form-control" placeholder="Date of Joining" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <select required name="department" id="department" class="form-control">
                                                <option value="">Select Department</option>
                                                <?php
                                                // Assuming you have a database connection established
                                                $query = "SELECT * FROM department";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row['dept_id'] . '">' . $row['dept_name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <select required name="company" id="company" class="form-control">
                                                <option value="">Select Company</option>
                                                <?php
                                                // Assuming you have a database connection established
                                                $query = "SELECT * FROM company";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row['company_id'] . '">' . $row['company_name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <select required name="grade" id="grade" class="form-control">
                                                <option value="">Select Grade</option>
                                                <?php
                                                // Assuming you have a database connection established
                                                $query = "SELECT * FROM paygrade";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row['grade_id'] . '">' . $row['grade_name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <input required type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input required type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <!-- <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div> -->

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(function() {

            $('#login-form-link').click(function(e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function(e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

        });
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['form_id'] === 'login-form') {
            $empEmail = $_POST["email"];
            $empPass = $_POST["password"];

            // Create a prepared statement to check email and password
            $stmt = $conn->prepare("SELECT * FROM Employee WHERE emp_email = ?");
            $stmt->bind_param("s", $empEmail);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Employee email exists, check if password matches
                $row = $result->fetch_assoc();
                $storedPassword = $row['emp_pass'];

                if ($empPass === $storedPassword) {
                    // Password matches, perform desired action
                    // echo "Login successful!";
                    $_SESSION['emp_id'] = $row['emp_id'];
                    $_SESSION['emp_name'] = $row['emp_name'];
                    echo '<script>window.location.href = "employee-home.php";</script>';
                } else {
                    // Password does not match
                    echo "Incorrect password!";
                }
            } else {
                // Employee email does not exist
                echo "Employee with the provided email does not exist!";
            }

            // Close the statement
            $stmt->close();

            // Close the database connection
            $conn->close();
        } elseif ($_POST['form_id'] === 'register-form') {
            // Retrieve the form values
            $empName = $_POST["username"];
            $empEmail = $_POST["email"];
            $empPass = $_POST["password"];
            $empMob = $_POST["mobile"];
            $empAddress = $_POST["address"];
            $empDOB = $_POST["dob"];
            $empDOJ = $_POST["doj"];
            $empDID = $_POST["department"];
            $empCID = $_POST["company"];
            $empGID = $_POST["grade"];

            // Check if the employee with the provided email already exists
            $checkStmt = $conn->prepare("SELECT emp_email FROM Employee WHERE emp_email = ?");
            $checkStmt->bind_param("s", $empEmail);
            $checkStmt->execute();
            $checkStmt->store_result();

            if ($checkStmt->num_rows > 0) {
                echo "Employee with the provided email already exists.";
            } else {
                // Create a prepared statement
                $stmt = $conn->prepare("INSERT INTO Employee (emp_name, emp_email, emp_pass, emp_mobile_no, emp_address, 
                                    emp_dob, emp_doj, dept_id, comp_id, grade_id) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                // Bind the parameters with the corresponding values
                $stmt->bind_param("ssssssssss", $empName, $empEmail, $empPass, $empMob, $empAddress, $empDOB, $empDOJ, $empDID, $empCID, $empGID);

                // Execute the statement
                $stmt->execute();

                // Check if the query was successful
                if ($stmt->affected_rows > 0) {
                    echo "Employee record inserted successfully.";
                    echo '<script>window.location.href = "index.php";</script>';
                } else {
                    echo "Error inserting employee record: " . $conn->error;
                }

                // Close the statement
                $stmt->close();
            }

            // Close the check statement
            $checkStmt->close();

            // Close the database connection
            $conn->close();
        }
    }
    ?>


</body>

</html>