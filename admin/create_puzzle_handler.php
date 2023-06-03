<?php
require_once 'db_connect.php';
require_once './lib/helpers.php';



if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

if (
    true || !empty($_POST['title']) &&
    !empty($_POST['description']) &&
    !empty($_POST['weight']) &&
    !empty($_POST['sale_text'])
) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $weight = $_POST['weight'];
    $sale_text = $_POST['sale_text'];

    $image_name = null;
    // file


    if (!empty($_FILES['image'])) {
        $file = $_FILES['image'];

        // Check for errors during file upload
        if ($file['error'] === UPLOAD_ERR_OK) {

            // Specify the destination directory to store the uploaded image
            $uploadDir = '../img/uploads/';

            // Generate a unique name for the uploaded file
            $image_name = md5(microtime()) . '_' . $file['name'];
            move_uploaded_file($file['tmp_name'], $uploadDir . $image_name);
        } else {
            return 'Error during file upload: ' . $file['error'];
        }
    }

    $sql = "INSERT INTO puzzle (`title`, `description`, `weight`, `sale_text`, `image_name`)
            VALUES ('$title', '$description', '$weight', '$sale_text', '$image_name')";

    if (mysqli_query($connection, $sql)) {
        echo "Puzzle created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    echo "All form fields are required.";
}

header("Location: /admin");