<?php
include('conn.php');
?>


<?php
// Assuming you have a database connection established
// Replace 'your_database_connection' with your actual connection variable

if (isset($_GET['rid'])) {
    $rollId = $_GET['rid'];

    $sql = "DELETE FROM payroll WHERE transaction_id = $rollId";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Payroll Deleted";
        echo '<script>window.location.href = "payrolls.php";</script>';
        exit(); // Ensure the script stops executing after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

