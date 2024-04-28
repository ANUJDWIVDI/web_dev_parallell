<?php
    session_start(); // Start the session , this is required to store the user's name and email address for the quiz
    include "database.php";

    // Total questions
    $query = "SELECT * FROM questions";
    $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
    $totalQuestions = $results->num_rows;

    // Set number of questions for the quiz for now (3)
    $numberOfQuestions = 3;

    // Set session variables for user's name and email address
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        header('Location: question.php?n=1');
        exit;
    }
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
        <h2>Welcome to the Web Development Quiz!</h2>
        <p>This quiz consists of <?php echo $numberOfQuestions; ?> questions to test your knowledge of web development.</p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="name" placeholder="Enter your name" required><br>
            <input type="email" name="email" placeholder="Enter your email" required><br>
            <button type="submit">Start Quiz</button>
        </form>
    </main>
</div>

</body>
</html>
