<?php
include 'config.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql_select = "SELECT img FROM client WHERE id=$id";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $img_filename = $row["img"];

 
        $sql_delete = "DELETE FROM client WHERE id=$id";
        if ($conn->query($sql_delete) === TRUE) {

            $img_path = "img/" . $img_filename;
            if (file_exists($img_path)) {
                unlink($img_path);
            }


            header("Location: index.php");
            exit;
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "No record found with the provided ID.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
