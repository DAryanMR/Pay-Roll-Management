<?php
include('conn.php');
?>


<?php
// Assuming you have a database connection established
// Replace 'your_database_connection' with your actual connection variable

if (isset($_GET['did'])) {
    $deptId = $_GET['did'];

    $sql = "DELETE FROM department WHERE dept_id = $deptId";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Department Deleted";
        // Redirect to department.php
        echo '<script>window.location.href = "departments.php";</script>';
        exit(); // Ensure the script stops executing after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

