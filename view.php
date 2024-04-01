<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM client WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Details</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container-fluid">
        <h1>User Details</h1>
        <div class="row">
            <div class="col-12">
                <table class="table">
									<thead>
										<tr>
											<th>
												#
												<th>PROFILE IMG</th>
					                            <th>NAME</th>				                          
					                            <th>EMAIL ID</th>
					                            <th>CONTACT</th>
					                            <th>PLACE</th>
					                            <th>ACTION</th>
											</th>
										</tr>
									</thead>
									<td><?php echo $row['id']; ?></td>
									<td><img src="img/<?php echo $row['img']; ?>" width="50" height="50"></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['contact']; ?></td>
									<td><?php echo $row['place']; ?></td>
									<td>
										<a href="index.php" class="btn btn-primary">Back to Home</a>
									</td>
								</table>
							</div>
						</div>
					</div>

  

 
</body>
</html>

<?php
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
}
?>
