<?php

include('conn.php');

// Start the session
session_start();

// Access the session values
if (isset($_SESSION['emp_id']) && isset($_SESSION['emp_name'])) {
    $empId = $_SESSION['emp_id'];

    $empQuery = "SELECT emp_name FROM employee WHERE emp_id = '$empId'";
    $empResult = $conn->query($empQuery);

    if ($empResult->num_rows > 0) {
        // Company found, perform further processing or display the data
        $empData2 = $empResult->fetch_assoc();
        $empName = $empData2['emp_name'];
    }
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


<style>
    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="employee-home.php">Payroll Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="employee-edit.php?eid=<?php echo $empId; ?>">Profile</a>
                    <a class="dropdown-item" href="payrolls-view.php?eid=<?php echo $empId; ?>">Payrolls</a>
                    <a class="dropdown-item" href="employee-pf.php?eid=<?php echo $empId; ?>">Provident Fund</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>