<?php
include('conn.php');
?>


<?php
// Assuming you have a database connection established
// Replace 'your_database_connection' with your actual connection variable

if (isset($_GET['gid'])) {
    $gradeId = $_GET['gid'];

    $sql = "DELETE FROM paygrade WHERE grade_id = $gradeId";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Paygrade Deleted";
        // Redirect to paygrades.php
        echo '<script>window.location.href = "paygrades.php";</script>';
        exit(); // Ensure the script stops executing after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

