<?php include "database.php"; ?>
<?php session_start(); ?>
<?php
    // Create Select Query to fetch the final score from the session
    $final_score = $_SESSION['score'];

    //store final score in the session
    $_SESSION['final_score'] = $final_score;

    //store the session score
    $score = $_SESSION['score'];

    // Get the user's name from session
    $user_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Web Development</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1>Web Development Quiz</h1>
        </div>
      </header>

      <main>
        <div class="container">
             <h2>You are Done, <?php echo $user_name; ?>!</h2>
             <p>Congrats! You have completed the test</p>
             <p>Final score: <?php echo $final_score; ?></p>
             <form action="send_results.php" method="post">
                <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
                <input type="hidden" name="user_email" value="<?php echo $_SESSION['email']; ?>">
                <input type="hidden" name="score" value="<?php echo $final_score; ?>"> <!-- Pass the score as a hidden input field -->
                <button type="submit">Send Results to Email</button>
            </form>

             <a href="question.php?n=1" class="start">Take Test Again</a>
             <?php session_destroy(); ?>
        </div>
      </main>


  </body>
</html>
