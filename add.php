<?php
// Include the database configuration file
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $place = $_POST['place'];

    // File upload
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["img"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // If file upload fails, do not proceed further
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
            // Inserting data into database
            $sql = "INSERT INTO client (name, email, contact, place, img) VALUES ('$name', '$email', '$contact', '$place', '" . htmlspecialchars(basename($_FILES["img"]["name"])) . "')";
            if ($conn->query($sql) === TRUE) {
                // Redirect to index page after successful insertion
                header("Location: index.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    // If form is not submitted, do nothing
    echo "";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add User</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
    body {
        background-color: #345678; 
    }
</style>
<body>
    <div class="container">
        <div class="col-12">
            <div class="title-t3">
                <h1>Add User Details</h1>
            </div>
        </div>
        <div class="form-group">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" placeholder="Enter Your Full Name" required><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" placeholder="name@gmail.com" required><br>

                <label for="contact">Contact:</label><br>
                <input type="text" id="contact" name="contact" placeholder="Contact Number" required><br>

                <label for="place">Place:</label><br>
                <input type="text" id="place" name="place" placeholder="Home Location" required><br>

                <label for="img">Profile Image:</label><br>
                <input type="file" id="img" name="img" accept="image/*" required><br><br>

                <input type="submit" class="btn btn-primary" value="Submit Now">
            </form>
        </div>
    </div>
</body>
</html>
