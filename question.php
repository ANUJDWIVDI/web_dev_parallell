<?php include "database.php"; ?>
<?php session_start(); ?>
<?php

    // THIS IS THE CODE FOR THE QUIZ PAGE
    $number = (int) $_GET['n'];

    //Get total number of questions from database
    $query = "SELECT * FROM questions";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    // Get Question from database
    $query = "SELECT * FROM `questions` WHERE question_number = $number";

    //Get result from database
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

    // Get Choices from database
    $query = "SELECT * FROM `choices` WHERE question_number = $number";

    //Get results from database
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Web Development Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> // link to external css file

</head>
<body>
<div id="container">
    <header>
        <h1>Web Development Quiz</h1>
    </header>

    <main>
        <div class="container">
            <div class="current">Question <?php echo $number; ?> of <?php echo $total; ?></div>
            <p class="question"><?php echo $question['question'] ?></p>
            <form method="post" action="process.php">
                <ul class="choices">
                    <?php while($row=$choices->fetch_assoc()): ?>
                        <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" />
                            <?php echo $row['choice']; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <input type="submit" value="Submit" />
                <input type="hidden" name="number" value="<?php echo $number; ?>" />
            </form>
        </div>
    </main>
</div>
</body>
</html>
