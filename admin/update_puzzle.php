<?php
require_once 'db_connect.php';
require_once './lib/helpers.php';


if (!empty($_GET['id'])) {

  $puzzle_id = $_GET['id'];

  // SQL query to delete data from a table
  $selectSQL = "SELECT * FROM puzzle WHERE id = {$puzzle_id}";

  $product = $connection->query($selectSQL)->fetch_assoc();
}

?>
<html>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Puzzle</title>
  <!-- <link rel="stylesheet" href="/style.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <header>
    <div class="row">
      <a href="index.php">
        <img src="/img/logo.webp" alt="img">
      </a>
    </div>
  </header>
  <h2>Update Puzzle - <?= $product['id'] ?></h2>
  <div>
    <?php if (!empty($product['image_name'])) { ?>
      <img width="50px" src="/img/uploads/<?= $product['image_name'] ?>" alt="<?= !empty($product['title']) ? $product['title'] : 'null'  ?>">
    <?php } else { ?>
      NULLLL
    <?php } ?>
  </div>
  <form method="POST" action="/admin/update_puzzle_handler.php" enctype="multipart/form-data">
    <input type="text" id="id" name="id" value="<?= $product['id'] ?>" required hidden><br><br>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?= $product['title'] ?>" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required><?= $product['description'] ?></textarea><br><br>

    <label for="weight">Weight:</label>
    <input type="number" id="weight" name="weight" value="<?= $product['weight'] ?>" required><br><br>

    <label for="sale_text">Sale Text:</label>
    <input type="text" id="sale_text" name="sale_text" value="<?= $product['sale_text'] ?>" required><br><br>

    <label for="image">Image Path:</label>
    <input type="file" id="image" name="image" required><br><br>

    <input type="submit" value="Update">
  </form>
</body>

</html>