<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Paygrades</title>

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

    <?php include('navbar.php'); ?><br>

    <div class="container">
        <h2>Paygrades</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Basis</th>
                    <th>DA</th>
                    <th>TA</th>
                    <th>Bonus</th>
                    <th>PF</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM paygrade";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["grade_name"] . "</td>";
                        echo "<td>" . $row["grade_basis"] . "</td>";
                        echo "<td>" . $row["grade_da"] . "</td>";
                        echo "<td>" . $row["grade_ta"] . "</td>";
                        echo "<td>" . $row["grade_bonus"] . "</td>";
                        echo "<td>" . $row["grade_pf"] . "</td>";
                        echo "<td>";
                        echo "<a class='btn btn-primary' href='paygrade-edit.php?gid=" . $row["grade_id"] . "'>Edit</a>";
                        echo " | ";
                        echo "<button class='btn btn-danger' data-toggle='modal' data-target='#myModal" . $row["grade_id"] . "'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";

                        // Modal for each grade
                        echo "<div class='modal' id='myModal" . $row["grade_id"] . "'>";
                        echo "<div class='modal-dialog'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h4 class='modal-title'>Delete Company</h4>";
                        echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                        echo "<p>Are you sure you want to delete the grade: " . $row["grade_name"] . "?</p>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        echo "<a href='paygrade-delete.php?gid=" . $row["grade_id"] . "' class='btn btn-danger'>Delete</a>";
                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No Grades found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include('footer.php'); ?>

</body>

</html>