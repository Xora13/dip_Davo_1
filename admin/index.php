<?php
require_once 'db_connect.php';
require_once './lib/helpers.php';

$products = $connection->query("SELECT * FROM puzzle");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
    <?php if ($products->num_rows > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>sale text</th>
                    <th>weight</th>
                    <th>created at</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($products as $row) { ?>
                    <tr>
                        <th><?= !empty($row['id']) ? $row['id'] : 'null'  ?></th>
                        <th>
                            <?php if (!empty($row['image_name'])) { ?>
                                <img width="50px" src="/img/uploads/<?= !empty($row['image_name']) ? $row['image_name'] : 'null'  ?>" alt="<?= !empty($row['title']) ? $row['title'] : 'null'  ?>">
                            <?php } else { ?>
                                NULLLL
                            <?php } ?>
                        </th>
                        <th><?= !empty($row['title']) ? $row['title'] : 'null'  ?></th>
                        <th><?= !empty($row['description']) ? $row['description'] : 'null'  ?></th>
                        <th><?= !empty($row['sale_text']) ? $row['sale_text'] : 'null'  ?></th>
                        <th><?= !empty($row['weight']) ? $row['weight'] : 'null'  ?></th>
                        <th><?= !empty($row['created_at']) ? $row['created_at'] : 'null'  ?></th>
                        <th>
                            <a href="/admin/delete_puzzle_handler.php?id=<?= !empty($row['id']) ? $row['id'] : 'null'  ?>">delete</a>
                            <a href="/admin/update_puzzle.php?id=<?= !empty($row['id']) ? $row['id'] : 'null'  ?>">update</a>
                        </th>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <div>
            <a href="/admin/create_puzzle.php">Add product</a>
        </div>
    <?php } else { ?>
        <div>
            There is no product added yet! <a href="/admin/create_puzzle.php">Add product</a>
        </div>
    <?php } ?>
</body>

</html>