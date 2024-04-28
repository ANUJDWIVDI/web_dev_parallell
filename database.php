<?php


//Create connection credentials
$db_host = 'localhost';
$db_name = 'quiz_webd';
$db_user = 'root';
$db_pass = 'user';

//Create mysqli object
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

//Error handler
if($mysqli->connect_error){
	printf("Connect failed: %s\n",$mysqli->connect_error);

    // take from quiz_webd.sql
    // CREATE DATABASE quiz_webd;
    // CREATE TABLE questions (
    // id INT(11) AUTO_INCREMENT PRIMARY KEY,
    // question VARCHAR(255) NOT NULL,
    // choice1 VARCHAR(255) NOT NULL,
    // choice2 VARCHAR(255) NOT NULL,
    // choice3 VARCHAR(255) NOT NULL,
    // choice4 VARCHAR(255) NOT NULL,
    // answer VARCHAR(255) NOT NULL
    // );

    // INSERT INTO questions (question, choice1, choice2, choice3, choice4, answer) VALUES ('What is 10 + 10?', '5', '10', '20', '15', '20');

	exit;
}


?>
