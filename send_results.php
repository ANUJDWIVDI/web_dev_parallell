<?php include "database.php"; ?>
<?php session_start(); ?>
<?php

// This script sends an email to the user with the quiz results

require 'vendor/autoload.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user's name and email from the form
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];


    // GET THE SCORE FROM THE SESSION

    $score = isset($_POST['score']) ? $_POST['score'] : null;


    // Include PHPMailer autoloader and create an instance of PHPMailer
    require 'vendor/autoload.php';

    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        // SMTP settings for Mailtrap
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '5934e0e4fcc479';
        $mail->Password = 'ef3e96fe9aefc0';

        // Sender and recipient
        $mail->setFrom('webdevappanuj@gmail.com', 'Web Development Quiz');
        $mail->addAddress($user_email, $user_name);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Web Development Quiz Results';

        $mail->Body = "<h1>Web Development Quiz Results</h1>
        <p>Dear $user_name,</p>
        <p>Your score is $score </p>
        <p>Thank you for taking the quiz.</p>";

        // Send email
        $mail->send();
        echo "Email sent successfully.";
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }
} else {
    // Redirect if form data is not submitted
    header("Location: final.php");
    exit;
}
?>
