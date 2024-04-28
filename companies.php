<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Companies</title>

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
    <?php include('navbar.php'); ?>

    <br>
    <div class="container">
        <h2>Companies</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Assuming you have a database connection established
                // Replace 'your_database_connection' with your actual connection variable
                $sql = "SELECT * FROM company";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["company_name"] . "</td>";
                        echo "<td>" . $row["comp_address"] . "</td>";
                        echo "<td>" . $row["contact_no"] . "</td>";
                        echo "<td>";
                        echo "<a class='btn btn-primary' href='company-edit.php?cid=" . $row["company_id"] . "'>Edit</a>";
                        echo " | ";
                        echo "<button class='btn btn-danger' data-toggle='modal' data-target='#myModal" . $row["company_id"] . "'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";

                        // Modal for each company
                        echo "<div class='modal' id='myModal" . $row["company_id"] . "'>";
                        echo "<div class='modal-dialog'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h4 class='modal-title'>Delete Company</h4>";
                        echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                        echo "<p>Are you sure you want to delete the company: " . $row["company_name"] . "?</p>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        echo "<a href='company-delete.php?cid=" . $row["company_id"] . "' class='btn btn-danger'>Delete</a>";
                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No companies found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>