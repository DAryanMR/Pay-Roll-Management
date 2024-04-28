<?php
include('conn.php');
?>


<?php
// Assuming you have a database connection established
// Replace 'your_database_connection' with your actual connection variable

if (isset($_GET['eid'])) {
    $empId = $_GET['eid'];

    $sql = "DELETE FROM employee WHERE emp_id = $empId";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Employee Deleted";
        echo '<script>window.location.href = "employees.php";</script>';
        exit(); // Ensure the script stops executing after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

