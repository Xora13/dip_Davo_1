<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <header>

    <div class="row">
      <a href="index.php">
        <img src="img/logo.webp" alt="img">
      </a>

      <a href="puzzle.php" class="puzle">
        <h2>Puzzles & Games</h2>
      </a>
      <a href="vehicles.php" class="vehc">
        <h2>Vehicles</h2>
      </a>
      <a href="wood.php" class="wood">
        <h2>Wooden Toys</h2>
      </a>
      <a href="outdoor.php" class="out">
        <h2>Outdoor Play</h2>
      </a>

    </div>
  </header>
  <div class="div">
    <div class="ballon">
      <div class="bal">
        <img src="img/ballon.png" alt="img">
        <img src="img/ballon.png" alt="img">
        <img src="img/ballon.png" alt="img">
        <img src="img/ballon.png" alt="img">
        <img src="img/ballon.png" alt="img">
        <img src="img/ballon.png" alt="img">
        <img src="img/ballon.png" alt="img">
        <img src="img/ballon.png" alt="img">
        <img src="img/ballon.png" alt="img">
        <img src="img/ballon.png" alt="img">
      </div>
    </div>
    <div class="inf">
      <h1>Puzzles & Games</h1>
      <h2>Here you can find our games and puzzles; all perfect for days when the weather is not cooperating. We
        have classic games such as tic tac toe, kalaha, and ludo that work just as well for kids and adults.
        Have a look!</h2>
    </div>
    <div class="product">
      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $servername = "localhost:8889";
        $username = "root";
        $password = "root";
        $dbname = "shop";

        $connection = mysqli_connect($servername, $username, $password, $dbname);

        if (!$connection) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT id, title, description, weight, sale_text, img_path FROM puzzle";
        $result = mysqli_query($connection, $query);

        if ($result) {
          $puzzles = array();

          while ($row = mysqli_fetch_assoc($result)) {
            $puzzles[] = $row;
          }
          foreach ($puzzles as $puzzle) {
            echo '<div class="item" data-id="' . $puzzle['id'] . '">' . PHP_EOL;
            echo '<img src="' . $puzzle['img_path'] . '" alt="img">' . PHP_EOL;
            echo '<h1>' . $puzzle['title'] . '</h1>' . PHP_EOL;
            echo '<h2>' . $puzzle['description'] . '</h2>' . PHP_EOL;
            echo '<h2>' . $puzzle['weight'] . '</h2>' . PHP_EOL;
            echo '<h3>' . $puzzle['sale_text'] . '</h3>' . PHP_EOL;
            echo '</div>' . PHP_EOL;
          }
        } else {
          echo "Error executing query: " . mysqli_error($connection);
        }

      } else {
        mysqli_close($connection);
      }

      ?>
    </div>


    <footer>
      <h1>Babyshop - for premium children's clothes</h1>
      <h2>Babyshop was founded in 2006 with vision of building the best online store in the Nordics for children
        clothing. We want to inspire by offering an exclusive shopping experience and excellent customer service
        with the best mixture of high-quality brands. Here you'll find baby and children's clothes, shoes, toys,
        strollers, car seats, maternity clothes, accessories and more for children 0-10 years. Read more</h2>
      <a href="https://www.instagram.com/babyshop/"><i class="fa fa-instagram"
          style="font-size:25px; margin:  22px 5px 0 22%;"></i></a>
      <a href="https://www.facebook.com/Babyshop-571794983158534/"><i class="fa fa-facebook"
          style="font-size:25px"></i></a>
      <div class="text">
        <h6>You are now subscribed to our newsletter
        </h6>

        <h5>We have sent you a confirmation mail to </h5>
        <h5>ffffffss@gmail.com You can unsubscribe at any time. By signing up to our newsletter you are agreeing
          to our privacy policy.</h5>
      </div>
      <form action="#" method="post">

        <input type="email" name="email" placeholder="example@email.com">
        <input type="submit" placeholder="OK">
      </form>
    </footer>
  </div>
</body>

</html>