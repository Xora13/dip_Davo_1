<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Puzzle</title>
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
    <h2>Create Puzzle</h2>
    <form method="POST" action="/admin/create_puzzle_handler.php" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="weight">Weight:</label>
        <input type="number" id="weight" name="weight" required><br><br>

        <label for="sale_text">Sale Text:</label>
        <input type="text" id="sale_text" name="sale_text" required><br><br>

        <label for="image">Image Path:</label>
        <input type="file" id="image" name="image" required><br><br>

        <input type="submit" value="Create">
    </form>
</body>

</html>