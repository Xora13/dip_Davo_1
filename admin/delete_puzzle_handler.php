<?php
require_once 'db_connect.php';
require_once './lib/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

if (!empty($_GET['id'])) {

    $puzzle_id = $_GET['id'];

    // SQL query to delete data from a table
    $selectSQL = "SELECT * FROM puzzle WHERE id = {$puzzle_id}";

    $product = $connection->query($selectSQL);
    $imageName = $product->fetch_assoc()['image_name'];

    $deleteSQL = "DELETE FROM puzzle WHERE id = {$puzzle_id}";

    // 
    $file_path = '../img/uploads/' . $imageName;

    // delete file
    if (file_exists($file_path)) {
        if (unlink($file_path)) {
            echo "File deleted successfully.";
        } else {
            echo "Error deleting the file.";
        }
    }

    // delete record from db
    if ($connection->query($deleteSQL) === TRUE) {
        echo "Records deleted successfully";
    } else {
        echo "Error deleting records: " . $connection->error;
    }

    $connection->close();

    header("Location: /admin");
}
