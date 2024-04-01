<?php
include 'config.php';
$sql = "SELECT * FROM client";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud1</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <div class="top-header">
        <div class="col-12">
            <div class="title-name">
                <h1>Users</h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-t1">
                        <h3>User Details New</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-t2">
                        <a href="add.php">Add Client</a>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-tab">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>PROFILE IMG</th>
                                            <th>NAME</th>                                  
                                            <th>EMAIL ID</th>
                                            <th>CONTACT</th>
                                            <th>PLACE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td><img src='img/" . $row['img'] . "' width='50' height='50'></td>";

                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['contact'] . "</td>";
                                                    echo "<td>" . $row['place'] . "</td>";
                                                    echo "<td>
                                                        <a href='view.php?id=" . $row["id"] . "' class='btn btn-success'>View</a>
                                                        <a href='edit.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a>
                                                        <a href='delete.php?id=" . $row["id"] . "'class='btn btn-danger'>Delete</a>
                                                    </td>"; 
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='7'>Place Add New Data</td></tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
