<html>
  <head>
    <style>
      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100vh;
      }
      h1 {
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Number Guessing Game</h1>
      <?php
        session_start();
        if (!isset($_SESSION['answer'])) {
          $_SESSION['answer'] = rand(1, 100);
        }
        if (isset($_POST['guess'])) {
          $guess = (int) $_POST['guess'];
          if ($guess === $_SESSION['answer']) {
            echo "<p>You win! The answer was $_SESSION[answer].</p>";
            echo '<p><a href="?">Play Again</a></p>';
            unset($_SESSION['answer']);
          } elseif ($guess > $_SESSION['answer']) {
            echo '<p>Too high!</p>';
          } else {
            echo '<p>Too low!</p>';
          }
        }
      ?>
      <form action="" method="post">
        <input type="number" name="guess" />
        <input type="submit" value="Guess" />
      </form>
    </div>
  </body>
</html>
