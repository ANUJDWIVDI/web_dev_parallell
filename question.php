<?php include "database.php"; ?>
<?php session_start(); ?>
<?php
    //Set question number
    $number = (int) $_GET['n'];

    //Get total number of questions
    $query = "SELECT * FROM questions";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    // Get Question
    $query = "SELECT * FROM `questions` WHERE question_number = $number";

    //Get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

    // Get Choices
    $query = "SELECT * FROM `choices` WHERE question_number = $number";

    //Get results
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Web Development Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

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
