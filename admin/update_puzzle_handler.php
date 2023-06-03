<?php
require_once 'db_connect.php';
require_once './lib/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}


if (
    !empty($_POST['id']) &&
    !empty($_POST['title']) &&
    !empty($_POST['description']) &&
    !empty($_POST['weight']) &&
    !empty($_POST['sale_text'])
) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $weight = $_POST['weight'];
    $sale_text = $_POST['sale_text'];

    // file
    if (!empty($_FILES['image'])) {
        // select record
        $puzzle_id = $_POST['id'];

        // SQL query to delete data from a table
        $selectSQL = "SELECT * FROM puzzle WHERE id = {$puzzle_id}";

        $product = $connection->query($selectSQL);
        $old_image_name = $product->fetch_assoc()['image_name'];

        // 
        $old_file_path = '../img/uploads/' . $old_image_name;

        // delete file
        if (file_exists($old_file_path)) {
            if (unlink($old_file_path)) {
                echo "File deleted successfully.";
            } else {
                echo "Error deleting the file.";
            }
        }
        $new_image_name = null;
        $file = $_FILES['image'];

        // Check for errors during file upload
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Specify the destination directory to store the uploaded image
            $uploadDir = '../img/uploads/';

            // Generate a unique name for the uploaded file
            $new_image_name = md5(microtime()) . '_' . $file['name'];
            move_uploaded_file($file['tmp_name'], $uploadDir . $new_image_name);
        } else {
            return 'Error during file upload: ' . $file['error'];
        }
    }

    $sql = "UPDATE puzzle SET
            title = '$title',
            description = '$description',
            weight = '$weight',
            sale_text = '$sale_text',
            image_name = '$new_image_name'
        WHERE id = '$id'";

    if (mysqli_query($connection, $sql)) {
        echo 'Puzzle updated successfully';
    } else {
        echo 'Error updating puzzle: ' . mysqli_error($connection);
    }

    mysqli_close($connection);

    header("Location: /admin");
} else {
    header('HTTP/1.1 400 Bad Request');
    exit();
}
