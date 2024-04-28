
# Web Development Quiz

Welcome to the Web Development Quiz project! This web application allows users to test their knowledge of web development concepts through a series of quiz questions.

## Features

- **User Authentication**: Users are prompted to enter their name and email before starting the quiz.
- **Database Integration**: Quiz questions and choices are fetched from a MySQL database, allowing for easy management and customization.
- **Session Management**: User scores are tracked using PHP sessions, ensuring a seamless quiz-taking experience.
- **Email Results**: Upon completion of the quiz, users can receive their results via email.
- **Responsive Design**: The application is designed to work well on various devices, including desktops, tablets, and mobile phones.

## Setup

To set up the project locally, follow these steps:

1. Clone the repository to your local machine:

    ```
    git clone https://github.com/yourusername/web-development-quiz.git
    ```

2. Import the provided MySQL database dump (`quiz_webd.sql`) into your MySQL database server.

3. Update the database connection credentials in the `database.php` file to match your MySQL server configuration.

4. Ensure that PHP and a web server (e.g., Apache, Nginx) are installed on your system.

5. Start the web server and navigate to the project directory in your web browser.

6. Follow the on-screen instructions to take the quiz.

## Dependencies

- **PHPMailer**: Used for sending quiz results via email. Install using Composer:

    ```
    composer require phpmailer/phpmailer
    ```
