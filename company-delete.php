<?php
include('conn.php');
?>


<?php
// Assuming you have a database connection established
// Replace 'your_database_connection' with your actual connection variable

if (isset($_GET['cid'])) {
    $companyId = $_GET['cid'];

    $sql = "DELETE FROM company WHERE company_id = $companyId";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Company Deleted";
        // Redirect to company.php
        echo '<script>window.location.href = "companies.php";</script>';
        exit(); // Ensure the script stops executing after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

